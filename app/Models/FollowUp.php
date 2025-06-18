<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FollowUp extends Model
{
    protected $fillable = [
        'user_id',
        'application_id',
        'follow_up_date',
        'notes',
        'completed',
        'reminder_sent_at'
    ];

    protected $casts = [
        'follow_up_date' => 'date',
        'completed' => 'boolean',
        'reminder_sent_at' => 'datetime'
    ];

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}