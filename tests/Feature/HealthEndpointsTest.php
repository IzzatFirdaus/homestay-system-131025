<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

test('health check endpoint returns ok status', function () {
    $response = test()->get('/api/v1/health');

    $response->assertOk()
        ->assertJson([
            'status' => 'healthy',
            'database' => 'connected',
        ])
        ->assertJsonStructure([
            'status',
            'timestamp',
            'version',
            'environment',
            'database',
        ]);
});

test('health check fails when database disconnected', function () {
    // Mock database failure
    DB::shouldReceive('connection->getPdo')->andThrow(new \Exception('Connection failed'));

    $response = test()->get('/api/v1/health');

    $response->assertStatus(503)
        ->assertJson([
            'status' => 'unhealthy',
            'database' => 'disconnected',
        ]);
})->skip('Requires DB mock setup');

test('ready endpoint checks database and cache', function () {
    $response = test()->get('/api/v1/ready');

    $response->assertOk()
        ->assertJson([
            'status' => 'ready',
        ])
        ->assertJsonStructure([
            'status',
            'timestamp',
            'checks' => [
                'database',
                'cache',
            ],
        ]);

    $data = $response->json();
    expect($data['checks']['database']['status'])->toBe('ok');
    expect($data['checks']['cache']['status'])->toBe('ok');
});

test('ready endpoint returns 503 when cache unavailable', function () {
    // Force cache failure
    Cache::shouldReceive('put')->andThrow(new \Exception('Cache error'));

    $response = test()->get('/api/v1/ready');

    $response->assertStatus(503)
        ->assertJson([
            'status' => 'unavailable',
        ]);

    $data = $response->json();
    expect($data['checks']['cache']['status'])->toBe('error');
})->skip('Requires cache mock setup');
