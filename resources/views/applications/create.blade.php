<x-layouts.app :title="__('Create Application')">
    <div class="flex flex-col gap-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Add New Application</h1>
        </div>

        <!-- Notification Container -->
        <div class="notification-container">
            @if (session('error'))
                <div id="error-alert" class="notification bg-purple-900 text-white px-4 py-3 rounded-lg shadow-lg flex items-center justify-between mb-4">
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
            <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Company Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Company Name</label>
                        <flux:input type="text" name="company_name" value="{{ old('company_name') }}" required class="mt-1 w-full" />
                    </div>

                    <!-- Job Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Job Title</label>
                        <flux:input type="text" name="job_title" value="{{ old('job_title') }}" required class="mt-1 w-full" />
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                        <flux:select name="status" required class="mt-1 w-full">
                            <option value="applied">Applied</option>
                            <option value="screening">Screening</option>
                            <option value="interviewing">Interviewing</option>
                            <option value="offer">Offer</option>
                            <option value="rejected">Rejected</option>
                            <option value="withdrawn">Withdrawn</option>
                            <option value="not_accepting">No Longer Accepting Applications</option>
                            <option value="accepted" @selected(old('status') == 'accepted')>Accepted</option>
                        </flux:select>
                    </div>

                    <!-- Applied Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Applied Date</label>
                        <flux:input type="date" name="applied_date" value="{{ old('applied_date') }}" required class="mt-1 w-full" />
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Location</label>
                        <flux:input type="text" name="location" value="{{ old('location') }}" class="mt-1 w-full" />
                    </div>

                    <!-- Salary Range -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Salary Range</label>
                        <flux:input type="text" name="salary_range" value="{{ old('salary_range') }}" class="mt-1 w-full" />
                    </div>

                    <!-- Follow-up Section -->
                    <div class="col-span-full">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Follow-up Date</label>
                        <div class="mt-1 flex items-center space-x-4">
                            <flux:input type="date" name="follow_up_date" value="{{ old('follow_up_date') }}" min="{{ date('Y-m-d') }}" class="w-full" />
                            <flux:input type="text" name="follow_up_notes" placeholder="Add notes for follow-up" value="{{ old('follow_up_notes') }}" class="w-full" />
                        </div>
                    </div>

                    <!-- JOB type  section -->

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Job Type</label>
                        <flux:input type="text" name="job_type" placeholder="e.g. Remote, Full-time" value="{{ old('job_type') }}" class="mt-1 w-full" />
                    </div>

                    <!-- Category section -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Category</label>
                        <flux:input type="text" name="category" placeholder="e.g. IT, Health, Business" value="{{ old('category') }}" class="mt-1 w-full" />
                    </div>
                </div>

                <!-- Job Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Job Description</label>
                    <flux:textarea name="job_description" rows="4" class="mt-1 w-full">{{ old('job_description') }}</flux:textarea>
                </div>

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
                        Save Application
                    </flux:button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>