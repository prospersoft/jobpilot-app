<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resume PDF</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <style>
        body {
            color: #000;
            font-family: sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
            background: white;
        }

        .container {
            max-width: 768px;
            margin: 0 auto;
            padding: 40px 16px;
        }

        /* Header */
        header {
            text-align: center;
            margin-bottom: 16px;
        }

        header h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            font-size: 14px;
            font-weight: 500;
        }

        .contact-item {
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .contact-item a {
            text-decoration: underline;
        }

        /* Sections */
        section {
            margin-bottom: 20px;
        }

        .section-title {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 4px;
            letter-spacing: 0.1em;
        }

        hr {
            border: none;
            border-top: 1px solid #000;
            margin: 8px 0 12px;
        }

        ul {
            padding-left: 20px;
            margin: 0;
        }

        li {
            margin-bottom: 6px;
        }

        .experience-header,
        .education-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .position, .company, .education-degree {
            font-weight: bold;
        }

        .experience-right, .education-date {
            text-align: right;
            font-size: 12px;
        }

        .project-name {
            font-weight: bold;
        }

        .project-tech {
            font-size: 12px;
            font-weight: bold;
        }

        .project-link a {
            font-size: 12px;
            text-decoration: underline;
        }

        .footer {
            text-align: right;
            font-size: 12px;
            color: #999;
            font-weight: bold;
            margin-top: 32px;
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- HEADER --}}
        <header>
            <h1>{{ $resume->full_name }}</h1>
            <div class="contact-info">
                @if($resume->location)
                    <span class="contact-item">Address: {{ $resume->location }}</span>
                @endif
                @if($resume->email)
                    <span class="contact-item">Email: {{ $resume->email }}</span>
                @endif
                @if($resume->phone)
                    <span class="contact-item">Phone: {{ $resume->phone }}</span>
                @endif
                @if($resume->linkedin)
                    <span class="contact-item">LinkedIn: <a href="{{ $resume->linkedin }}" target="_blank">{{ $resume->linkedin }}</a></span>
                @endif
                @if($resume->github)
                    <span class="contact-item">GitHub: <a href="{{ $resume->github }}" target="_blank">{{ $resume->github }}</a></span>
                @endif
                @if($resume->portfolio)
                    <span class="contact-item">Portfolio: <a href="{{ $resume->portfolio }}" target="_blank">{{ $resume->portfolio }}</a></span>
                @endif
            </div>
        </header>

        {{-- SUMMARY --}}
        @if($resume->summary)
            <section>
                <div class="section-title">Professional Summary</div>
                <hr>
                <p style="white-space: pre-line;">{{ $resume->summary }}</p>
            </section>
        @endif

        {{-- SKILLS --}}
        @php
            $technical_skills = is_array($resume->technical_skills) ? $resume->technical_skills : json_decode($resume->technical_skills, true) ?? [];
            $soft_skills = is_array($resume->soft_skills) ? $resume->soft_skills : json_decode($resume->soft_skills, true) ?? [];
        @endphp
        @if($technical_skills || $soft_skills)
            <section>
                <div class="section-title">Skills</div>
                <hr>
                <ul>
                    @if($technical_skills)
                        <li><strong>Technical:</strong> {{ implode(', ', $technical_skills) }}</li>
                    @endif
                    @if($soft_skills)
                        <li><strong>Soft:</strong> {{ implode(', ', $soft_skills) }}</li>
                    @endif
                </ul>
            </section>
        @endif

        {{-- EXPERIENCE --}}
        @php
            $experience = is_array($resume->experience) ? $resume->experience : json_decode($resume->experience, true) ?? [];
        @endphp
        @if($experience)
            <section>
                <div class="section-title">Professional Experience</div>
                <hr>
                @foreach($experience as $exp)
                    <div class="experience-item">
                        <div class="experience-header">
                            <div>
                                <div class="position">{{ $exp['position'] ?? '' }}</div>
                                <div class="company">{{ $exp['company'] ?? '' }}</div>
                            </div>
                            <div class="experience-right">
                                <div>{{ $exp['start_date'] ?? '' }} – {{ $exp['end_date'] ?? 'Present' }}</div>
                                @if(!empty($exp['location']))
                                    <div>{{ $exp['location'] }}</div>
                                @endif
                            </div>
                        </div>
                        @if(!empty($exp['description']))
                            <ul>
                                @foreach(explode("\n", $exp['description']) as $line)
                                    @if(trim($line))<li>{{ trim($line) }}</li>@endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </section>
        @endif

        {{-- PROJECTS --}}
        @php
            $projects = is_array($resume->projects) ? $resume->projects : json_decode($resume->projects, true) ?? [];
        @endphp
        @if($projects)
            <section>
                <div class="section-title">Projects</div>
                <hr>
                <ul>
                    @foreach($projects as $project)
                        <li>
                            <div class="project-name">{{ $project['name'] ?? '' }}</div>
                            @if(!empty($project['github']))
                                <div class="project-link"><a href="{{ $project['github'] }}" target="_blank">{{ $project['github'] }}</a></div>
                            @endif
                            @if(!empty($project['description']))
                                <div>{{ $project['description'] }}</div>
                            @endif
                            @if(!empty($project['technologies']))
                                <div class="project-tech">Technologies: {{ $project['technologies'] }}</div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </section>
        @endif

        {{-- EDUCATION --}}
        @php
            $education = is_array($resume->education) ? $resume->education : json_decode($resume->education, true) ?? [];
        @endphp
        @if($education)
            <section>
                <div class="section-title">Education</div>
                <hr>
                <ul>
                    @foreach($education as $edu)
                        <li class="education-item">
                            <div>
                                <div class="education-degree">{{ $edu['degree'] ?? '' }}</div>
                                <div>{{ $edu['institution'] ?? '' }}{{ !empty($edu['location']) ? ' – '.$edu['location'] : '' }}</div>
                            </div>
                            <div class="education-date">{{ $edu['start_date'] ?? '' }} – {{ $edu['end_date'] ?? '' }}</div>
                            @if(!empty($edu['gpa']))
                                <div>GPA: {{ $edu['gpa'] }}</div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </section>
        @endif

        {{-- OPTIONAL SECTIONS --}}
        @php
            $certifications = json_decode($resume->certifications, true) ?? [];
            $awards = json_decode($resume->awards, true) ?? [];
            $volunteer = json_decode($resume->volunteer, true) ?? [];
            $interests = json_decode($resume->interests, true) ?? [];
            $languages = is_array($resume->languages) ? $resume->languages : json_decode($resume->languages, true) ?? [];
        @endphp

        @foreach(['Certifications' => $certifications, 'Awards' => $awards, 'Volunteer' => $volunteer, 'Interests' => $interests] as $label => $list)
            @if(is_array($list) && count(array_filter($list)) > 0)
                <section>
                    <div class="section-title">{{ $label }}</div>
                    <hr>
                    <ul>
                        @foreach($list as $item)
                            @if(trim($item))<li>{{ $item }}</li>@endif
                        @endforeach
                    </ul>
                </section>
            @endif
        @endforeach

        {{-- LANGUAGES --}}
        @if($languages)
            <section>
                <div class="section-title">Languages</div>
                <hr>
                <ul>
                    @foreach($languages as $lang)
                        @php
                            $langName = $lang['language'] ?? $lang['name'] ?? '';
                            $prof = $lang['proficiency'] ?? '';
                        @endphp
                        @if($langName)
                            <li>{{ $langName }}{{ $prof ? ' — ' . $prof : '' }}</li>
                        @endif
                    @endforeach
                </ul>
            </section>
        @endif

       
    </div>
</body>
</html>
