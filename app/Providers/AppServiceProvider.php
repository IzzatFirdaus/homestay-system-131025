<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Homestay;
use App\Models\Import;
use App\Models\Performance;
use App\Models\User;
use App\Observers\HomestayObserver;
use App\Observers\ImportObserver;
use App\Observers\PerformanceObserver;
use App\Observers\UserObserver;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Configure rate limiters
        $this->configureRateLimiting();

        // Register model observers for audit trail logging
        $this->registerObservers();
    }

    /**
     * Configure the rate limiters for the application.
     */
    private function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            $key = $request->user()?->id;
            if ($key === null) {
                $key = $request->ip();
            }

            return Limit::perMinute(60)->by((string) $key);
        });
    }

    /**
     * Register Eloquent model observers.
     *
     * Observers automatically log model events to the audit trail
     * for compliance and security monitoring purposes.
     */
    private function registerObservers(): void
    {
        Homestay::observe(HomestayObserver::class);
        Performance::observe(PerformanceObserver::class);
        Import::observe(ImportObserver::class);
        User::observe(UserObserver::class);
    }
}
