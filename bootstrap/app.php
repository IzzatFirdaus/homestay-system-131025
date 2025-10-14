<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        apiPrefix: 'api',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Register custom middleware
        $middleware->alias([
            'audit.trail' => \App\Http\Middleware\AuditTrail::class,
            'homestay.access' => \App\Http\Middleware\CheckHomestayAccess::class,
            'import.check' => \App\Http\Middleware\CheckImportInProgress::class,
            'negeri.required' => \App\Http\Middleware\EnsureNegeriAssigned::class,
        ]);

        // Apply audit trail middleware to all web and api routes
        $middleware->web(append: [
            \App\Http\Middleware\AuditTrail::class,
        ]);

        $middleware->api(append: [
            \App\Http\Middleware\AuditTrail::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
