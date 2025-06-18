<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'scheduled_at',
        'notes',
        'user_id', 
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    // Relationships (example: if an interview belongs to an application)
    // public function application()
    // {
    //     return $this->belongsTo(Application::class);
    // }
}