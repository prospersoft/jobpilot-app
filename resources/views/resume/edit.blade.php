<x-layouts.app :title="__('Edit Resume')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Edit Resume</h1>
                <p class="text-sm text-neutral-600 dark:text-neutral-400">Update your professional information</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('resume.show', $resume) }}">
                    <flux:button variant="outline" class="!border-neutral-300 dark:!border-neutral-600">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Preview
                    </flux:button>
                </a>
            </div>
        </div>

        <!-- Notification Overlay -->
        @if (session('success') || session('error') || $errors->any())
            <div class="fixed left-1/2 top-12 z-50 -translate-x-1/2 flex items-center justify-center">
                <div role="alert" class="animate-fade-in bg-white dark:bg-neutral-900 border border-green-400 dark:border-green-600 shadow-lg rounded-xl px-6 py-4 flex items-center gap-3 min-w-[260px] max-w-full">
                    <span class="text-green-500">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </span>
                    <span class="text-neutral-900 dark:text-white font-medium">
                        @if(session('success'))
                            {{ session('success') }}
                        @elseif(session('error'))
                            {{ session('error') }}
                        @elseif($errors->any())
                            {{ $errors->first() }}
                        @endif
                    </span>
                    <button type="button" onclick="this.closest('div[role=alert]').remove()" class="ml-auto text-neutral-400 hover:text-neutral-700 dark:hover:text-white focus:outline-none">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            </div>
        @endif

        <!-- Main Form -->
        <div class="relative flex-1 overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-900">
            <form action="{{ route('resume.update', $resume) }}" method="POST" class="h-full">
                @csrf
                @method('PUT')
                
                <div class="h-full overflow-y-auto p-6 scrollbar scrollbar-thin scrollbar-thumb-rounded-md scrollbar-thumb-gray-400 dark:scrollbar-thumb-gray-600 scrollbar-track-gray-200 dark:scrollbar-track-gray-800 hover:scrollbar-thumb-gray-500 dark:hover:scrollbar-thumb-gray-500">
                    <div class="max-w-4xl mx-auto space-y-8">
                        
                        <!-- Personal Information Section -->
                        <div class="bg-neutral-50 dark:bg-neutral-800 rounded-xl p-6">
                            <h2 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4 flex items-center">
                                <svg class="h-5 w-5 mr-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Personal Information
                            </h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                        Full Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="full_name" value="{{ old('full_name', $resume->full_name) }}" 
                                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                           required>
                                    @error('full_name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                        Professional Title
                                    </label>
                                    <input type="text" name="professional_title" value="{{ old('professional_title', $resume->professional_title) }}" 
                                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                           placeholder="e.g. Senior Software Engineer">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                        Email
                                    </label>
                                    <input type="email" name="email" value="{{ old('email', $resume->email) }}" 
                                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                        Phone
                                    </label>
                                    <input type="tel" name="phone" value="{{ old('phone', $resume->phone) }}" 
                                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                        Location
                                    </label>
                                    <input type="text" name="location" value="{{ old('location', $resume->location) }}" 
                                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                           placeholder="City, State/Country">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                        LinkedIn URL
                                    </label>
                                    <input type="url" name="linkedin" value="{{ old('linkedin', $resume->linkedin) }}" 
                                           class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                           placeholder="https://linkedin.com/in/yourprofile">
                                </div>
                            </div>

                            <div class="mt-6">
                                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                                    Professional Summary
                                </label>
                                <textarea name="summary" rows="4" 
                                          class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                          placeholder="Write a brief summary of your professional background and key achievements...">{{ old('summary', $resume->summary) }}</textarea>
                            </div>
                        </div>

                        <!-- Experience Section -->
                        <div class="bg-neutral-50 dark:bg-neutral-800 rounded-xl p-6">
                            <h2 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4 flex items-center">
                                <svg class="h-5 w-5 mr-2 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 00-2 2H8a2 2 0 00-2-2V6m8 0h2a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h2"></path>
                                </svg>
                                Work Experience
                            </h2>
                            
                            <div id="experience-container">
                                @php
                                    $expRaw = $resume->experience ?? '[]';
                                    $expOld = old('experience');
                                    $experiences = $expOld ?? (is_array($expRaw) ? $expRaw : (json_decode($expRaw, true) ?: []));
                                    if (empty($experiences)) {
                                        $experiences = [['company' => '', 'position' => '', 'start_date' => '', 'end_date' => '', 'description' => '', 'current' => false]];
                                    }
                                @endphp
                                @foreach($experiences as $index => $experience)
                                <div class="experience-item bg-white dark:bg-neutral-900 rounded-lg p-4 mb-4 border border-neutral-200 dark:border-neutral-700">
                                    <div class="flex justify-between items-start mb-4">
                                        <h3 class="font-medium text-neutral-900 dark:text-white">Experience {{ $index + 1 }}</h3>
                                        @if($index > 0)
                                        <button type="button" onclick="removeExperience(this)" class="text-red-500 hover:text-red-700">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                        @endif
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Company</label>
                                            <input type="text" name="experience[{{ $index }}][company]" value="{{ $experience['company'] ?? '' }}" 
                                                   class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Position</label>
                                            <input type="text" name="experience[{{ $index }}][position]" value="{{ $experience['position'] ?? '' }}" 
                                                   class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Start Date</label>
                                            <input type="month" name="experience[{{ $index }}][start_date]" value="{{ $experience['start_date'] ?? '' }}" 
                                                   class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">End Date</label>
                                            <input type="month" name="experience[{{ $index }}][end_date]" value="{{ $experience['end_date'] ?? '' }}" 
                                                   class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                   {{ isset($experience['current']) && $experience['current'] ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="experience[{{ $index }}][current]" value="1" 
                                                   {{ isset($experience['current']) && $experience['current'] ? 'checked' : '' }}
                                                   class="rounded border-neutral-300 dark:border-neutral-600 text-blue-600 focus:ring-blue-500"
                                                   onchange="toggleCurrentJob(this)">
                                            <span class="ml-2 text-sm text-neutral-700 dark:text-neutral-300">I currently work here</span>
                                        </label>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Description</label>
                                        <textarea name="experience[{{ $index }}][description]" rows="3" 
                                                  class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                  placeholder="Describe your responsibilities and achievements...">{{ $experience['description'] ?? '' }}</textarea>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <flux:button type="button" onclick="addExperience()" class="mt-4 !bg-purple-600 hover:!bg-purple-700 text-white">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Add Experience
                            </flux:button>
                        </div>

                        <!-- Education Section -->
                        <div class="bg-neutral-50 dark:bg-neutral-800 rounded-xl p-6">
                            <h2 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4 flex items-center">
                                <svg class="h-5 w-5 mr-2 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                </svg>
                                Education
                            </h2>
                            
                            <div id="education-container">
                                @php
                                    $eduRaw = $resume->education ?? '[]';
                                    $eduOld = old('education');
                                    $educations = $eduOld ?? (is_array($eduRaw) ? $eduRaw : (json_decode($eduRaw, true) ?: []));
                                    if (empty($educations)) {
                                        $educations = [['institution' => '', 'degree' => '', 'field' => '', 'start_date' => '', 'end_date' => '', 'gpa' => '']];
                                    }
                                @endphp
                                @foreach($educations as $index => $education)
                                <div class="education-item bg-white dark:bg-neutral-900 rounded-lg p-4 mb-4 border border-neutral-200 dark:border-neutral-700">
                                    <div class="flex justify-between items-start mb-4">
                                        <h3 class="font-medium text-neutral-900 dark:text-white">Education {{ $index + 1 }}</h3>
                                        @if($index > 0)
                                        <button type="button" onclick="removeEducation(this)" class="text-red-500 hover:text-red-700">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                        @endif
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Institution</label>
                                            <input type="text" name="education[{{ $index }}][institution]" value="{{ $education['institution'] ?? '' }}" 
                                                   class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Degree</label>
                                            <input type="text" name="education[{{ $index }}][degree]" value="{{ $education['degree'] ?? '' }}" 
                                                   class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Bachelor of Science">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Field of Study</label>
                                            <input type="text" name="education[{{ $index }}][field]" value="{{ $education['field'] ?? '' }}" 
                                                   class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Computer Science">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">GPA (Optional)</label>
                                            <input type="text" name="education[{{ $index }}][gpa]" value="{{ $education['gpa'] ?? '' }}" 
                                                   class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. 3.8/4.0">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Start Date</label>
                                            <input type="month" name="education[{{ $index }}][start_date]" value="{{ $education['start_date'] ?? '' }}" 
                                                   class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">End Date</label>
                                            <input type="month" name="education[{{ $index }}][end_date]" value="{{ $education['end_date'] ?? '' }}" 
                                                   class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <flux:button type="button" onclick="addEducation()" class="mt-4 !bg-green-600 hover:!bg-green-700 text-white">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Add Education
                            </flux:button>
                        </div>

                        <!-- Skills Section -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Technical Skills -->
                            <div class="bg-neutral-50 dark:bg-neutral-800 rounded-xl p-6">
                                <h2 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4 flex items-center">
                                    <svg class="h-5 w-5 mr-2 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                    </svg>
                                    Technical Skills
                                </h2>
                                
                                <div id="technical-skills-container">
                                    @php
                                        $tsRaw = $resume->technical_skills ?? '[]';
                                        $tsOld = old('technical_skills');
                                        $technicalSkills = $tsOld ?? (is_array($tsRaw) ? $tsRaw : (json_decode($tsRaw, true) ?: []));
                                        if (empty($technicalSkills)) {
                                            $technicalSkills = [''];
                                        }
                                    @endphp
                                    @foreach($technicalSkills as $index => $skill)
                                    <div class="skill-item flex items-center gap-2 mb-2">
                                        <input type="text" name="technical_skills[]" value="{{ $skill }}" 
                                               class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                               placeholder="e.g. JavaScript, Python, React">
                                        @if($index > 0)
                                        <button type="button" onclick="removeSkill(this)" class="text-red-500 hover:text-red-700 p-1">
                                            <i class="fas fa-trash-alt h-4 w-4"></i>
                                        </button>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                
                                <flux:button type="button" onclick="addTechnicalSkill()" class="mt-2 !bg-orange-600 hover:!bg-orange-700 text-white text-sm">
                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add Skill
                                </flux:button>
                            </div>

                            <!-- Soft Skills -->
                            <div class="bg-neutral-50 dark:bg-neutral-800 rounded-xl p-6">
                                <h2 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4 flex items-center">
                                    <svg class="h-5 w-5 mr-2 text-pink-600 dark:text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Soft Skills
                                </h2>
                                
                                <div id="soft-skills-container">
                                    @php
                                        $ssRaw = $resume->soft_skills ?? '[]';
                                        $ssOld = old('soft_skills');
                                        $softSkills = $ssOld ?? (is_array($ssRaw) ? $ssRaw : (json_decode($ssRaw, true) ?: []));
                                        if (empty($softSkills)) {
                                            $softSkills = [''];
                                        }
                                    @endphp
                                    @foreach($softSkills as $index => $skill)
                                    <div class="skill-item flex items-center gap-2 mb-2">
                                        <input type="text" name="soft_skills[]" value="{{ $skill }}" 
                                               class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                               placeholder="e.g. Leadership, Communication">
                                        @if($index > 0)
                                        <button type="button" onclick="removeSkill(this)" class="text-red-500 hover:text-red-700 p-1">
                                            <i class="fas fa-trash-alt h-4 w-4"></i>
                                        </button>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>  
                                <flux:button type="button" onclick="addSoftSkill()" class="mt-2 !bg-pink-600 hover:!bg-pink-700 text-white text-sm">
                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add Skill
                                </flux:button>
                            </div>
                        </div>

                        <!-- Languages Section -->
                        <div class="bg-neutral-50 dark:bg-neutral-800 rounded-xl p-6">
                            <h2 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4 flex items-center">
                                <i class="fas fa-language mr-2 text-blue-400 dark:text-blue-300"></i>
                                Languages
                            </h2>
                            <div id="languages-container">
                                @php
                                    $langRaw = $resume->languages ?? '[]';
                                    $langOld = old('languages');
                                    $languages = $langOld ?? (is_array($langRaw) ? $langRaw : (json_decode($langRaw, true) ?: []));
                                    if (empty($languages)) {
                                        $languages = [['language' => '', 'proficiency' => '']];
                                    }
                                @endphp
                                @foreach($languages as $index => $language)
                                <div class="language-item flex items-center gap-2 mb-2">
                                    <input type="text" name="languages[{{ $index }}][language]" value="{{ $language['language'] ?? '' }}" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. English">
                                    <input type="text" name="languages[{{ $index }}][proficiency]" value="{{ $language['proficiency'] ?? '' }}" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Native, Fluent, Intermediate">
                                    @if($index > 0)
                                    <button type="button" onclick="removeLanguage(this)" class="text-red-500 hover:text-red-700 p-1">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            <flux:button type="button" onclick="addLanguage()" class="mt-2 !bg-blue-400 hover:!bg-blue-500 text-white text-sm">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Add Language
                            </flux:button>
                        </div>

                        <!-- Projects Section -->
                        <div class="bg-neutral-50 dark:bg-neutral-800 rounded-xl p-6">
                            <h2 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4 flex items-center">
                                <i class="fas fa-project-diagram mr-2 text-purple-400 dark:text-purple-500"></i>
                                Projects
                            </h2>
                            <div id="projects-container">
                                @php
                                    $projRaw = $resume->projects ?? '[]';
                                    $projOld = old('projects');
                                    $projects = $projOld ?? (is_array($projRaw) ? $projRaw : (json_decode($projRaw, true) ?: []));
                                    if (empty($projects)) {
                                        $projects = [['title' => '', 'description' => '', 'url' => '']];
                                    }
                                @endphp
                                @foreach($projects as $index => $project)
                                <div class="project-item bg-white dark:bg-neutral-900 rounded-lg p-4 mb-4 border border-neutral-200 dark:border-neutral-700">
                                    <div class="flex items-center mb-2">
                                        <input type="text" name="projects[{{ $index }}][title]" value="{{ $project['title'] ?? '' }}" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent mr-2" placeholder="Project Title">
                                        @if($index > 0)
                                        <button type="button" onclick="removeProject(this)" class="text-red-500 hover:text-red-700 p-1">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                        @endif
                                    </div>
                                    <input type="url" name="projects[{{ $index }}][url]" value="{{ $project['url'] ?? '' }}" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-2" placeholder="Project URL (optional)">
                                    <textarea name="projects[{{ $index }}][description]" rows="2" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Describe the project...">{{ $project['description'] ?? '' }}</textarea>
                                </div>
                                @endforeach
                            </div>
                            <flux:button type="button" onclick="addProject()" class="mt-2 !bg-indigo-600 hover:!bg-indigo-700 text-white text-sm">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Add Project
                            </flux:button>
                        </div>

                        <!-- Additional Information Section -->
                        <div class="bg-neutral-50 dark:bg-neutral-800 rounded-xl p-6">
                            <h2 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4 flex items-center">
                                <i class="fas fa-info-circle mr-2 text-gray-600 dark:text-gray-400"></i>
                                Additional Information
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Certifications -->
                                <div>
                                    <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Certifications</label>
                                    @php
                                        $certRaw = $resume->certifications ?? '[]';
                                        $certOld = old('certifications');
                                        $certifications = $certOld ?? (is_array($certRaw) ? $certRaw : (json_decode($certRaw, true) ?: []));
                                        if (empty($certifications)) {
                                            $certifications = [''];
                                        }
                                    @endphp
                                    <div id="certifications-container">
                                        @foreach($certifications as $index => $cert)
                                        <div class="flex items-center gap-2 mb-2">
                                            <input type="text" name="certifications[]" value="{{ $cert }}" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. AWS Certified Solutions Architect">
                                            @if($index > 0)
                                            <button type="button" onclick="removeCertification(this)" class="text-red-500 hover:text-red-700 p-1">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </button>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                    <flux:button type="button" onclick="addCertification()" class="mt-2 !bg-gray-600 hover:!bg-gray-700 text-white text-sm">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        Add Certification
                                    </flux:button>
                                </div>
                                <!-- Awards -->
                                <div>
                                    <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Awards</label>
                                    @php
                                        $awardRaw = $resume->awards ?? '[]';
                                        $awardOld = old('awards');
                                        $awards = $awardOld ?? (is_array($awardRaw) ? $awardRaw : (json_decode($awardRaw, true) ?: []));
                                        if (empty($awards)) {
                                            $awards = [''];
                                        }
                                    @endphp
                                    <div id="awards-container">
                                        @foreach($awards as $index => $award)
                                        <div class="flex items-center gap-2 mb-2">
                                            <input type="text" name="awards[]" value="{{ $award }}" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Employee of the Year">
                                            @if($index > 0)
                                            <button type="button" onclick="removeAward(this)" class="text-red-500 hover:text-red-700 p-1">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </button>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                    <flux:button type="button" onclick="addAward()" class="mt-2 !bg-gray-600 hover:!bg-gray-700 text-white text-sm">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        Add Award
                                    </flux:button>
                                </div>
                                <!-- Volunteer Experience -->
                                <div>
                                    <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Volunteer Experience</label>
                                    @php
                                        $volRaw = $resume->volunteer ?? '[]';
                                        $volOld = old('volunteer');
                                        $volunteer = $volOld ?? (is_array($volRaw) ? $volRaw : (json_decode($volRaw, true) ?: []));
                                        if (empty($volunteer)) {
                                            $volunteer = [''];
                                        }
                                    @endphp
                                    <div id="volunteer-container">
                                        @foreach($volunteer as $index => $vol)
                                        <div class="flex items-center gap-2 mb-2">
                                            <input type="text" name="volunteer[]" value="{{ $vol }}" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Red Cross Volunteer">
                                            @if($index > 0)
                                            <button type="button" onclick="removeVolunteer(this)" class="text-red-500 hover:text-red-700 p-1">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </button>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                    <flux:button type="button" onclick="addVolunteer()" class="mt-2 !bg-gray-600 hover:!bg-gray-700 text-white text-sm">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        Add Volunteer
                                    </flux:button>
                                </div>
                                <!-- Interests -->
                                <div>
                                    <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Interests</label>
                                    @php
                                        $intRaw = $resume->interests ?? '[]';
                                        $intOld = old('interests');
                                        $interests = $intOld ?? (is_array($intRaw) ? $intRaw : (json_decode($intRaw, true) ?: []));
                                        if (empty($interests)) {
                                            $interests = [''];
                                        }
                                    @endphp
                                    <div id="interests-container">
                                        @foreach($interests as $index => $interest)
                                        <div class="flex items-center gap-2 mb-2">
                                            <input type="text" name="interests[]" value="{{ $interest }}" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Photography, Hiking">
                                            @if($index > 0)
                                            <button type="button" onclick="removeInterest(this)" class="text-red-500 hover:text-red-700 p-1">
                                              <i class="fas fa-trash-alt"></i>
                                            </button>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                    <flux:button type="button" onclick="addInterest()" class="mt-2 !bg-gray-600 hover:!bg-gray-700 text-white text-sm">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        Add Interest
                                    </flux:button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end p-6 border-t border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 sticky bottom-0 left-0 z-20 ">
                <div class="flex items-center space-x-4">
                    <flux:button type="button" onclick="window.history.back()" class="inline-flex items-center px-6 py-2 rounded-lg font-semibold !bg-gray-200 hover:!bg-gray-300 text-neutral-900 dark:!bg-neutral-800 dark:hover:!bg-neutral-700 !border !border-neutral-300 dark:!border-neutral-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Cancel
                    </flux:button>
                     
                    <flux:button type="submit" class="inline-flex items-center px-6 py-2 rounded-lg font-semibold !bg-blue-600 hover:!bg-blue-700 text-white !border !border-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                        
                        Update Resume
                    </flux:button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>

<script>
// --- Languages ---
window.addLanguage = function() {
    const container = document.getElementById('languages-container');
    const idx = container.children.length;
    const div = document.createElement('div');
    div.className = 'language-item flex items-center gap-2 mb-2';
    div.innerHTML = `
        <input type="text" name="languages[${idx}][language]" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. English">
        <input type="text" name="languages[${idx}][proficiency]" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Native, Fluent, Intermediate">
        <button type="button" onclick="removeLanguage(this)" class="text-red-500 hover:text-red-700 p-1">
            <i class="fas fa-trash-alt"></i>
        </button>
    `;
    container.appendChild(div);
}
window.removeLanguage = function(btn) {
    btn.parentElement.remove();
}

// --- Projects ---
window.addProject = function() {
    const container = document.getElementById('projects-container');
    const idx = container.children.length;
    const div = document.createElement('div');
    div.className = 'project-item bg-white dark:bg-neutral-900 rounded-lg p-4 mb-4 border border-neutral-200 dark:border-neutral-700';
    div.innerHTML = `
        <div class="flex items-center mb-2">
            <input type="text" name="projects[${idx}][title]" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent mr-2" placeholder="Project Title">
            <button type="button" onclick="removeProject(this)" class="text-red-500 hover:text-red-700 p-1">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <input type="url" name="projects[${idx}][url]" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-2" placeholder="Project URL (optional)">
        <textarea name="projects[${idx}][description]" rows="2" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Describe the project..."></textarea>
    `;
    container.appendChild(div);
}
window.removeProject = function(btn) {
    btn.closest('.project-item').remove();
}

// --- Certifications ---
window.addCertification = function() {
    const container = document.getElementById('certifications-container');
    const idx = container.children.length;
    const div = document.createElement('div');
    div.className = 'flex items-center gap-2 mb-2';
    div.innerHTML = `
        <input type="text" name="certifications[]" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. AWS Certified Solutions Architect">
        <button type="button" onclick="removeCertification(this)" class="text-red-500 hover:text-red-700 p-1">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    `;
    container.appendChild(div);
}
window.removeCertification = function(btn) {
    btn.parentElement.remove();
}

// --- Awards ---
window.addAward = function() {
    const container = document.getElementById('awards-container');
    const idx = container.children.length;
    const div = document.createElement('div');
    div.className = 'flex items-center gap-2 mb-2';
    div.innerHTML = `
        <input type="text" name="awards[]" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Employee of the Year">
        <button type="button" onclick="removeAward(this)" class="text-red-500 hover:text-red-700 p-1">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    `;
    container.appendChild(div);
}
window.removeAward = function(btn) {
    btn.parentElement.remove();
}

// --- Volunteer ---
window.addVolunteer = function() {
    const container = document.getElementById('volunteer-container');
    const idx = container.children.length;
    const div = document.createElement('div');
    div.className = 'flex items-center gap-2 mb-2';
    div.innerHTML = `
        <input type="text" name="volunteer[]" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Red Cross Volunteer">
        <button type="button" onclick="removeVolunteer(this)" class="text-red-500 hover:text-red-700 p-1">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    `;
    container.appendChild(div);
}
window.removeVolunteer = function(btn) {
    btn.parentElement.remove();
}

// --- Interests ---
window.addInterest = function() {
    const container = document.getElementById('interests-container');
    const idx = container.children.length;
    const div = document.createElement('div');
    div.className = 'flex items-center gap-2 mb-2';
    div.innerHTML = `
        <input type="text" name="interests[]" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Photography, Hiking">
        <button type="button" onclick="removeInterest(this)" class="text-red-500 hover:text-red-700 p-1">
            <i class="fas fa-trash-alt"></i>
        </button>
    `;
    container.appendChild(div);
}
window.removeInterest = function(btn) {
    btn.parentElement.remove();
}

// --- Technical Skills ---
window.addTechnicalSkill = function() {
    const container = document.getElementById('technical-skills-container');
    const idx = container.children.length;
    const div = document.createElement('div');
    div.className = 'skill-item flex items-center gap-2 mb-2';
    div.innerHTML = `
        <input type="text" name="technical_skills[]" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. JavaScript, Python, React">
        <button type="button" onclick="removeSkill(this)" class="text-red-500 hover:text-red-700 p-1">
            <i class="fas fa-trash-alt h-4 w-4"></i>
        </button>
    `;
    container.appendChild(div);
}
window.removeSkill = function(btn) {
    btn.parentElement.remove();
}

// --- Soft Skills ---
window.addSoftSkill = function() {
    const container = document.getElementById('soft-skills-container');
    const idx = container.children.length;
    const div = document.createElement('div');
    div.className = 'skill-item flex items-center gap-2 mb-2';
    div.innerHTML = `
        <input type="text" name="soft_skills[]" class="flex-1 px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Leadership, Communication">
        <button type="button" onclick="removeSkill(this)" class="text-red-500 hover:text-red-700 p-1">
           <i class="fas fa-trash-alt"></i>
        </button>
    `;
    container.appendChild(div);
}

// --- Experience ---
window.addExperience = function() {
    const container = document.getElementById('experience-container');
    const idx = container.children.length;
    const div = document.createElement('div');
    div.className = 'experience-item bg-white dark:bg-neutral-900 rounded-lg p-4 mb-4 border border-neutral-200 dark:border-neutral-700';
    div.innerHTML = `
        <div class="flex justify-between items-start mb-4">
            <h3 class="font-medium text-neutral-900 dark:text-white">Experience ${idx + 1}</h3>
            <button type="button" onclick="removeExperience(this)" class="text-red-500 hover:text-red-700">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Company</label>
                <input type="text" name="experience[${idx}][company]" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Position</label>
                <input type="text" name="experience[${idx}][position]" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Start Date</label>
                <input type="month" name="experience[${idx}][start_date]" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">End Date</label>
                <input type="month" name="experience[${idx}][end_date]" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>
        <div class="mt-4">
            <label class="flex items-center">
                <input type="checkbox" name="experience[${idx}][current]" value="1" class="rounded border-neutral-300 dark:border-neutral-600 text-blue-600 focus:ring-blue-500" onchange="toggleCurrentJob(this)">
                <span class="ml-2 text-sm text-neutral-700 dark:text-neutral-300">I currently work here</span>
            </label>
        </div>
        <div class="mt-4">
            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Description</label>
            <textarea name="experience[${idx}][description]" rows="3" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Describe your responsibilities and achievements..."></textarea>
        </div>
    `;
    container.appendChild(div);
}
window.removeExperience = function(btn) {
    btn.closest('.experience-item').remove();
}

// --- Education ---
window.addEducation = function() {
    const container = document.getElementById('education-container');
    const idx = container.children.length;
    const div = document.createElement('div');
    div.className = 'education-item bg-white dark:bg-neutral-900 rounded-lg p-4 mb-4 border border-neutral-200 dark:border-neutral-700';
    div.innerHTML = `
        <div class="flex justify-between items-start mb-4">
            <h3 class="font-medium text-neutral-900 dark:text-white">Education ${idx + 1}</h3>
            <button type="button" onclick="removeEducation(this)" class="text-red-500 hover:text-red-700">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Institution</label>
                <input type="text" name="education[${idx}][institution]" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Degree</label>
                <input type="text" name="education[${idx}][degree]" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Bachelor of Science">
            </div>
            <div>
                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Field of Study</label>
                <input type="text" name="education[${idx}][field]" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. Computer Science">
            </div>
            <div>
                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">GPA (Optional)</label>
                <input type="text" name="education[${idx}][gpa]" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="e.g. 3.8/4.0">
            </div>
            <div>
                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Start Date</label>
                <input type="month" name="education[${idx}][start_date]" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">End Date</label>
                <input type="month" name="education[${idx}][end_date]" class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-lg bg-white dark:bg-neutral-900 text-neutral-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>
    `;
    container.appendChild(div);
}
window.removeEducation = function(btn) {
    btn.closest('.education-item').remove();
}

// --- Experience: handle current job checkbox ---
window.toggleCurrentJob = function(checkbox) {
    const endDateInput = checkbox.closest('.experience-item').querySelector('input[name*="[end_date]"]');
    if (checkbox.checked) {
        endDateInput.value = '';
        endDateInput.disabled = true;
    } else {
        endDateInput.disabled = false;
    }
}
</script>

<style>
@keyframes fade-in {
  from { opacity: 0; transform: translateY(-20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
  animation: fade-in 0.3s ease;
}
</style>
