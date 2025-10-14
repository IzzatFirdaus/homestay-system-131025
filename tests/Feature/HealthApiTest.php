<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Test health check endpoint.
 */
final class HealthApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_health_endpoint_returns_success_when_healthy(): void
    {
        $response = $this->getJson('/api/v1/health');

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                'status',
                'checks',
                'timestamp',
            ],
        ]);

        $response->assertJson([
            'data' => [
                'status' => 'healthy',
            ],
        ]);
    }

    public function test_health_endpoint_does_not_require_authentication(): void
    {
        $response = $this->getJson('/api/v1/health');

        $response->assertOk();
    }

    public function test_health_endpoint_checks_database(): void
    {
        $response = $this->getJson('/api/v1/health');

        $response->assertOk();
        $response->assertJsonPath('data.checks.database', 'ok');
    }

    public function test_health_endpoint_checks_cache(): void
    {
        $response = $this->getJson('/api/v1/health');

        $response->assertOk();
        $response->assertJsonPath('data.checks.cache', 'ok');
    }
}
