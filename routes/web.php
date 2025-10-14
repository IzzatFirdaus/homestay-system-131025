<?php

declare(strict_types=1);

use App\Http\Controllers\ClusterController;
use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| All web routes with authentication, RBAC, and CSRF protection.
|
*/

// Public welcome page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication routes - basic for testing
Route::get('/login', function () {
    /** @var view-string */
    $viewName = 'auth.login';

    return view($viewName);
})->name('login');

Route::post('/logout', function () {
    Auth::logout();

    return redirect('/login');
})->name('logout');

// Authentication routes would be here (login, logout, register, etc.)
// Laravel provides Auth::routes() or manual route definitions

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Homestay resource routes
    Route::resource('homestays', HomestayController::class);

    // Performance (read-only for now)
    Route::resource('performances', PerformanceController::class)
        ->only(['index', 'show']);

    // Cooperatives (read-only)
    Route::resource('cooperatives', CooperativeController::class)
        ->only(['index', 'show']);

    // Clusters (read-only)
    Route::resource('clusters', ClusterController::class)
        ->only(['index', 'show']);

    // Import routes
    Route::prefix('imports')->name('imports.')->group(function () {
        Route::get('/', [ImportController::class, 'index'])->name('index');
        Route::get('/create', [ImportController::class, 'create'])->name('create');
        Route::post('/preview', [ImportController::class, 'preview'])->name('preview');
        Route::post('/', [ImportController::class, 'store'])->name('store');
        Route::get('/{import}', [ImportController::class, 'show'])->name('show');
        Route::get('/{import}/errors', [ImportController::class, 'downloadErrors'])->name('errors');
    });

    // Report routes
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('/create', [ReportController::class, 'create'])->name('create');
        Route::post('/generate', [ReportController::class, 'generate'])->name('generate');
        Route::post('/', [ReportController::class, 'store'])->name('store');
        Route::get('/{report}', [ReportController::class, 'show'])->name('show');
        Route::get('/{report}/download', [ReportController::class, 'download'])->name('download');
        Route::delete('/{report}', [ReportController::class, 'destroy'])->name('destroy');
    });

    // User management routes (admin only - middleware will be added)
    Route::middleware(['can:manage,App\Models\User'])->group(function () {
        Route::resource('users', UserController::class);
    });
});
