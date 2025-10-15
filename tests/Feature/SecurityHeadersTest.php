<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('health endpoint returns security headers', function () {
    $response = test()->get('/api/v1/health');

    $response->assertOk()
        ->assertHeader('X-Content-Type-Options', 'nosniff')
        ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
        ->assertHeader('X-XSS-Protection', '1; mode=block')
        ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');

    // CSP should be present
    expect($response->headers->get('Content-Security-Policy'))->toContain("default-src 'self'");
});

test('ready endpoint returns security headers', function () {
    $response = test()->get('/api/v1/ready');

    // May be 503 if services not available in test
    expect($response->status())->toBeIn([200, 503]);

    $response->assertHeader('X-Content-Type-Options', 'nosniff')
        ->assertHeader('X-Frame-Options', 'SAMEORIGIN');
});

test('web routes return security headers', function () {
    $response = test()->get('/');

    $response->assertHeader('X-Content-Type-Options', 'nosniff')
        ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
        ->assertHeader('Content-Security-Policy');
});

test('hsts header only present in production', function () {
    // In testing environment, HSTS should not be present
    $response = test()->get('/');

    expect($response->headers->has('Strict-Transport-Security'))->toBeFalse();
});
