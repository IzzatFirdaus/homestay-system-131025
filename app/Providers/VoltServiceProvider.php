<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Volt is optional; reference via FQCN to avoid class loading during analysis

class VoltServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        try {
            if (class_exists('Livewire\\Volt\\Volt')) {
                // Call statically without referencing class directly so analyzers won't require the package
                \call_user_func(['Livewire\\Volt\\Volt', 'mount'], [
                    config('livewire.view_path', resource_path('views/livewire')),
                    resource_path('views/pages'),
                ]);
            }
        } catch (\Throwable $e) {
            // Volt not installed; safely ignore
            // This catch block is intentionally empty as Volt is optional
            report($e);
        }
    }
}
