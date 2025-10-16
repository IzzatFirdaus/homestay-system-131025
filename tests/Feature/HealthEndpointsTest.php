<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HealthEndpointsTest extends TestCase
{
    use RefreshDatabase;

    public function test_health_check_endpoint_returns_ok_status(): void
    {
        $response = $this->get('/api/v1/health');

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
    }

    public function test_ready_endpoint_checks_database_and_cache(): void
    {
        $response = $this->get('/api/v1/ready');

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
        $this->assertSame('ok', $data['checks']['database']['status']);
        $this->assertSame('ok', $data['checks']['cache']['status']);
    }
}
