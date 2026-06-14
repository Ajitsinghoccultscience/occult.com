<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdminUser extends Model
{
    protected $table    = 'admin_users';
    protected $hidden   = ['password'];
    protected $fillable = [
        'name', 'email', 'password', 'role', 'whatsapp_phone_number_id',
        'slug', 'lp_course_name', 'lp_enrolled', 'lp_rating', 'lp_seats',
        'lp_price', 'lp_old_price', 'lp_discount', 'lp_timer_minutes',
    ];

    /**
     * Landing-page links owned by this counsellor.
     */
    public function landingPages(): HasMany
    {
        return $this->hasMany(LandingPage::class, 'admin_user_id');
    }

    /**
     * Look up a counsellor by their landing-page URL slug.
     */
    public static function forSlug(?string $slug): ?self
    {
        if (!$slug) {
            return null;
        }
        return static::where('slug', $slug)->first();
    }
}
