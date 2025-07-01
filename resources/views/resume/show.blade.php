<x-layouts.app :title="__('Resume')">
    <div class="max-w-3xl mx-auto py-10 px-4 bg-white text-black font-sans">
        {{-- HEADER --}}
        <div class="text-center mb-2 ">
            <h1 class="text-3xl font-bold tracking-wide mb-1">{{ $resume->full_name }}</h1>
            <div class="text-sm font-medium tracking-wide">
                {{ $resume->location }}
                @if($resume->email) | {{ $resume->email }} @endif
                @if($resume->phone) | {{ $resume->phone }} @endif
                @if($resume->linkedin) | <a href="{{ $resume->linkedin }}" class="underline" target="_blank">LinkedIn</a>@endif
                @if($resume->github) | <a href="{{ $resume->github }}" class="underline" target="_blank">GitHub</a>@endif
                @if($resume->portfolio) | <a href="{{ $resume->portfolio }}" class="underline" target="_blank">Portfolio</a>@endif
            </div>
        </div>

        {{-- PROFESSIONAL SUMMARY --}}
        @if($resume->summary)
            <div class="mt-6 mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Professional Summary</div>
                <div class="whitespace-pre-line">{{ $resume->summary }}</div>
            </div>
        @endif

        {{-- SKILLS --}}
        @php
            $technical_skills = is_array($resume->technical_skills) ? $resume->technical_skills : json_decode($resume->technical_skills, true) ?? [];
            $soft_skills = is_array($resume->soft_skills) ? $resume->soft_skills : json_decode($resume->soft_skills, true) ?? [];
        @endphp
        @if($technical_skills || $soft_skills)
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Skills</div>
                @if($technical_skills)
                    <div><span class="font-semibold">Technical:</span> {{ implode(', ', $technical_skills) }}</div>
                @endif
                @if($soft_skills)
                    <div><span class="font-semibold">Soft:</span> {{ implode(', ', $soft_skills) }}</div>
                @endif
            </div>
        @endif

        {{-- PROFESSIONAL EXPERIENCE --}}
        @php
            $experience = is_array($resume->experience) ? $resume->experience : json_decode($resume->experience, true) ?? [];
        @endphp
        @if($experience)
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Professional Experience</div>
                @foreach($experience as $exp)
                    <div class="mb-2">
                        <div class="font-semibold">{{ $exp['position'] ?? '' }}</div>
                        <div class="italic">{{ $exp['company'] ?? '' }}{{ !empty($exp['location']) ? ' – '.$exp['location'] : '' }}</div>
                        <div class="text-xs mb-1">{{ $exp['start_date'] ?? '' }} – {{ $exp['end_date'] ?? 'Present' }}</div>
                        @if(!empty($exp['description']))
                            <ul class="list-disc ml-5 text-sm">
                                @foreach(explode("\n", $exp['description']) as $line)
                                    @if(trim($line))<li>{{ trim($line) }}</li>@endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        {{-- PROJECTS --}}
        @php
            $projects = is_array($resume->projects) ? $resume->projects : json_decode($resume->projects, true) ?? [];
        @endphp
        @if($projects)
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Projects</div>
                @foreach($projects as $project)
                    <div class="mb-2">
                        <div class="font-semibold">{{ $project['name'] ?? '' }}</div>
                        @if(!empty($project['github']))
                            <div class="text-xs"><a href="{{ $project['github'] }}" class="underline" target="_blank">{{ $project['github'] }}</a></div>
                        @endif
                        @if(!empty($project['description']))
                            <div class="text-sm">{{ $project['description'] }}</div>
                        @endif
                        @if(!empty($project['technologies']))
                            <div class="text-xs">Tech: {{ $project['technologies'] }}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        {{-- EDUCATION --}}
        @php
            $education = is_array($resume->education) ? $resume->education : json_decode($resume->education, true) ?? [];
        @endphp
        @if($education)
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Education</div>
                @foreach($education as $edu)
                    <div class="mb-2">
                        <div class="font-semibold">{{ $edu['degree'] ?? '' }}</div>
                        <div class="italic">{{ $edu['institution'] ?? '' }}{{ !empty($edu['location']) ? ' – '.$edu['location'] : '' }}</div>
                        <div class="text-xs mb-1">{{ $edu['start_date'] ?? '' }} – {{ $edu['end_date'] ?? '' }}</div>
                        @if(!empty($edu['gpa']))
                            <div class="text-xs">GPA: {{ $edu['gpa'] }}</div>
                        @endif
                    </div>
                @endforeach
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
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Certifications</div>
                <div>{{ implode(', ', array_filter($certifications)) }}</div>
            </div>
        @elseif(is_string($certifications) && trim($certifications) !== '' && $certifications !== '[]')
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Certifications</div>
                <div>{{ $certifications }}</div>
            </div>
        @endif
        {{-- AWARDS --}}
        @if(is_array($awards) && count(array_filter($awards)) > 0)
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Awards</div>
                <div>{{ implode(', ', array_filter($awards)) }}</div>
            </div>
        @elseif(is_string($awards) && trim($awards) !== '' && $awards !== '[]')
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Awards</div>
                <div>{{ $awards }}</div>
            </div>
        @endif
        {{-- VOLUNTEER --}}
        @if(is_array($volunteer) && count(array_filter($volunteer)) > 0)
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Volunteer</div>
                <div>{{ implode(', ', array_filter($volunteer)) }}</div>
            </div>
        @elseif(is_string($volunteer) && trim($volunteer) !== '' && $volunteer !== '[]')
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Volunteer</div>
                <div>{{ $volunteer }}</div>
            </div>
        @endif
        {{-- INTERESTS --}}
        @if(is_array($interests) && count(array_filter($interests)) > 0)
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Interests</div>
                <div>{{ implode(', ', array_filter($interests)) }}</div>
            </div>
        @elseif(is_string($interests) && trim($interests) !== '' && $interests !== '[]')
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Interests</div>
                <div>{{ $interests }}</div>
            </div>
        @endif
        {{-- LANGUAGES --}}
        @php
            $languages = is_array($resume->languages) ? $resume->languages : json_decode($resume->languages, true) ?? [];
        @endphp
        @if(is_array($languages) && count(array_filter($languages, function($l) { return !empty($l['language']) || !empty($l['name']); })) > 0)
            <div class="mb-4">
                <div class="uppercase font-bold text-xs mb-1 tracking-widest">Languages</div>
                <div>
                    @foreach($languages as $lang)
                        @php
                            $langName = $lang['language'] ?? $lang['name'] ?? '';
                            $prof = $lang['proficiency'] ?? '';
                        @endphp
                        @if(!empty($langName))
                            <span>{{ $langName }}{{ !empty($prof) ? ' ('.$prof.')' : '' }}@if(!$loop->last), @endif</span>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        <div class="text-xs text-neutral-400 mt-8 text-center">Resume generated on {{ now()->format('F j, Y') }}</div>
    </div>

     <div>
        <flux:button type="button" onclick="window.location.href='{{ route('resume.index') }}'" class="mt-4 !bg-gray-600 hover:!bg-gray-700 text-white">
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Resumes
        </flux:button>
    </div>
</x-layouts.app>