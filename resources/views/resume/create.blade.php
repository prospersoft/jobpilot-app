<x-layouts.app :title="__('JobProfi Resume Builder')">
    <div class="flex flex-col gap-6">
        <!-- Notification Container -->
        <div class="notification-container">
            @if (session('success'))
                <div id="success-alert" class="notification bg-black text-white px-4 py-3 rounded-lg shadow-lg flex items-center justify-between mb-4 relative">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-green-300 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                    <button type="button" onclick="document.getElementById('success-alert').remove()" class="ml-4 text-white hover:text-gray-300 focus:outline-none">
                        <i class="fa-solid fa-xmark fa-lg"></i>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div id="error-alert" class="notification bg-purple-900 text-white px-4 py-3 rounded-lg shadow-lg flex items-center justify-between mb-4 relative">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-purple-300 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                    <button type="button" onclick="document.getElementById('error-alert').remove()" class="ml-4 text-white hover:text-gray-300 focus:outline-none">
                        <i class="fa-solid fa-xmark fa-lg"></i>
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="notification bg-red-700 text-white px-4 py-3 rounded-lg shadow-lg flex items-center justify-between mb-4 relative">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-red-300 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <ul class="text-sm list-disc ml-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>

        <!-- Header Section -->
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-neutral-900 dark:text-white">JobProfi Resume Builder</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Create a professional resume with JobProfi</p>
            </div>
            <div class="flex gap-3">
                
                @php
                    $resumeCount = \App\Models\Resume::where('user_id', auth()->id())->count();
                @endphp

                <flux:button href="{{ route('resume.index') }}" class="!bg-blue-600 hover:!bg-blue-700 text-white !border !border-blue-600 ">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    My Resumes <span class="ml-2 bg-white/20 rounded px-2 py-0.5 text-xs font-bold">{{ $resumeCount }}</span>
                </flux:button>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-4">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Progress</span>
                <span class="text-sm text-gray-500 dark:text-gray-400" id="progress-text">Step 1 of 6</span>
            </div>
            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                <div class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: 16.67%" id="progress-bar"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Form Section -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-neutral-900 rounded-xl shadow">
                    <!-- Step Navigation -->
                    <div class="border-b border-gray-200 dark:border-gray-700 p-6">
                        <nav class="flex space-x-8 overflow-x-auto">
                            <button class="step-nav active whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm" data-step="1">
                                Personal Info
                            </button>
                            <button class="step-nav whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm" data-step="2">
                                Experience
                            </button>
                            <button class="step-nav whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm" data-step="3">
                                Education
                            </button>
                            <button class="step-nav whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm" data-step="4">
                                Skills
                            </button>
                            <button class="step-nav whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm" data-step="5">
                                Projects
                            </button>
                            <button class="step-nav whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm" data-step="6">
                                Additional
                            </button>
                        </nav>
                    </div>

                    <!-- Form Content -->
                    <div class="p-6">
                        <form id="resume-form" class="space-y-6">
                            @csrf

                            <!-- Step 1: Personal Information -->
                            <div class="step-content" data-step="1">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Personal Information</h2>
                                    
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Full Name</label>
                                        <flux:input type="text" name="full_name" required class="mt-1 w-full" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Professional Title</label>
                                        <flux:input type="text" name="professional_title" placeholder="e.g. Senior Software Engineer" class="mt-1 w-full" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                                        <flux:input type="email" name="email" required class="mt-1 w-full" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Phone</label>
                                        <flux:input type="tel" name="phone" class="mt-1 w-full" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Location</label>
                                        <flux:input type="text" name="location" placeholder="City, State" class="mt-1 w-full" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">LinkedIn URL</label>
                                        <flux:input type="url" name="linkedin" placeholder="https://linkedin.com/in/yourname" class="mt-1 w-full" />
                                    </div>
                                </div>
                                
                                <div class="!mt-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Professional Summary</label>
                                    <flux:textarea name="summary" rows="4" placeholder="Brief professional summary highlighting your key strengths and career objectives" class="mt-1 w-full"></flux:textarea>
                                </div>
                            </div>

                            <!-- Step 2: Work Experience -->
                            <div class="step-content hidden" data-step="2">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Work Experience</h2>
                                </div>

                                <div id="experience-container">
                                    <div class="experience-item bg-white dark:bg-neutral-900 rounded-lg p-4 mb-4 ">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Company</label>
                                                <flux:input type="text" name="experience[0][company]" class=""/>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Position</label>
                                                <flux:input type="text" name="experience[0][position]" class=""/>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Start Date</label>
                                                <flux:input type="month" name="experience[0][start_date]" class=""/>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">End Date</label>
                                                <flux:input type="month" name="experience[${index}][end_date]" class="" />
                                                <div class="mt-1 flex items-center">
                                                    <flux:field variant="inline">
                                                        <flux:checkbox wire:model="terms" />

                                                        <flux:label>Currently work here</flux:label>

                                                        <flux:error name="experience[0][end_date]" />
                                                    </flux:field>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Description</label>
                                            <flux:textarea name="experience[0][description]" rows="3" class="" placeholder="Describe your responsibilities and achievements..."></flux:textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="button" id="add-experience" class="w-full py-2 px-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg text-gray-600 dark:text-gray-400 hover:border-gray-400 hover:text-gray-700 dark:hover:border-gray-500 dark:hover:text-gray-300">
                                    + Add Experience
                                </button>
                            </div>

                            <!-- Step 3: Education -->
                            <div class="step-content hidden" data-step="3">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Education</h2>
                                </div>

                                <div id="education-container">
                                    <div class="education-item bg-white dark:bg-neutral-900 rounded-lg p-4 mb-4 ">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Institution</label>
                                                <flux:input type="text" name="education[0][institution]" class=""/>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Degree</label>
                                                <flux:input type="text" name="education[0][degree]" class=""/>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Start Date</label>
                                                <flux:input type="month" name="education[0][start_date]" class=""/>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">End Date</label>
                                                <flux:input type="month" name="education[0][end_date]" class=""/>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Field of Study</label>
                                            <flux:input type="text" name="education[0][field_of_study]" class=""/>
                                        </div>
                                        <div class="mt-4">
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">GPA (Optional)</label>
                                            <flux:input type="text" name="education[0][gpa]" class="" placeholder="e.g. 3.8/4.0"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="button" id="add-education" class="w-full py-2 px-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg text-gray-600 dark:text-gray-400 hover:border-gray-400 hover:text-gray-700 dark:hover:border-gray-500 dark:hover:text-gray-300">
                                    + Add Education
                                </button>
                            </div>

                            <!-- Step 4: Skills -->
                            <div class="step-content hidden" data-step="4">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Skills</h2>
                                </div>

                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Technical Skills</label>
                                        <div class="skill-input-container">
                                            <flux:input type="text" id="technical-skills-input" placeholder="Type a skill and press Enter" class="w-full" />
                                            <div id="technical-skills-tags" class="flex flex-wrap gap-2 mt-2"></div>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Soft Skills</label>
                                        <div class="skill-input-container">
                                            <flux:input type="text" id="soft-skills-input" placeholder="Type a skill and press Enter" class="w-full" />
                                            <div id="soft-skills-tags" class="flex flex-wrap gap-2 mt-2"></div>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Languages</label>
                                        <div id="languages-container">
                                            <div class="language-item flex items-center gap-4 mb-2">
                                                <!-- <flux:input type="text" name="languages[0][name]" placeholder="Language" class="flex-1 hidden" />
                                                <flux:select name="languages[0][level]" class="w-32">
                                                    <option value="native">Native</option>
                                                    <option value="fluent">Fluent</option>
                                                    <option value="intermediate">Intermediate</option>
                                                    <option value="basic">Basic</option>
                                                </flux:select>
                                                <button type="button" class="remove-language text-red-600 hover:text-red-800">×</button> -->
                                            </div>
                                        </div>
                                        <button type="button" id="add-language" class="text-blue-600 hover:text-blue-800 text-sm">+ Add Language</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 5: Projects -->
                            <div class="step-content hidden" data-step="5">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Projects</h2>
                                </div>

                                <div id="projects-container">
                                    <div class="project-item rounded-lg p-4 mb-4">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Project Name</label>
                                                <flux:input type="text" name="projects[0][name]" class="mt-1 w-full" />
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Project URL</label>
                                                <flux:input type="url" name="projects[0][url]" placeholder="https://..." class="mt-1 w-full" />
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Technologies Used</label>
                                            <flux:input type="text" name="projects[0][technologies]" placeholder="React, Node.js, MongoDB" class="mt-1 w-full" />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                                            <flux:textarea name="projects[0][description]" rows="3" placeholder="Describe the project, your role, and key achievements" class="mt-1 w-full"></flux:textarea>
                                        </div>
                                        <button type="button" class="remove-project mt-2 text-red-600 hover:text-red-800 text-sm">Remove</button>
                                    </div>
                                </div>
                                
                                <button type="button" id="add-project" class="w-full py-2 px-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg text-gray-600 dark:text-gray-400 hover:border-gray-400 hover:text-gray-700 dark:hover:border-gray-500 dark:hover:text-gray-300">
                                    + Add Project
                                </button>
                            </div>

                            <!-- Step 6: Additional Sections -->
                            <div class="step-content hidden" data-step="6">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Additional Information</h2>
                                </div>

                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Certifications</label>
                                        <flux:textarea name="certifications" rows="3" placeholder="List your certifications, each on a new line" class="mt-1 w-full"></flux:textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Awards & Achievements</label>
                                        <flux:textarea name="awards" rows="3" placeholder="List your awards and achievements" class="mt-1 w-full"></flux:textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Volunteer Experience</label>
                                        <flux:textarea name="volunteer" rows="3" placeholder="Describe your volunteer work and community involvement" class="mt-1 w-full"></flux:textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Interests & Hobbies</label>
                                        <flux:textarea name="interests" rows="2" placeholder="Personal interests that might be relevant to your career" class="mt-1 w-full"></flux:textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Navigation Footer -->
                    <div class="border-t border-gray-200 dark:border-gray-700 px-6 py-4">
                        <div class="flex justify-between">
                            <button id="prev-step" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-800 disabled:opacity-50" disabled>
                                Previous
                            </button>
                            <div class="flex gap-2">
                                <button id="next-step" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                    Next
                                </button>
                                <button id="generate-resume"  class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 hidden">
                                    Generate Resume
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Assistant Panel -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-neutral-900 rounded-xl shadow p-6 sticky top-4">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 dark:text-blue-400">📝</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">Resume Builder Tips</h3>
                    </div>
                    
                    <div id="builder-suggestions" class="space-y-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                            <h4 class="font-medium text-blue-900 dark:text-blue-100 mb-2">💡 Quick Tips</h4>
                            <ul class="text-sm text-blue-800 dark:text-blue-200 space-y-1">
                                <li>• Use action verbs in your experience descriptions</li>
                                <li>• Quantify your achievements with numbers</li>
                                
                            </ul>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4">
                            <h4 class="font-medium text-green-900 dark:text-green-100 mb-2">🎯 Resume Building Features</h4>
                            <ul class="text-sm text-green-800 dark:text-green-200 space-y-2">
                                <li>• <strong>Smart Content:</strong> Write clear, concise descriptions</li>
                               
                                <li>• <strong>ATS Optimization:</strong> Make your resume scanner-friendly</li>
                            </ul>
                        </div>
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4">
                            <h4 class="font-medium text-yellow-900 dark:text-yellow-100 mb-2">📊 Completion Status</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-yellow-800 dark:text-yellow-200">Personal Info</span>
                                    <span class="text-yellow-600 dark:text-yellow-400" id="personal-status">0%</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-yellow-800 dark:text-yellow-200">Experience</span>
                                    <span class="text-yellow-600 dark:text-yellow-400" id="experience-status">0%</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-yellow-800 dark:text-yellow-200">Education</span>
                                    <span class="text-yellow-600 dark:text-yellow-400" id="education-status">0%</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-yellow-800 dark:text-yellow-200">Skills</span>
                                    <span class="text-yellow-600 dark:text-yellow-400" id="skills-status">0%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

   

    <script>
        // Notification helper for custom messages (copied style from applications/index.blade.php)
        function showCustomMessage(message, type = 'error') {
            // Remove any existing overlay notification
            document.querySelectorAll('.notification-overlay').forEach(el => el.remove());
            const overlay = document.createElement('div');
            overlay.className = 'notification-overlay fixed inset-0 z-50 flex items-center justify-center pointer-events-none';
            overlay.innerHTML = `
                <div class="notification bg-${type === 'success' ? 'black' : 'black'} text-white px-6 py-4 rounded-xl shadow-2xl flex items-center justify-between relative pointer-events-auto animate-fade-in">
                    <div class="flex items-center">
                        <i class="fa-solid fa-${type === 'success' ? 'check' : 'exclamation'} mr-4"></i>
                        <p class="text-base mx-2">${message}</p>
                    </div>
                    <button type="button" onclick="this.closest('.notification-overlay').remove()" class="ml-6 text-white hover:text-gray-300 focus:outline-none">
                        <i class="fa-solid fa-xmark fa-lg"></i>
                    </button>
                </div>
            `;
            document.body.appendChild(overlay);
            setTimeout(() => {
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.remove(), 400);
            }, 5000);
        }

        // Keyword extraction and resume tailoring logic
        function extractKeywords(text) {
            // Simple keyword extraction: split by non-word, filter stopwords, dedupe, sort by frequency
            const stopwords = [
                'the','and','for','with','you','are','but','not','all','any','can','will','has','have','from','that','this','your','our','who','job','role','work','must','should','may','etc','per','as','on','in','to','of','a','an','is','be','or','by','at','if','it','we','us','they','their','them','he','she','his','her','was','were','been','being','do','does','did','so','such','than','then','these','those','which','what','when','where','why','how','about','into','out','over','under','above','below','between','after','before','during','each','other','any','some','no','yes','also','using','used','use','job','role','position','work','team','skills','experience','required','preferred','responsibilities','requirements','qualifications','applicant','candidate','applicants','candidates','etc','etc.'
            ];
            let words = text.toLowerCase().match(/\b[a-zA-Z][a-zA-Z0-9\-\+\.]{1,}\b/g) || [];
            let freq = {};
            words.forEach(w => {
                if (!stopwords.includes(w) && w.length > 2) {
                    freq[w] = (freq[w]||0)+1;
                }
            });
            // Sort by frequency, then alphabetically
            let sorted = Object.keys(freq).sort((a,b) => freq[b]-freq[a] || a.localeCompare(b));
            return sorted.slice(0, 20); // Top 20 keywords
        }

        let jobKeywords = [];
        document.getElementById('job-description-input').addEventListener('input', function() {
            const text = this.value;
            jobKeywords = extractKeywords(text);
            document.getElementById('job-keywords-result').innerHTML = jobKeywords.length
                ? `<span class='font-semibold'>Extracted Keywords:</span> ` + jobKeywords.map(k=>`<span class='inline-block bg-yellow-200 text-yellow-900 rounded px-2 py-0.5 mr-1 mb-1'>${k}</span>`).join('')
                : '';
        });

        // Resume tailoring: compare keywords with resume fields
        function getResumeText() {
            // Collect all relevant resume fields as a single string
            let text = '';
            const form = document.getElementById('resume-form');
            if (!form) return '';
            const fields = [
                'full_name','professional_title','summary','certifications','awards','volunteer','interests'
            ];
            fields.forEach(name => {
                let el = form.querySelector(`[name="${name}"]`);
                if (el && el.value) text += ' ' + el.value;
            });
            // Experience descriptions
            form.querySelectorAll('[name^="experience"]').forEach(el => { if (el.value) text += ' ' + el.value; });
            // Education
            form.querySelectorAll('[name^="education"]').forEach(el => { if (el.value) text += ' ' + el.value; });
            // Skills (from tags)
            text += ' ' + (window.technicalSkills||[]).join(' ');
            text += ' ' + (window.softSkills||[]).join(' ');
            // Languages
            form.querySelectorAll('[name^="languages"]').forEach(el => { if (el.value) text += ' ' + el.value; });
            // Projects
            form.querySelectorAll('[name^="projects"]').forEach(el => { if (el.value) text += ' ' + el.value; });
            return text.toLowerCase();
        }

        function compareKeywords() {
            const resumeText = getResumeText();
            const matched = jobKeywords.filter(k => resumeText.includes(k));
            const missing = jobKeywords.filter(k => !resumeText.includes(k));
            return { matched, missing };
        }

        // Enhance preview to highlight matched keywords and show missing ones
        function highlightKeywords(text, keywords) {
            if (!keywords.length) return text;
            let re = new RegExp('\\b(' + keywords.map(k=>k.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')).join('|') + ')\\b', 'gi');
            return text.replace(re, '<mark class="bg-yellow-200 text-yellow-900">$1</mark>');
        }

    </script>

    <style>
        .step-nav.active {
            border-color: #2563eb;
            color: #2563eb;
        }
        .step-nav {
            border-color: transparent;
            color: #6b7280;
            transition: all 0.2s;
        }
        .step-nav:hover {
            color: #374151;
            border-color: #d1d5db;
        }
        .dark .step-nav {
            color: #9ca3af;
        }
        .dark .step-nav.active {
            color: #60a5fa;
            border-color: #60a5fa;
        }
        .dark .step-nav:hover {
            color: #d1d5db;
            border-color: #4b5563;
        }
        
        .skill-tag {
            background: #dbeafe;
            color: #1e40af;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .dark .skill-tag {
            background: #1e3a8a;
            color: #93c5fd;
        }
        .skill-tag button {
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            padding: 0;
            font-size: 1rem;
            line-height: 1;
        }

        /* Overlay notification styles */
        .notification-overlay { background: rgba(0,0,0,0.25); }
        @keyframes fade-in { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
        .animate-fade-in { animation: fade-in 0.2s ease; }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentStep = 1;
            const totalSteps = 6;
            
            // Step navigation
            const stepNavButtons = document.querySelectorAll('.step-nav');
            const stepContents = document.querySelectorAll('.step-content');
            const prevBtn = document.getElementById('prev-step');
            const nextBtn = document.getElementById('next-step');
            const generateBtn = document.getElementById('generate-resume');
            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');
            
            // Skills arrays
            let technicalSkills = [];
            let softSkills = [];
            
            // Initialize
            updateStepDisplay();
            
            // Step navigation handlers
            stepNavButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const step = parseInt(btn.dataset.step);
                    if (step <= currentStep + 1) { // Allow navigation to next step or completed steps
                        goToStep(step);
                    }
                });
            });
            
            prevBtn.addEventListener('click', () => {
                if (currentStep > 1) {
                    goToStep(currentStep - 1);
                }
            });
            
            nextBtn.addEventListener('click', () => {
                if (currentStep < totalSteps) {
                    goToStep(currentStep + 1);
                }
            });
            
            function goToStep(step) {
                currentStep = step;
                updateStepDisplay();
            }
            
            function updateStepDisplay() {
                // Update step navigation
                stepNavButtons.forEach((btn, index) => {
                    btn.classList.toggle('active', index + 1 === currentStep);
                });
                
                // Update step content
                stepContents.forEach((content, index) => {
                    content.classList.toggle('hidden', index + 1 !== currentStep);
                });
                
                // Update navigation buttons
                prevBtn.disabled = currentStep === 1;
                nextBtn.classList.toggle('hidden', currentStep === totalSteps);
                generateBtn.classList.toggle('hidden', currentStep !== totalSteps);
                
                // Update progress
                const progress = (currentStep / totalSteps) * 100;
                progressBar.style.width = progress + '%';
                progressText.textContent = `Step ${currentStep} of ${totalSteps}`;
            }
            
            // Dynamic form sections
            let experienceCount = 1;
            let educationCount = 1;
            let projectCount = 1;
            let languageCount = 1;
            
            // Add experience
            document.getElementById('add-experience').addEventListener('click', function() {
                const container = document.getElementById('experience-container');
                const newItem = createExperienceItem(experienceCount);
                container.appendChild(newItem);
                experienceCount++;
            });
            
            // Add education
            document.getElementById('add-education').addEventListener('click', function() {
                const container = document.getElementById('education-container');
                const newItem = createEducationItem(educationCount);
                container.appendChild(newItem);
                educationCount++;
            });
            
            // Add project
            document.getElementById('add-project').addEventListener('click', function() {
                const container = document.getElementById('projects-container');
                const newItem = createProjectItem(projectCount);
                container.appendChild(newItem);
                projectCount++;
            });
            
            // Add language
            document.getElementById('add-language').addEventListener('click', function() {
                const container = document.getElementById('languages-container');
                const newItem = createLanguageItem(languageCount);
                container.appendChild(newItem);
                languageCount++;
            });
            
            // Create item functions
            function createExperienceItem(index) {
                const div = document.createElement('div');
                div.className = 'experience-item border   rounded-lg p-4 mb-4';
                div.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Job Title</label>
                            <flux:input type="text" name="experience[${index}][title]" class="" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Company</label>
                            <flux:input type="text" name="experience[${index}][company]" class="" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Start Date</label>
                            <flux:input type="month" name="experience[${index}][start_date]" class="" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">End Date</label>
                            <flux:input type="month" name="experience[${index}][end_date]" class="" />
                            <div class="mt-1 flex items-center">
                                <input type="checkbox" id="experience-current-${index}" name="experience[${index}][current]" value="1" class="current-checkbox mr-2">
                                <label for="experience-current-${index}" class="text-sm text-gray-600 dark:text-gray-400 select-none cursor-pointer">Currently work here</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description & Achievements</label>
                        <flux:textarea name="experience[${index}][description]" rows="4" placeholder="• Describe your responsibilities and achievements using bullet points" class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"></flux:textarea>
                    </div>
                    <button type="button" class="remove-experience mt-2 text-red-600 hover:text-red-800 text-sm">Remove</button>
                `;
                // Checkbox logic: disable end date if checked
                const checkbox = div.querySelector('.current-checkbox');
                const endDateInput = div.querySelector('.end-date-input');
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        endDateInput.value = '';
                        endDateInput.disabled = true;
                    } else {
                        endDateInput.disabled = false;
                    }
                });
                div.querySelector('.remove-experience').addEventListener('click', function() {
                    div.remove();
                });
                return div;
            }
            
            function createEducationItem(index) {
                const div = document.createElement('div');
                div.className = 'education-item border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-4';
                div.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Degree</label>
                            <flux:input type="text" name="education[${index}][degree]" placeholder="e.g. Bachelor of Science" class="" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Field of Study</label>
                            <flux:input type="text" name="education[${index}][field]" placeholder="e.g. Computer Science" class="" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">School</label>
                            <flux:input type="text" name="education[${index}][school]" class="" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Graduation Year</label>
                            <flux:input type="number" name="education[${index}][year]" min="1950" max="2030" class="" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">GPA (Optional)</label>
                            <flux:input type="text" name="education[${index}][gpa]" placeholder="3.8/4.0" class="" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Relevant Coursework/Achievements</label>
                        <flux:textarea name="education[${index}][details]" rows="2" placeholder="Relevant coursework, honors, activities" class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:border-blue-500 focus:ring-blue-500"></flux:textarea>
                    </div>
                    <button type="button" class="remove-education mt-2 text-red-600 hover:text-red-800 text-sm">Remove</button>
                `;
                
                div.querySelector('.remove-education').addEventListener('click', function() {
                    div.remove();
                });
                
                return div;
            }
            
            function createProjectItem(index) {
                const div = document.createElement('div');
                div.className = 'project-item border border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-4';
                div.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Project Name</label>
                            <flux:input type="text" name="projects[${index}][name]" class="" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Project URL</label>
                            <flux:input type="url" name="projects[${index}][url]" placeholder="https://..." class="" />
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Technologies Used</label>
                        <flux:input type="text" name="projects[${index}][technologies]" placeholder="React, Node.js, MongoDB" class="" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                        <flux:textarea name="projects[${index}][description]" rows="3" placeholder="Describe the project, your role, and key achievements" class=""></flux:textarea>
                    </div>
                    <button type="button" class="remove-project mt-2 text-red-600 hover:text-red-800 text-sm">Remove</button>
                `;
                
                div.querySelector('.remove-project').addEventListener('click', function() {
                    div.remove();
                });
                
                return div;
            }
            
            function createLanguageItem(index) {
                const div = document.createElement('div');
                div.className = 'language-item flex items-center gap-4 mb-2';
                div.innerHTML = `
                    <flux:input type="text" name="languages[${index}][name]" placeholder="Language" class="" />
                    <flux:select name="languages[${index}][level]" class="">
                        <flux:select.option value="native">Native</flux:select.option>
                        <flux:select.option value="fluent">Fluent</flux:select.option>
                        <flux:select.option value="intermediate">Intermediate</flux:select.option>
                        <flux:select.option value="basic">Basic</flux:select.option>
                    </flux:select>
                    <button type="button" class="remove-language text-red-400 hover:text-red-800"><i class="fas fa-trash-alt"></i></button>
                `;
                
                div.querySelector('.remove-language').addEventListener('click', function() {
                    div.remove();
                });
                
                return div;
            }
            
            // Skills handling
            function setupSkillsInput(inputId, tagsContainerId, skillsArray) {
                const input = document.getElementById(inputId);
                const container = document.getElementById(tagsContainerId);
                
                input.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        const skill = this.value.trim();
                        if (skill && !skillsArray.includes(skill)) {
                            skillsArray.push(skill);
                            addSkillTag(container, skill, skillsArray);
                            this.value = '';
                        }
                    }
                });
            }
            
            function addSkillTag(container, skill, skillsArray) {
                const tag = document.createElement('span');
                tag.className = 'skill-tag';
                tag.innerHTML = `
                    ${skill}
                    <button type="button" onclick="this.parentElement.remove(); removeSkill('${skill}', ${JSON.stringify(skillsArray).replace(/"/g, '&quot;')})">×</button>
                `;
                container.appendChild(tag);
            }
            
            window.removeSkill = function(skill, skillsArray) {
                const index = skillsArray.indexOf(skill);
                if (index > -1) {
                    skillsArray.splice(index, 1);
                }
            };
            
            setupSkillsInput('technical-skills-input', 'technical-skills-tags', technicalSkills);
            setupSkillsInput('soft-skills-input', 'soft-skills-tags', softSkills);
            
            // Remove handlers for existing items
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-experience')) {
                    e.target.closest('.experience-item').remove();
                }
                if (e.target.classList.contains('remove-education')) {
                    e.target.closest('.education-item').remove();
                }
                if (e.target.classList.contains('remove-project')) {
                    e.target.closest('.project-item').remove();
                }
                if (e.target.classList.contains('remove-language')) {
                    e.target.closest('.language-item').remove();
                }
            });
            
           
            function renderAtsResume(data) {
                // Helper for section
                function section(title, content) {
                    return `<div class="mb-6"><h4 class="text-base font-bold text-gray-900 dark:text-white mb-2 uppercase tracking-wide">${title}</h4>${content}</div>`;
                }
                // Personal Info
                let personal = `<div class="mb-2 text-xl font-bold">${data.full_name || ''}</div>`;
                personal += `<div class="mb-1 text-sm font-semibold">${data.professional_title || ''}</div>`;
                personal += `<div class="mb-1 text-sm">${data.email || ''} | ${data.phone || ''} | ${data.location || ''}</div>`;
                if (data.linkedin) personal += `<div class="mb-1 text-sm"><a href="${data.linkedin}" class="text-blue-700 underline" target="_blank">${data.linkedin}</a></div>`;
                // Summary
                let summary = data.summary ? `<div class="mb-2 text-sm">${data.summary}</div>` : '';
                // Experience
                let experience = '';
                if (Array.isArray(data.experience)) {
                    experience = data.experience.filter(Boolean).map(exp => {
                        if (!exp) return '';
                        return `<div class="mb-3">
                            <div class="font-semibold">${exp.title || ''}${exp.company ? ' at ' + exp.company : ''}</div>
                            <div class="text-xs text-gray-500">${exp.start_date || ''} - ${exp.current ? 'Present' : (exp.end_date || '')}</div>
                            <div class="text-sm whitespace-pre-line">${exp.description || ''}</div>
                        </div>`;
                    }).join('');
                }
                // Education
                let education = '';
                if (Array.isArray(data.education)) {
                    education = data.education.filter(Boolean).map(edu => {
                        if (!edu) return '';
                        return `<div class="mb-3">
                            <div class="font-semibold">${edu.degree || ''}${edu.field ? ', ' + edu.field : ''}</div>
                            <div class="text-xs text-gray-500">${edu.school || ''}${edu.year ? ' (' + edu.year + ')' : ''}</div>
                            <div class="text-sm">${edu.details || ''}</div>
                        </div>`;
                    }).join('');
                }
                // Skills
                let skills = '';
                if ((data.technical_skills && data.technical_skills.length) || (data.soft_skills && data.soft_skills.length)) {
                    skills = `<div><span class="font-semibold">Technical:</span> ${data.technical_skills.join(', ')}</div>`;
                    skills += `<div><span class="font-semibold">Soft:</span> ${data.soft_skills.join(', ')}</div>`;
                }
                // Languages
                let languages = '';
                if (Array.isArray(data.languages)) {
                    languages = data.languages.filter(Boolean).map(lang => {
                        if (!lang) return '';
                        return `<span>${lang.name || ''}${lang.level ? ' (' + lang.level + ')' : ''}</span>`;
                    }).join(', ');
                }
                // Projects
                let projects = '';
                if (Array.isArray(data.projects)) {
                    projects = data.projects.filter(Boolean).map(proj => {
                        if (!proj) return '';
                        return `<div class="mb-3">
                            <div class="font-semibold">${proj.name || ''}</div>
                            <div class="text-xs text-gray-500">${proj.technologies || ''}${proj.url ? ' | <a href="' + proj.url + '" class="text-blue-700 underline" target="_blank">' + proj.url + '</a>' : ''}</div>
                            <div class="text-sm">${proj.description || ''}</div>
                        </div>`;
                    }).join('');
                }
                // Additional
                let additional = '';
                if (data.certifications) additional += `<div><span class="font-semibold">Certifications:</span><br>${data.certifications.replace(/\n/g, '<br>')}</div>`;
                if (data.awards) additional += `<div class="mt-2"><span class="font-semibold">Awards:</span><br>${data.awards.replace(/\n/g, '<br>')}</div>`;
                if (data.volunteer) additional += `<div class="mt-2"><span class="font-semibold">Volunteer:</span><br>${data.volunteer.replace(/\n/g, '<br>')}</div>`;
                if (data.interests) additional += `<div class="mt-2"><span class="font-semibold">Interests:</span><br>${data.interests.replace(/\n/g, '<br>')}</div>`;
                // Compose sections
                let html = '';
                html += section('Personal Information', personal);
                if (summary) html += section('Professional Summary', summary);
                if (experience) html += section('Work Experience', experience);
                if (education) html += section('Education', education);
                if (skills) html += section('Skills', skills);
                if (languages) html += section('Languages', languages);
                if (projects) html += section('Projects', projects);
                if (additional) html += section('Additional Information', additional);
                return `<div class="prose max-w-none dark:prose-invert">${html}</div>`;
            }
            
            // Change Generate Resume button to Finish and save to DB
            const finishBtn = document.getElementById('generate-resume');
            finishBtn.textContent = 'Finish';
            finishBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
            finishBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
            let savedResumeId = null;

            function validateRequiredFields() {
                const form = document.getElementById('resume-form');
                // Required fields
                const requiredFields = [
                    'full_name',
                    'professional_title',
                    'email',
                    'phone',
                    'location'
                ];
                let valid = true;
                for (const name of requiredFields) {
                    const el = form.querySelector(`[name="${name}"]`);
                    if (!el || !el.value.trim()) {
                        valid = false;
                        break;
                    }
                }
                // At least one experience
                const experienceItems = form.querySelectorAll('[name^="experience["]');
                if (experienceItems.length === 0) valid = false;
                // At least one education
                const educationItems = form.querySelectorAll('[name^="education["]');
                if (educationItems.length === 0) valid = false;
                return valid;
            }

            finishBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (!validateRequiredFields()) {
                    showCustomMessage('Please fill the required fields.');
                    return;
                }
                finishBtn.disabled = true;
                const form = document.getElementById('resume-form');

                // For each experience, if 'currently work here' is checked, clear the end date value
                const experienceItems = form.querySelectorAll('.experience-item');
                experienceItems.forEach((item, idx) => {
                    const currentCheckbox = item.querySelector(`input[type="checkbox"][name^="experience"][name$="[current]"]`);
                    const endDateInput = item.querySelector(`input[type="month"][name^="experience"][name$="[end_date]"]`);
                    if (currentCheckbox && currentCheckbox.checked && endDateInput) {
                        endDateInput.value = '';
                    }
                });

                const formData = new FormData(form);
                formData.append('technical_skills', JSON.stringify(technicalSkills));
                formData.append('soft_skills', JSON.stringify(softSkills));
                // Parse dynamic sections
                function parseSection(prefix) {
                    const items = [];
                    let i = 0;
                    while (true) {
                        let found = false;
                        const item = {};
                        const fields = form.querySelectorAll(`[name^='${prefix}[${i}]']`);
                        if (fields.length === 0) break;
                        fields.forEach(f => {
                            const match = f.name.match(/\[([0-9]+)\]\[([^\]]+)\]/);
                            if (match) {
                                // Only include end_date if not empty
                                if (match[2] === 'end_date' && !f.value) return;
                                item[match[2]] = f.type === 'checkbox' ? f.checked : f.value;
                                found = true;
                            }
                        });
                        if (found) items.push(item);
                        i++;
                    }
                    return items;
                }
                formData.set('experience', JSON.stringify(parseSection('experience')));
                formData.set('education', JSON.stringify(parseSection('education')));
                formData.set('projects', JSON.stringify(parseSection('projects')));
                formData.set('languages', JSON.stringify(parseSection('languages')));

                fetch('/resume/store', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    finishBtn.disabled = false;
                    if (data.id && data.redirect) {
                        savedResumeId = data.id;
                        window.location.href = data.redirect;
                    } else {
                        showCustomMessage('Failed to save resume.');
                    }
                })
                .catch(() => {
                    finishBtn.disabled = false;
                    showCustomMessage('Failed to save resume.');
                });
            });
        });
    </script>

    <!-- --- Job Description Keyword Extraction and Matching --- -->
    <script>
       




    </script>
</x-layouts.app>