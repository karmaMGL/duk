<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        // Register dashboard components
        $this->registerDashboardComponents();
    }

    /**
     * Register dashboard components as anonymous components.
     */
    protected function registerDashboardComponents(): void
    {
        // Register components using the correct path structure
        Blade::component('dashboard.components.stats-card', 'dashboard.stats-card');
        Blade::component('dashboard.components.progress-card', 'dashboard.progress-card');
        Blade::component('dashboard.components.activity-item', 'dashboard.activity-item');
        Blade::component('dashboard.components.upcoming-test', 'dashboard.upcoming-test');
        Blade::component('dashboard.components.study-plan-card', 'dashboard.study-plan-card');
    }
}
