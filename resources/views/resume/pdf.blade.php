<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resume PDF</title>
    <style>
        body { color: #222; font-size: 13px; margin: 0; padding: 0; }
        .container { max-width: 700px; margin: 0 auto; padding: 32px 24px; }
        .header { text-align: left; margin-bottom: 24px; }
        .header h1 { font-size: 24px; margin: 0 0 4px 0; }
        .section { margin-bottom: 18px; }
        .section-title { font-weight: bold; font-size: 15px; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 1px; }
        .field-label { font-weight: bold; display: inline; }
        .field-value { display: inline; margin-left: 4px; }
        ul { margin: 0 0 0 18px; padding: 0; }
        li { margin-bottom: 2px; }
        hr { border: none; border-top: 1px solid #bbb; margin: 18px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header ">
            <h1 class="!pt-7">{{ $resume->full_name }}</h1>
            @if(!empty($resume->professional_title))
                <div><span class="field-label ">Title:</span> <span class="field-value">{{ $resume->professional_title }}</span></div>
            @endif
            @if(!empty($resume->email))
                <div><span class="field-label">Email:</span> <span class="field-value">{{ $resume->email }}</span></div>
            @endif
            @if(!empty($resume->phone))
                <div><span class="field-label">Phone:</span> <span class="field-value">{{ $resume->phone }}</span></div>
            @endif
            @if(!empty($resume->location))
                <div><span class="field-label">Location:</span> <span class="field-value">{{ $resume->location }}</span></div>
            @endif
            @if(!empty($resume->linkedin))
                <div><span class="field-label">LinkedIn:</span> <span class="field-value">{{ $resume->linkedin }}</span></div>
            @endif
        </div>
        <hr>
        @if(!empty($resume->summary))
        <div class="section">
            <div class="section-title !font-bold text-xl">Professional Summary</div>
            <div>{{ $resume->summary }}</div>
        </div>
        @endif
        @php $experience = is_array($resume->experience) ? $resume->experience : json_decode($resume->experience, true); @endphp
        @if($experience)
        <div class="section">
            <div class="section-title">Work Experience</div>
            <ul>
                @foreach($experience as $exp)
                    <li>
                        <span class="field-label">{{ $exp['position'] ?? '' }}</span> at <span class="field-value">{{ $exp['company'] ?? '' }}</span>
                        @if(!empty($exp['start_date']) || !empty($exp['end_date']))
                            ({{ $exp['start_date'] ?? '' }} - {{ $exp['end_date'] ?? 'Present' }})
                        @endif
                        @if(!empty($exp['location']))
                            , {{ $exp['location'] }}
                        @endif
                        @if(!empty($exp['description']))
                            <div>{{ $exp['description'] }}</div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
        @php $education = is_array($resume->education) ? $resume->education : json_decode($resume->education, true); @endphp
        @if($education)
        <div class="section">
            <div class="section-title">Education</div>
            <ul>
                @foreach($education as $edu)
                    <li>
                        <span class="field-label">{{ $edu['degree'] ?? '' }}</span> at <span class="field-value">{{ $edu['institution'] ?? '' }}</span>
                        @if(!empty($edu['field_of_study']))
                            ({{ $edu['field_of_study'] }})
                        @endif
                        @if(!empty($edu['start_date']) || !empty($edu['end_date']))
                            , {{ $edu['start_date'] ?? '' }} - {{ $edu['end_date'] ?? 'Present' }}
                        @endif
                        @if(!empty($edu['gpa']))
                            , GPA: {{ $edu['gpa'] }}
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
        @php $technical_skills = is_array($resume->technical_skills) ? $resume->technical_skills : json_decode($resume->technical_skills, true); @endphp
        @if($technical_skills)
        <div class="section">
            <div class="section-title">Technical Skills</div>
            <div>{{ implode(', ', $technical_skills) }}</div>
        </div>
        @endif
        @php $soft_skills = is_array($resume->soft_skills) ? $resume->soft_skills : json_decode($resume->soft_skills, true); @endphp
        @if($soft_skills)
        <div class="section">
            <div class="section-title">Soft Skills</div>
            <div>{{ implode(', ', $soft_skills) }}</div>
        </div>
        @endif
        @php $projects = is_array($resume->projects) ? $resume->projects : json_decode($resume->projects, true); @endphp
        @if($projects)
        <div class="section">
            <div class="section-title">Projects</div>
            <ul>
                @foreach($projects as $project)
                    <li>
                        <span class="field-label">{{ $project['name'] ?? '' }}</span>
                        @if(!empty($project['description']))
                            - {{ $project['description'] }}
                        @endif
                        @if(!empty($project['technologies']))
                            ({{ $project['technologies'] }})
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
        @php $languages = is_array($resume->languages) ? $resume->languages : json_decode($resume->languages, true); @endphp
        @if(is_array($languages) && count(array_filter($languages, function($l) { return !empty($l['language']) || !empty($l['name']); })) > 0)
        <div class="section">
            <div class="section-title">Languages</div>
            <ul>
                @foreach($languages as $language)
                    @php
                        $lang = $language['language'] ?? $language['name'] ?? '';
                        $prof = $language['proficiency'] ?? '';
                    @endphp
                    @if(!empty($lang))
                        <li>{{ $lang }}@if(!empty($prof)) - {{ $prof }}@endif</li>
                    @endif
                @endforeach
            </ul>
        </div>
        @endif
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
        <div class="section">
            <div class="section-title">Certifications</div>
            <div>{{ implode(', ', array_filter($certifications)) }}</div>
        </div>
        @elseif(is_string($certifications) && trim($certifications) !== '' && $certifications !== '[]')
        <div class="section">
            <div class="section-title">Certifications</div>
            <div>{{ $certifications }}</div>
        </div>
        @endif
        @if(is_array($awards) && count(array_filter($awards)) > 0)
        <div class="section">
            <div class="section-title">Awards</div>
            <div>{{ implode(', ', array_filter($awards)) }}</div>
        </div>
        @elseif(is_string($awards) && trim($awards) !== '' && $awards !== '[]')
        <div class="section">
            <div class="section-title">Awards</div>
            <div>{{ $awards }}</div>
        </div>
        @endif
        @if(is_array($volunteer) && count(array_filter($volunteer)) > 0)
        <div class="section">
            <div class="section-title">Volunteer Work</div>
            <div>{{ implode(', ', array_filter($volunteer)) }}</div>
        </div>
        @elseif(is_string($volunteer) && trim($volunteer) !== '' && $volunteer !== '[]')
        <div class="section">
            <div class="section-title">Volunteer Work</div>
            <div>{{ $volunteer }}</div>
        </div>
        @endif
        @if(is_array($interests) && count(array_filter($interests)) > 0)
        <div class="section">
            <div class="section-title">Interests</div>
            <div>{{ implode(', ', array_filter($interests)) }}</div>
        </div>
        @elseif(is_string($interests) && trim($interests) !== '' && $interests !== '[]')
        <div class="section">
            <div class="section-title">Interests</div>
            <div>{{ $interests }}</div>
        </div>
        @endif
    </div>
</body>
</html>
