<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // Import the Paginator facade

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
        // Set the default pagination view to the custom one
        Paginator::defaultView('vendor.pagination.modern-tailwind');
        Paginator::defaultSimpleView('vendor.pagination.modern-tailwind'); // Also set for simple pagination if used
    }
}
