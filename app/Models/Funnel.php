<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Funnel extends Model
{
    protected $fillable = ['name'];

    public function steps(): HasMany
    {
        return $this->hasMany(FunnelStep::class)->orderBy('step_order');
    }
}
