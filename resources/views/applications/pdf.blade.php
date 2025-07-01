<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resume / Application PDF</title>
    <style>
        body { font-family: DejaVu Sans, Arial, sans-serif; color: #222; font-size: 13px; margin: 0; padding: 0; }
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
        <div class="header">
            <h1>{{ $application->full_name ?? $application->company_name ?? 'Application' }}</h1>
            @if(!empty($application->job_title))
                <div><span class="field-label">Position:</span> <span class="field-value">{{ $application->job_title }}</span></div>
            @endif
            @if(!empty($application->email))
                <div><span class="field-label">Email:</span> <span class="field-value">{{ $application->email }}</span></div>
            @endif
            @if(!empty($application->phone))
                <div><span class="field-label">Phone:</span> <span class="field-value">{{ $application->phone }}</span></div>
            @endif
        </div>
        <hr>
        <div class="section">
            <div class="section-title">Application Details</div>
            <div><span class="field-label">Company:</span> <span class="field-value">{{ $application->company_name }}</span></div>
            <div><span class="field-label">Job Title:</span> <span class="field-value">{{ $application->job_title }}</span></div>
            <div><span class="field-label">Status:</span> <span class="field-value">{{ ucfirst($application->status) }}</span></div>
            <div><span class="field-label">Job Type:</span> <span class="field-value">{{ $application->job_type }}</span></div>
            <div><span class="field-label">Category:</span> <span class="field-value">{{ $application->category }}</span></div>
            <div><span class="field-label">Applied Date:</span> <span class="field-value">{{ $application->applied_date->format('M j, Y') }}</span></div>
        </div>
        @if($application->documents && $application->documents->isNotEmpty())
            <div class="section">
                <div class="section-title">Documents</div>
                <ul>
                    @foreach($application->documents as $document)
                        <li><span class="field-label">{{ ucfirst($document->type) }}:</span> <span class="field-value">{{ $document->original_filename }}</span></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>
