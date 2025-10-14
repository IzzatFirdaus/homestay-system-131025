<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\ClusterApiController;
use App\Http\Controllers\Api\V1\CooperativeApiController;
use App\Http\Controllers\Api\V1\HealthController;
use App\Http\Controllers\Api\V1\HomestayApiController;
use App\Http\Controllers\Api\V1\ImportApiController;
use App\Http\Controllers\Api\V1\PerformanceApiController;
use App\Http\Controllers\Api\V1\ReportApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes (Version 1)
|--------------------------------------------------------------------------
|
| All API routes with Sanctum authentication, rate limiting, and versioning.
| Responses follow the standard envelope: { data, meta } or { error }
|
*/

// Public health check (no authentication required)
Route::get('/v1/health', [HealthController::class, 'index'])
    ->name('api.health');

// Authenticated API routes
Route::prefix('v1')->middleware(['auth:sanctum', 'throttle:api'])->name('api.v1.')->group(function () {

    // Homestay endpoints
    Route::apiResource('homestays', HomestayApiController::class);

    // Performance endpoints (read-only)
    Route::apiResource('performances', PerformanceApiController::class)
        ->only(['index', 'show']);

    // Cooperative endpoints (read-only)
    Route::apiResource('cooperatives', CooperativeApiController::class)
        ->only(['index', 'show']);

    // Cluster endpoints (read-only)
    Route::apiResource('clusters', ClusterApiController::class)
        ->only(['index', 'show']);

    // Import endpoints
    Route::prefix('imports')->name('imports.')->group(function () {
        Route::get('/', [ImportApiController::class, 'index'])->name('index');
        Route::post('/preview', [ImportApiController::class, 'preview'])->name('preview');
        Route::post('/process', [ImportApiController::class, 'process'])->name('process');
        Route::get('/{import}', [ImportApiController::class, 'show'])->name('show');
        Route::get('/{import}/status', [ImportApiController::class, 'status'])->name('status');
        Route::get('/{import}/errors', [ImportApiController::class, 'downloadErrors'])->name('errors');
    });

    // Report endpoints
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [ReportApiController::class, 'index'])->name('index');
        Route::post('/generate', [ReportApiController::class, 'generate'])->name('generate');
        Route::get('/{report}', [ReportApiController::class, 'show'])->name('show');
        Route::get('/{report}/download', [ReportApiController::class, 'download'])->name('download');
    });
});

// Rate limiting configuration for different endpoint types
// Applied via middleware in RouteServiceProvider or bootstrap/app.php
