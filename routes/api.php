<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\ClusterController;
use App\Http\Controllers\Api\V1\CooperativeController;
use App\Http\Controllers\Api\V1\HealthController;
use App\Http\Controllers\Api\V1\HomestayController;
use App\Http\Controllers\Api\V1\ImportController;
use App\Http\Controllers\Api\V1\PerformanceController;
use App\Http\Controllers\Api\V1\ReportController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| RESTful API endpoints for the Homestay Malaysia Management & Analytics System.
| All routes are prefixed with /api/v1 and require authentication via Sanctum.
| Rate limiting: 300/min for authenticated users, 60/min for public endpoints.
|
*/

// API v1 routes
Route::prefix('v1')->group(function (): void {
    // Health check endpoints (public)
    Route::get('/health', [HealthController::class, 'check'])->name('api.health');
    Route::get('/ready', [HealthController::class, 'ready'])->name('api.ready');

    // Authenticated API routes
    Route::middleware(['auth:sanctum', 'throttle:300,1'])->group(function (): void {
        // Homestay resource routes
        Route::apiResource('homestays', HomestayController::class)
            ->names([
                'index' => 'api.homestays.index',
                'store' => 'api.homestays.store',
                'show' => 'api.homestays.show',
                'update' => 'api.homestays.update',
                'destroy' => 'api.homestays.destroy',
            ])
            ->middleware('can:viewAny,App\Models\Homestay');

        // Performance resource routes
        Route::apiResource('performances', PerformanceController::class)
            ->names([
                'index' => 'api.performances.index',
                'store' => 'api.performances.store',
                'show' => 'api.performances.show',
                'update' => 'api.performances.update',
                'destroy' => 'api.performances.destroy',
            ])
            ->middleware('can:viewAny,App\Models\Performance');

        // Cooperative resource routes
        Route::apiResource('cooperatives', CooperativeController::class)
            ->names([
                'index' => 'api.cooperatives.index',
                'store' => 'api.cooperatives.store',
                'show' => 'api.cooperatives.show',
                'update' => 'api.cooperatives.update',
                'destroy' => 'api.cooperatives.destroy',
            ])
            ->middleware('can:viewAny,App\Models\Cooperative');

        // Cluster resource routes
        Route::apiResource('clusters', ClusterController::class)
            ->names([
                'index' => 'api.clusters.index',
                'store' => 'api.clusters.store',
                'show' => 'api.clusters.show',
                'update' => 'api.clusters.update',
                'destroy' => 'api.clusters.destroy',
            ])
            ->middleware('can:viewAny,App\Models\Cluster');

        // User management routes (admin only)
        Route::apiResource('users', UserController::class)
            ->names([
                'index' => 'api.users.index',
                'store' => 'api.users.store',
                'show' => 'api.users.show',
                'update' => 'api.users.update',
                'destroy' => 'api.users.destroy',
            ])
            ->middleware('can:viewAny,App\Models\User');

        // Import routes with custom actions
        Route::prefix('imports')->name('imports.')->group(function (): void {
            Route::get('/', [ImportController::class, 'index'])
                ->middleware('can:viewAny,App\Models\Import')
                ->name('index');

            Route::get('/{import}', [ImportController::class, 'show'])
                ->middleware('can:view,import')
                ->name('show');

            Route::post('/preview', [ImportController::class, 'preview'])
                ->middleware('can:import,App\Models\Homestay')
                ->name('preview');

            Route::post('/process', [ImportController::class, 'process'])
                ->middleware('can:import,App\Models\Homestay')
                ->name('process');

            Route::get('/{import}/errors', [ImportController::class, 'downloadErrors'])
                ->middleware('can:view,import')
                ->name('errors.download');
        });

        // Report routes with custom actions
        Route::prefix('reports')->name('reports.')->group(function (): void {
            Route::get('/', [ReportController::class, 'index'])->name('index');
            Route::get('/{report}', [ReportController::class, 'show'])->name('show');

            Route::post('/generate', [ReportController::class, 'generate'])
                ->name('generate');

            Route::post('/schedule', [ReportController::class, 'schedule'])
                ->name('schedule');

            Route::get('/{report}/download', [ReportController::class, 'download'])
                ->name('download');
        });
    }); // End authenticated routes
}); // End v1 prefix
