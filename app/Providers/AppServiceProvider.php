<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::enforceMorphMap([
            'vehicle' => 'App\Models\Vehicle',
            'equipment' => 'App\Models\Equipment',
            'parts' => 'App\Models\Part',
            'user' => 'App\Models\User',
        ]);
    }
}
