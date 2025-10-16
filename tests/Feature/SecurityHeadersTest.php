<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SecurityHeadersTest extends TestCase
{
    use RefreshDatabase;

    public function test_health_endpoint_returns_security_headers(): void
    {
        $response = $this->get('/api/v1/health');

        $response->assertOk()
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
            ->assertHeader('X-XSS-Protection', '1; mode=block')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');

        // CSP should be present
        $this->assertStringContainsString("default-src 'self'", $response->headers->get('Content-Security-Policy'));
    }

    public function test_ready_endpoint_returns_security_headers(): void
    {
        $response = $this->get('/api/v1/ready');

        // May be 503 if services not available in test
        $this->assertTrue(in_array($response->status(), [200, 503], true));

        $response->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN');
    }

    public function test_web_routes_return_security_headers(): void
    {
        $response = $this->get('/');

        $response->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
            ->assertHeader('Content-Security-Policy');
    }

    public function test_hsts_header_only_present_in_production(): void
    {
        // In testing environment, HSTS should not be present
        $response = $this->get('/');

        $this->assertFalse($response->headers->has('Strict-Transport-Security'));
    }
}
