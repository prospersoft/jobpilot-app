<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'professional_title',
        'email',
        'phone',
        'location',
        'linkedin',
        'github', // Added github here
        'summary',
        'experience',
        'education',
        'technical_skills',
        'soft_skills',
        'languages',
        'projects',
        'certifications',
        'awards',
        'volunteer',
        'interests',
    ];

    protected $casts = [
        'experience' => 'array',
        'education' => 'array',
        'technical_skills' => 'array',
        'soft_skills' => 'array',
        'languages' => 'array',
        'projects' => 'array',
    ];
}
