<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Volt is optional; only use if available

Route::middleware('guest')->group(function () {
    if (class_exists('Livewire\\Volt\\Volt')) {
        \call_user_func(['Livewire\\Volt\\Volt', 'route'], 'register', 'pages.auth.register')->name('register');
        \call_user_func(['Livewire\\Volt\\Volt', 'route'], 'login', 'pages.auth.login')->name('login');
        \call_user_func(['Livewire\\Volt\\Volt', 'route'], 'forgot-password', 'pages.auth.forgot-password')->name('password.request');
        \call_user_func(['Livewire\\Volt\\Volt', 'route'], 'reset-password/{token}', 'pages.auth.reset-password')->name('password.reset');
    }
});

Route::middleware('auth')->group(function () {
    if (class_exists('Livewire\\Volt\\Volt')) {
        \call_user_func(['Livewire\\Volt\\Volt', 'route'], 'verify-email', 'pages.auth.verify-email')->name('verification.notice');
    }

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    if (class_exists('Livewire\\Volt\\Volt')) {
        \call_user_func(['Livewire\\Volt\\Volt', 'route'], 'confirm-password', 'pages.auth.confirm-password')->name('password.confirm');
    }
});
