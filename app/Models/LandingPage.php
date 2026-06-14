<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LandingPage extends Model
{
    protected $table = 'counsellor_links';

    protected $fillable = [
        'admin_user_id', 'label', 'slug',
        'lp_course_name', 'lp_enrolled', 'lp_rating', 'lp_seats',
        'lp_price', 'lp_old_price', 'lp_discount', 'lp_timer_minutes',
    ];

    public function counsellor(): BelongsTo
    {
        return $this->belongsTo(AdminUser::class, 'admin_user_id');
    }

    /**
     * Look up a landing page by its URL slug.
     */
    public static function forSlug(?string $slug): ?self
    {
        if (!$slug) {
            return null;
        }
        return static::where('slug', $slug)->first();
    }
}
