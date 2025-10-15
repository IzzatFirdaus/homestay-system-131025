<?php

declare(strict_types=1);

use App\Http\Controllers\HomestayController;
use App\Http\Controllers\Homestays\StoreController;
use App\Http\Controllers\Homestays\UpdateController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\Performances\DestroyController;
use App\Http\Controllers\Performances\StoreController as PerformancesStoreController;
use App\Http\Controllers\Performances\UpdateController as PerformancesUpdateController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

// Language switching
Route::get('language/{locale}', [LocaleController::class, 'switch'])->name('language.switch');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    // Volt routes (auto-discovery), guarded
    if (class_exists(\Livewire\Volt\Volt::class)) {
        Volt::route('dashboard/volt-stats', 'dashboard.stats')->name('dashboard.volt.stats');
        Volt::route('dashboard/visitors-chart', 'dashboard.visitors-chart')->name('dashboard.visitors-chart');
        Volt::route('dashboard/revenue-by-state-chart', 'dashboard.revenue-by-state-chart')->name('dashboard.revenue-by-state-chart');
        Volt::route('homestays/volt', 'homestays.index')->name('homestays.volt.index');
    }
    // Homestays
    Route::get('homestays', [HomestayController::class, 'index'])->name('homestays.index');
    Route::get('homestays/create', [HomestayController::class, 'create'])->name('homestays.create');
    Route::post('homestays', StoreController::class)->name('homestays.store');
    Route::get('homestays/{homestay}/edit', [HomestayController::class, 'edit'])->name('homestays.edit');
    Route::put('homestays/{homestay}', UpdateController::class)->name('homestays.update');
    Route::delete('homestays/{homestay}', [HomestayController::class, 'destroy'])->name('homestays.destroy');

    // Performances
    Route::get('performances', [PerformanceController::class, 'index'])->name('performances.index');
    Route::get('performances/create', [PerformanceController::class, 'create'])->name('performances.create');
    Route::post('performances', PerformancesStoreController::class)->name('performances.store');
    Route::get('performances/{performance}/edit', [PerformanceController::class, 'edit'])->name('performances.edit');
    Route::put('performances/{performance}', PerformancesUpdateController::class)->name('performances.update');
    Route::delete('performances/{performance}', DestroyController::class)->name('performances.destroy');

    // Imports (Web UI)
    Route::get('imports', [ImportController::class, 'index'])->name('web.imports.index');
    Route::post('imports/upload', [ImportController::class, 'upload'])->name('web.imports.upload');
    Route::get('imports/{import}', [ImportController::class, 'show'])->name('web.imports.show');
    Route::get('imports/{import}/download-errors', [ImportController::class, 'downloadErrors'])->name('web.imports.download-errors');

    // Reports (Web UI)
    Route::get('reports', [ReportController::class, 'index'])->name('web.reports.index');
    Route::post('reports/generate', [ReportController::class, 'generate'])->name('web.reports.generate');
});
