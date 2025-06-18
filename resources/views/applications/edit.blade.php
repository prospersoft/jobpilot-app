<x-layouts.app :title="__('Edit Application')">
    <style>
        .notification-container {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            z-index: 50;
        }
        .notification {
            min-width: 300px;
            transform: translateY(0);
            opacity: 1;
            transition: all 0.3s ease-in-out;
        }
        .notification.hiding {
            transform: translateY(100%);
            opacity: 0;
        }
    </style>
    <div class="flex flex-col gap-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Edit Application</h1>
        </div>

        <!-- Notification Container -->
        <div class="notification-container">
            @if (session('error'))
                <div id="error-alert" class="notification !bg-black text-white px-4 py-3 rounded-lg shadow-lg flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-purple-300 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                </div>
            @endif
        </div>

        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-6">
            <form action="{{ route('applications.update', $application) }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="applicationForm">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Company Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Company Name</label>
                        <flux:input type="text" name="company_name" value="{{ old('company_name', $application->company_name) }}" required class="mt-1 w-full" />
                    </div>

                    <!-- Job Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Job Title</label>
                        <flux:input type="text" name="job_title" value="{{ old('job_title', $application->job_title) }}" required class="mt-1 w-full" />
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                        <flux:select name="status" required class="mt-1 w-full">
                            <option value="applied" {{ old('status', $application->status) == 'applied' ? 'selected' : '' }}>Applied</option>
                            <option value="screening" {{ old('status', $application->status) == 'screening' ? 'selected' : '' }}>Screening</option>
                            <option value="interviewing" {{ old('status', $application->status) == 'interviewing' ? 'selected' : '' }}>Interviewing</option>
                            <option value="offer" {{ old('status', $application->status) == 'offer' ? 'selected' : '' }}>Offer</option>
                            <option value="rejected" {{ old('status', $application->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            <option value="withdrawn" {{ old('status', $application->status) == 'withdrawn' ? 'selected' : '' }}>Withdrawn</option>
                            <option value="not_accepting" {{ old('status', $application->status) == 'not_accepting' ? 'selected' : '' }}>No Longer Accepting Applications</option>
                        </flux:select>
                    </div>

                    <!-- Applied Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Applied Date</label>
                        <flux:input type="date" name="applied_date" value="{{ old('applied_date', $application->applied_date ? $application->applied_date->format('Y-m-d') : '' ) }}" required class="mt-1 w-full" />
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Location</label>
                        <flux:input type="text" name="location" value="{{ old('location', $application->location) }}" class="mt-1 w-full" />
                    </div>

                    <!-- Salary Range -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Salary Range</label>
                        <flux:input type="text" name="salary_range" value="{{ old('salary_range', $application->salary_range) }}" class="mt-1 w-full" />
                    </div>
                    
                    <!-- Follow-up Section -->
                    <div class="col-span-full">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Follow-up Date</label>
                        <div class="mt-1 flex items-center space-x-4">
                            <flux:input type="date" 
                                name="follow_up_date" 
                                value="{{ old('follow_up_date', optional($application->followUp)->follow_up_date ? optional($application->followUp)->follow_up_date->format('Y-m-d') : '' ) }}"
                                min="{{ date('Y-m-d') }}"
                                class="w-full" />
                            <flux:input type="text" 
                                name="follow_up_notes" 
                                placeholder="Add notes for follow-up"
                                value="{{ old('follow_up_notes', $application->followUp->notes ?? '') }}"
                                class="w-full" />
                        </div>
                    </div>
                </div>

                <!-- Job Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Job Description</label>
                    <flux:textarea name="job_description" rows="4" class="mt-1 w-full">{{ old('job_description', $application->job_description) }}</flux:textarea>
                </div>

                @if($application->documents && $application->documents->count())
                <div class="mb-4">
                    <h3 class="text-md font-semibold mb-2">Uploaded Files</h3>
                    <ul class="space-y-2">
                        @foreach($application->documents as $doc)
                            <li class="flex items-center gap-4">
                                <span class="inline-block px-2 py-1 rounded bg-gray-200 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-200">
                                    {{ ucfirst(str_replace('_', ' ', $doc->type)) }}
                                </span>
                                <span class="text-sm text-gray-900 dark:text-gray-100">
                                    {{ $doc->original_filename ?? basename($doc->filename) }}
                                </span>
                                <a href="{{ asset('storage/documents/' . $doc->filename) }}"
                                class="ml-2 px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-xs"
                                target="_blank" download>
                                <i class="fa fa-download"></i>
                                    Download
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- File Upload Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Resume Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Resume</label>
                        <flux:input type="file" name="resume" accept=".pdf,.doc,.docx" class="mt-1 w-full" />
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Upload your resume (PDF, DOC, DOCX)
                        </p>
                        @error('resume')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Cover Letter Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Cover Letter</label>
                        <flux:input type="file" name="cover_letter" accept=".pdf,.doc,.docx" class="mt-1 w-full" />
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Upload your cover letter (PDF, DOC, DOCX)
                        </p>
                        @error('cover_letter')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('applications.index') }}" 
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-800">
                        Cancel
                    </a>
                    <flux:button type="submit" variant="primary"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Update Application
                    </flux:button>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ['error-alert', 'success-alert'].forEach(id => {
                const alert = document.getElementById(id);
                if (alert) {
                    setTimeout(() => {
                        alert.classList.add('hiding');
                        setTimeout(() => alert.remove(), 300);
                    }, 7000);
                }
            });
        });
    </script>
    @endpush
</x-layouts.app>