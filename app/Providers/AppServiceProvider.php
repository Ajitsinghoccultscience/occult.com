<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register anonymous components from resources/views/component/
        // Allows <x-ui.button>, <x-ui.card>, <x-ui.badge>, etc.
        Blade::anonymousComponentPath(resource_path('views/component'));
    }
}
