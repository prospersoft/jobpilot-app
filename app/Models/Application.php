<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;
use Carbon\Carbon;


class Application extends Model
{
    use HasFactory;

    // Add status constants
    const STATUS_WISHLIST = 'wishlist';
    const STATUS_APPLIED = 'applied';
    const STATUS_SCREENING = 'screening';
    const STATUS_INTERVIEWING = 'interviewing';
    const STATUS_OFFER = 'offer';
    const STATUS_REJECTED = 'rejected';
    const STATUS_WITHDRAWN = 'withdrawn';

    protected $fillable = [
        'user_id',
        'company_name',
        'job_title',
        'status',
        'applied_date',
        'job_description',
        'salary_range',
        'location',
        'contact_name',
        'contact_email',
        'notes',
        'job_type',
        'category'
    ];

    protected $casts = [
        'applied_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

        protected $dates = [
        'applied_date',
        'created_at',
        'updated_at'
    ];

    // Add this method to handle null dates
    public function getAppliedDateAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }

    // Add a status attribute accessor
    public function getStatusListAttribute()
    {
        return [
            self::STATUS_WISHLIST => 'Wishlist',
            self::STATUS_APPLIED => 'Applied',
            self::STATUS_SCREENING => 'Screening',
            self::STATUS_INTERVIEWING => 'Interviewing',
            self::STATUS_OFFER => 'Offer',
            self::STATUS_REJECTED => 'Rejected',
            self::STATUS_WITHDRAWN => 'Withdrawn'
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function resume()
    {
        return $this->documents()->where('type', 'resume')->latest();
    }

    public function coverLetter()
    {
        return $this->documents()->where('type', 'cover_letter')->latest();
    }

     /**
     * Get the follow-up associated with the application.
     */
    public function followUp(): HasOne
    {
        return $this->hasOne(FollowUp::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

      protected static function booted()
    {
        static::addGlobalScope('exclude_wishlist', function (Builder $builder) {
            $builder->where('status', '!=', self::STATUS_WISHLIST);
        });
    }

    // Add a method to include wishlist items when needed
    public function scopeWithWishlist($query)
    {
        return $query->withoutGlobalScope('exclude_wishlist');
    }

    
}