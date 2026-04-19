<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LandingPage extends Model
{
    protected $fillable = ['title', 'slug', 'is_active', 'meta_title', 'meta_description'];

    protected $casts = ['is_active' => 'boolean'];

    public function sections(): HasMany
    {
        return $this->hasMany(LandingPageSection::class)->orderBy('sort_order');
    }

    public function activeSections(): HasMany
    {
        return $this->hasMany(LandingPageSection::class)->where('is_active', true)->orderBy('sort_order');
    }

    public function funnelSteps(): HasMany
    {
        return $this->hasMany(FunnelStep::class);
    }
}
