<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = Application::where('user_id', auth()->id());

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('company_name', 'like', '%' . $request->search . '%')
                ->orWhere('job_title', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $applications = $query->orderByDesc('created_at')->paginate(10);

        return view('applications.index', compact('applications'));
    }

    

    public function create()
    {
        return view('applications.create');
    }

   public function store(Request $request)
    {
        try {
            // Validate request
            $validated = $request->validate($this->getValidationRules());

            // Create application
            $application = auth()->user()->applications()->create(
                array_diff_key($validated, array_flip(['resume', 'cover_letter', 'follow_up_date', 'follow_up_notes']))
            );

            // Handle follow-up
            if ($request->filled('follow_up_date')) {
                $application->followUp()->create([
                    'user_id' => auth()->id(),
                    'follow_up_date' => $request->follow_up_date,
                    'notes' => $request->follow_up_notes,
                    'completed' => false,
                ]);
            }

            // Handle file uploads
            if ($request->hasFile('resume')) {
                $this->handleFileUpload($request, $application, 'resume');
            }

            if ($request->hasFile('cover_letter')) {
                $this->handleFileUpload($request, $application, 'cover_letter');
            }

            return redirect()
                ->route('applications.index')
                ->with('success', 'Application added successfully!');

        $exists = Application::where('user_id', auth()->id())
            ->where('company_name', $request->company_name)
            ->where('job_title', $request->job_title)
            ->exists();

        if ($exists) {
            return back()->with('error', 'You have already applied to this job at this company.');
        }

        } catch (\Exception $e) {
            Log::error('Application creation failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->withInput()
                ->with('error', 'Failed to create application: ' . $e->getMessage());
        }
    }
    
    public function show(Application $application)
    {
        // Check if user owns this application
        if ($application->user_id !== auth()->id()) {
            abort(403);
        }

        return view('applications.show', compact('application'));
    }

    public function edit(Application $application)
    {
        if ($application->user_id !== auth()->id()) {
            abort(403);
        }

        return view('applications.edit', compact('application'));
    }


    public function update(Request $request, Application $application)
    {
        // Check if user owns this application
        if ($application->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        try {
            // Validate CSRF token
            

            $validated = $request->validate([
                'company_name' => 'required|string|max:255',
                'job_title' => 'required|string|max:255',
                'status' => 'required|string|in:applied,screening,interviewing,offer,rejected,withdrawn,not_accepting',
                'applied_date' => 'nullable|date',
                'location' => 'nullable|string|max:255',
                'salary_range' => 'nullable|string|max:255',
                'follow_up_date' => 'nullable|date|after_or_equal:today',
                'follow_up_notes' => 'nullable|string|max:1000',
            ], [
                'company_name.required' => 'Please enter the company name',
                'job_title.required' => 'Please enter the job title',
                'status.in' => 'Please select a valid application status',
                'follow_up_date' => 'nullable|date|date_format:Y-m-d|after_or_equal:today',
                // Add more custom messages as needed
            ]);

            DB::beginTransaction();

            // Update application
            $application->update($validated);

            // Handle follow-up
            if ($request->filled('follow_up_date') || $request->filled('follow_up_notes')) {
                $application->followUp()->updateOrCreate(
                    [], // Empty array means match any existing follow-up
                    [
                        'user_id' => auth()->id(),
                        'follow_up_date' => $request->follow_up_date,
                        'notes' => $request->follow_up_notes,
                        'completed' => false
                    ]
                );
            }

            // Handle file uploads inside the same transaction
            if ($request->hasFile('resume')) {
                // Delete old resume if exists
                $oldResume = $application->resume()->first();
                if ($oldResume) {
                    Storage::disk('public')->delete('documents/' . $oldResume->filename);
                    $oldResume->delete();
                }
                // Store new resume
                $resumeFile = $request->file('resume');
                $resumePath = $resumeFile->store('documents', 'public');
                $application->documents()->create([
                    'user_id' => auth()->id(),
                    'type' => 'resume',
                    'filename' => basename($resumePath),
                    'original_filename' => $resumeFile->getClientOriginalName(),
                    'mime_type' => $resumeFile->getClientMimeType(),
                ]);
            }

            // Cover Letter
            if ($request->hasFile('cover_letter')) {
                // Delete old cover letter if exists
                $oldCover = $application->coverLetter()->first();
                if ($oldCover) {
                    Storage::disk('public')->delete('documents/' . $oldCover->filename);
                    $oldCover->delete();
                }
                // Store new cover letter
                $coverFile = $request->file('cover_letter');
                $coverPath = $coverFile->store('documents', 'public');
                $application->documents()->create([
                    'user_id' => auth()->id(),
                    'type' => 'cover_letter',
                    'filename' => basename($coverPath),
                    'original_filename' => $coverFile->getClientOriginalName(),
                    'mime_type' => $coverFile->getClientMimeType(),
                ]);
            }

            DB::commit();

            return redirect()
                ->route('applications.index')
                ->with('success', 'Application updated successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            
            \Log::error('Application update failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Return with both flashdata and errors
            return back()
                ->withInput()
                ->with('error', 'Failed to update application: ' . $e->getMessage())
                ->withErrors(['application' => 'Failed to update application. ' . $e->getMessage()]);
        }
    }


    private function handleFileUpload(Request $request, Application $application, string $type)
    {
        try {
            if (!$request->hasFile($type)) {
                Log::info("No file provided for {$type}");
                return null;
            }

            $file = $request->file($type);
            
            if (!$file->isValid()) {
                Log::error("Invalid file upload", [
                    'error' => $file->getErrorMessage()
                ]);
                throw new \Exception("Invalid file upload: " . $file->getErrorMessage());
            }

            // Generate unique filename
            $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            
            // Store file
            $path = $file->storeAs('documents', $filename, 'public');

            // Create document record
            $document = new Document([
                'user_id' => auth()->id(), // Add user_id here
                'application_id' => $application->id,
                'type' => $type,
                'filename' => $filename,
                'original_filename' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
            ]);

            $document->save();

            Log::info('File upload successful', [
                'type' => $type,
                'filename' => $filename,
                'path' => $path
            ]);

            return $document;

        } catch (\Exception $e) {
            Log::error('File upload failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    public function downloadDocument(Document $document)
    {
        if ($document->application->user_id !== auth()->id()) {
            abort(403);
        }

        $path = Storage::disk('public')->path('documents/' . $document->filename);
        
        if (!File::exists($path)) {
            return back()->with('error', 'Document file not found.');
        }

        return response()->download($path, $document->original_filename);
    }

    public function destroyDocument(Document $document)
    {
        if ($document->application->user_id !== auth()->id()) {
            abort(403);
        }

        Storage::disk('public')->delete('documents/' . $document->filename);
        $document->delete();

        return back()->with('success', 'Document deleted successfully');
    }

    protected function getValidationRules()
    {
        return [
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'status' => 'required|in:applied,screening,interviewing,offer,rejected,withdrawn,not_accepting',
            'applied_date' => 'required|date',
            'job_description' => 'nullable|string',
            'salary_range' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'cover_letter' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'tags' => 'nullable|string',
            'follow_up_date' => 'nullable|date|after_or_equal:today',
            'follow_up_notes' => 'nullable|string|max:500',
        ];
    }

    private function ensureDocumentStorageExists()
    {
        $path = Storage::disk('public')->path('documents');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0775, true);
        }
    }

    public function destroy(Application $application)
    {
        if ($application->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Delete related documents (and files)
        foreach ($application->documents as $doc) {
            \Storage::disk('public')->delete('documents/' . $doc->filename);
            $doc->delete();
        }

        // Delete follow-up if exists
        if ($application->followUp) {
            $application->followUp->delete();
        }

        $application->delete();

        return redirect()->route('applications.index')
            ->with('success', 'Application deleted successfully!');
    }

    
    public function interviewCalendar(Request $request)
    {
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year);

        $startOfMonth = \Carbon\Carbon::create($year, $month, 1);
        $daysInMonth = $startOfMonth->daysInMonth;
        $firstDayOfWeek = $startOfMonth->dayOfWeekIso; // 1 (Mon) - 7 (Sun)

        // Fetch interviews for this month
        $interviews = Interview::whereMonth('scheduled_at', $month)
            ->whereYear('scheduled_at', $year)
            ->get()
            ->groupBy(function($i) { return $i->scheduled_at->day; });

        return view('interviews.calendar', compact('month', 'year', 'daysInMonth', 'firstDayOfWeek', 'interviews'));
    }


}