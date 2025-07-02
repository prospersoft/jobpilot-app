<x-layouts.app :title="__('Resume')">
    <div class="max-w-3xl mx-auto py-10 px-4 bg-white text-black font-sans">
        {{-- HEADER --}}
        <div class="text-center mb-2 ">
            <h1 class="text-3xl font-bold tracking-wide mb-1">{{ $resume->full_name }}</h1>
            <div class="flex flex-wrap justify-center gap-3 text-sm font-medium tracking-wide mt-2">
                @if($resume->location)
                    <span class="inline-flex items-center gap-1"><span class="font-bold">Address:</span> {{ $resume->location }}</span>
                @endif
                @if($resume->email)
                    <span class="inline-flex items-center gap-1"><span class="font-bold">Email:</span> {{ $resume->email }}</span>
                @endif
                @if($resume->phone)
                    <span class="inline-flex items-center gap-1"><span class="font-bold">Phone:</span> {{ $resume->phone }}</span>
                @endif

               @if($resume->linkedin)
                    <span class="inline-flex items-center gap-1"><span class="font-bold">LinkedIn:</span> {{ $resume->linkedin }}
                    </span>
                @endif
                
                @if($resume->github)
                    <span class="inline-flex items-center gap-1"><span class="font-bold">GitHub:</span>{{ $resume->github }}</span>
                @endif
                @if($resume->portfolio)
                    <span class="inline-flex items-center gap-1"><span class="font-bold">Portfolio:</span> <a href="{{ $resume->portfolio }}" class="underline" target="_blank">Portfolio</a></span>
                @endif
            </div>
        </div>
        
        {{-- PROFESSIONAL SUMMARY --}}
        @if($resume->summary)
            <div class="mt-6 mb-4">
                <div class="uppercase font-bold text-lg mb-1 tracking-widest">Professional Summary</div>
                <ul class="list-disc ml-6 text-sm">
                    <li class="mb-2">
                        <hr class="my-4 border-black">
                        <div class="whitespace-pre-line">{{ $resume->summary }}</div>
                    </li>
                </ul>
            </div>
        @endif
        

        {{-- SKILLS --}}
        @php
            $technical_skills = is_array($resume->technical_skills) ? $resume->technical_skills : json_decode($resume->technical_skills, true) ?? [];
            $soft_skills = is_array($resume->soft_skills) ? $resume->soft_skills : json_decode($resume->soft_skills, true) ?? [];
        @endphp
        @if($technical_skills || $soft_skills)
            <div class="mb-4">
                <div class="uppercase font-bold text-lg mb-1 tracking-widest">Skills</div>
                <hr class="my-4 border-black">
                <ul class="list-disc ml-6 text-sm">
                    @if($technical_skills)
                        <li><span class="font-semibold">Technical:</span> {{ implode(', ', $technical_skills) }}</li>
                    @endif
                    @if($soft_skills)
                        <li><span class="font-semibold">Soft:</span> {{ implode(', ', $soft_skills) }}</li>
                    @endif
                </ul>
            </div>
        @endif
       

        {{-- PROFESSIONAL EXPERIENCE --}}
        @php
            $experience = is_array($resume->experience) ? $resume->experience : json_decode($resume->experience, true) ?? [];
        @endphp
        @if($experience)
            <div class="mb-4">
                <div class="uppercase font-bold text-lg mb-1 tracking-widest">Professional Experience</div>
                <hr class="my-4 border-black">
                @foreach($experience as $exp)
                    <div class="mb-2 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <div class="font-semibold">{{ $exp['position'] ?? '' }}</div>
                            <div class="font-bold">{{ $exp['company'] ?? '' }}</div>
                        </div>
                        <div class="flex flex-col items-end sm:items-start">
                            <div class="font-bold text-xs text-right sm:text-left mt-1 sm:mt-0 min-w-[120px]">{{ $exp['start_date'] ?? '' }}  –  {{ $exp['end_date'] ?? 'Present' }}</div>
                            @if(!empty($exp['location']))
                                <div class="italic text-xs text-right sm:text-left mt-1">{{ $exp['location'] }}</div>
                            @endif
                        </div>
                    </div>
                    @if(!empty($exp['description']))
                        <ul class="list-disc ml-5 text-sm">
                            @foreach(explode("\n", $exp['description']) as $line)
                                @if(trim($line))<li>{{ trim($line) }}</li>@endif
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>
        @endif
        
        {{-- PROJECTS --}}
        @php
            $projects = is_array($resume->projects) ? $resume->projects : json_decode($resume->projects, true) ?? [];
        @endphp
        @if($projects)
            <div class="mb-4">
                <div class="uppercase font-bold text-lg mb-1 tracking-widest">Projects</div>
                <hr class="my-4 border-black">
                <ul class="list-disc ml-6 text-sm">
                @foreach($projects as $project)
                    <li class="mb-2">
                        <div class="font-semibold">{{ $project['name'] ?? '' }}</div>
                        @if(!empty($project['github']))
                            <div class="text-xs"><a href="{{ $project['github'] }}" class="underline" target="_blank">{{ $project['github'] }}</a></div>
                        @endif
                        @if(!empty($project['description']))
                            <div class="text-sm">{{ $project['description'] }}</div>
                        @endif
                    </li>
                    <li class="mb-2">
                        @if(!empty($project['technologies']))
                            <div class="text-xs font-bold">Techologies: {{ $project['technologies'] }}</div>
                        @endif
                    </li>
                @endforeach
                </ul>
            </div>
        @endif
       

        {{-- EDUCATION --}}
        @php
            $education = is_array($resume->education) ? $resume->education : json_decode($resume->education, true) ?? [];
        @endphp
        @if($education)
            <div class="mb-4">
                <div class="uppercase font-bold text-lg mb-1 tracking-widest">Education</div>
                <hr class="my-4 border-black">
                <ul class="list-disc ml-6 text-sm">
                @foreach($education as $edu)
                    <li class="mb-2">
                        <div class="font-semibold">{{ $edu['degree'] ?? '' }}</div>
                        <div class="">{{ $edu['institution'] ?? '' }}{{ !empty($edu['location']) ? ' – '.$edu['location'] : '' }}</div>
                        <div class="font-bold text-xs text-right sm:text-left mt-1 sm:mt-0 min-w-[120px]">{{ $edu['start_date'] ?? '' }} – {{ $edu['end_date'] ?? '' }}</div>
                        @if(!empty($edu['gpa']))
                            <div class="text-xs text-right sm:text-left mt-1 sm:mt-0 min-w-[120px]">GPA: {{ $edu['gpa'] }}</div>
                        @endif
                    </li>
                @endforeach
                </ul>
            </div>
        @endif
        
        {{-- CERTIFICATIONS --}}
        @php
            function normalizeField($field) {
                if (is_string($field)) {
                    $decoded = json_decode($field, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        return $decoded;
                    }
                    return $field;
                }
                return $field;
            }
            $certifications = normalizeField($resume->certifications);
            $awards = normalizeField($resume->awards);
            $volunteer = normalizeField($resume->volunteer);
            $interests = normalizeField($resume->interests);
        @endphp
        @if(is_array($certifications) && count(array_filter($certifications)) > 0)
            <div class="mb-4">
                <div class="uppercase font-bold text-lg mb-1 tracking-widest">Certifications</div>
                <hr class="my-4 border-black">
                <ul class="list-disc ml-6 text-sm">
                    @foreach(array_filter($certifications) as $cert)
                        <li>{{ $cert }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif(is_string($certifications) && trim($certifications) !== '' && $certifications !== '[]')
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Certifications</div>
                <ul class="list-disc ml-6 text-sm"><li>{{ $certifications }}</li></ul>
            </div>
        @endif
        {{-- AWARDS --}}
        @if(is_array($awards) && count(array_filter($awards)) > 0)
            <div class="mb-4">
                <div class="uppercase font-bold text-lg mb-1 tracking-widest">Awards</div>
                <hr class="my-4 border-black">
                <ul class="list-disc ml-6 text-sm">
                    @foreach(array_filter($awards) as $award)
                        <li>{{ $award }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif(is_string($awards) && trim($awards) !== '' && $awards !== '[]')
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Awards</div>
                <ul class="list-disc ml-6 text-sm"><li>{{ $awards }}</li></ul>
            </div>
        @endif
        {{-- VOLUNTEER --}}
        @if(is_array($volunteer) && count(array_filter($volunteer)) > 0)
            <div class="mb-4">
                <div class="uppercase font-bold text-lg mb-1 tracking-widest">Volunteer</div>
                <hr class="my-4 border-black">
                <ul class="list-disc ml-6 text-sm">
                    @foreach(array_filter($volunteer) as $vol)
                        <li>{{ $vol }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif(is_string($volunteer) && trim($volunteer) !== '' && $volunteer !== '[]')
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Volunteer</div>
                <ul class="list-disc ml-6 text-sm"><li>{{ $volunteer }}</li></ul>
            </div>
        @endif
        {{-- INTERESTS --}}
        @if(is_array($interests) && count(array_filter($interests)) > 0)
            <div class="mb-4">
                <div class="uppercase font-bold text-lg mb-1 tracking-widest">Interests</div>
                <hr class="my-4 border-black">
                <ul class="list-disc ml-6 text-sm">
                    @foreach(array_filter($interests) as $interest)
                        <li>{{ $interest }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif(is_string($interests) && trim($interests) !== '' && $interests !== '[]')
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Interests</div>
                <ul class="list-disc ml-6 text-sm"><li>{{ $interests }}</li></ul>
            </div>
        @endif
        {{-- LANGUAGES --}}
        @php
            $languages = is_array($resume->languages) ? $resume->languages : json_decode($resume->languages, true) ?? [];
        @endphp
        @if(is_array($languages) && count(array_filter($languages, function($l) { return !empty($l['language']) || !empty($l['name']); })) > 0)
            <div class="mb-4">
                <div class="uppercase font-bold text-lg mb-1 tracking-widest">Languages</div>
                <hr class="my-4 border-black">
                <ul class="list-disc ml-6 text-sm">
                @foreach($languages as $lang)
                    @php
                        $langName = $lang['language'] ?? $lang['name'] ?? '';
                        $prof = $lang['proficiency'] ?? '';
                    @endphp
                    @if(!empty($langName))
                        <li>{{ $langName }}{{ !empty($prof) ? ' ('.$prof.')' : '' }}</li>
                    @endif
                @endforeach
                </ul>
            </div>
        @endif

        <div class="flex justify-between items-end mt-8">
        <div></div>
        <div class="text-xs text-neutral-400 text-left font-bold">Resume generated on {{ now()->format('F j, Y') }}</div>
    </div>
    </div>

     <div class=" mt-6 flex justify-between">
        <flux:button type="button" onclick="window.location.href='{{ route('resume.index') }}'" class=" !bg-gray-600 hover:!bg-gray-700 text-white">
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Resumes
        </flux:button>

        <flux:button type="button" onclick="window.open('{{ route('resume.download', $resume) }}', '_blank')" class="!bg-gray-600 hover:!bg-gray-700 text-white">
            <i class="fas fa-download mr-2 !text-green-500"></i>
            Download
        </flux:button>
    </div>

    <style>
    ul.list-disc {
      list-style-type: disc !important;
      margin-left: 1.5rem !important;
    }
    li {
      margin-bottom: 0.25rem;
    }
    </style>
</x-layouts.app>