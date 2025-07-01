<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ResumeController extends Controller
{
    public function create()
    {
        return view('resume.create');
    }

    public function aiGenerate(Request $request)
    {
        $data = $request->all();
        $prompt = "Generate a professional, ATS-friendly resume in Markdown format using this data: " . json_encode($data);

        try {
            $apiKey = env('GROQ_API_KEY');
            if (!$apiKey) {
                return response()->json([
                    'error' => 'Groq API key is missing. Please set GROQ_API_KEY in your .env file.'
                ], 500);
            }

            $response = Http::withToken($apiKey)
                ->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model' => 'llama3-70b-8192',
                    'messages' => [
                        ['role' => 'system', 'content' => 'You are a resume writing assistant.'],
                        ['role' => 'user', 'content' => $prompt],
                    ],
                    'max_tokens' => 1024,
                ]);

            if ($response->failed()) {
                $errorMsg = $response->json('error.message') ?? $response->body();
                return response()->json([
                    'error' => 'Groq API error: ' . $errorMsg
                ], 500);
            }

            $resume = $response['choices'][0]['message']['content'] ?? null;
            if (!$resume) {
                return response()->json([
                    'error' => 'No resume content returned from Groq.'
                ], 500);
            }

            return response()->json([
                'resume' => $resume
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    use AuthorizesRequests;
    
    // Store a new resume
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'professional_title' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'experience' => 'nullable',
            'education' => 'nullable',
            'technical_skills' => 'nullable',
            'soft_skills' => 'nullable',
            'languages' => 'nullable',
            'projects' => 'nullable',
            'certifications' => 'nullable|array',
            'awards' => 'nullable|array',
            'volunteer' => 'nullable|array',
            'interests' => 'nullable|array',
        ]);
        $data['user_id'] = Auth::id();
        // Decode JSON fields if sent as JSON strings
        foreach(['experience','education','technical_skills','soft_skills','languages','projects'] as $field) {
            if (isset($data[$field]) && is_string($data[$field])) {
                $data[$field] = json_decode($data[$field], true);
            }
        }
        // Encode certifications, awards, volunteer, interests as JSON
        foreach(['certifications','awards','volunteer','interests'] as $field) {
            if (isset($data[$field]) && is_array($data[$field])) {
                $data[$field] = json_encode(array_filter($data[$field], fn($v) => $v !== null && $v !== ''));
            }
        }
        $resume = Resume::create($data);
        return response()->json(['id' => $resume->id, 'redirect' => route('resume.show', $resume)]);
    }

    // Show a resume
    public function show(Resume $resume)
    {
        $this->authorize('view', $resume);
        return view('resume.show', compact('resume'));
    }

    // Edit a resume
    public function edit(Resume $resume)
    {
        $this->authorize('update', $resume);
        return view('resume.edit', compact('resume'));
    }

    // Update a resume
    public function update(Request $request, Resume $resume)
    {
        $this->authorize('update', $resume);
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'professional_title' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'experience' => 'nullable',
            'education' => 'nullable',
            'technical_skills' => 'nullable',
            'soft_skills' => 'nullable',
            'languages' => 'nullable',
            'projects' => 'nullable',
            'certifications' => 'nullable|array',
            'awards' => 'nullable|array',
            'volunteer' => 'nullable|array',
            'interests' => 'nullable|array',
        ]);
        foreach(['experience','education','technical_skills','soft_skills','languages','projects'] as $field) {
            if (isset($data[$field]) && is_string($data[$field])) {
                $data[$field] = json_decode($data[$field], true);
            }
        }
        // Encode certifications, awards, volunteer, interests as JSON
        foreach(['certifications','awards','volunteer','interests'] as $field) {
            if (isset($data[$field]) && is_array($data[$field])) {
                $data[$field] = json_encode(array_filter($data[$field], fn($v) => $v !== null && $v !== ''));
            }
        }
        $resume->update($data);
        // Stay on edit page and show success notification
        return redirect()->route('resume.edit', $resume)->with('success', 'Resume updated!');
    }

    // Delete a resume
    public function destroy(Resume $resume)
    {
        $this->authorize('delete', $resume);
        $resume->delete();
        return redirect()->route('resume.index')->with('success', 'Resume deleted!');
    }

    // List all resumes for the user
    public function index()
    {
        $resumes = Resume::where('user_id', Auth::id())->latest()->get();
        return view('resume.index', compact('resumes'));
    }

    public function download(\App\Models\Resume $resume)
    {
        $this->authorize('view', $resume);
        $pdf = \PDF::loadView('resume.pdf', compact('resume'));
        return $pdf->download('resume_' . $resume->id . '.pdf');
    }
}
