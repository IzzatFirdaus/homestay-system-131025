<?php

declare(strict_types=1);

namespace Tests\Feature\Middleware;

use App\Http\Middleware\CheckImportInProgress;
use App\Models\Import;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

/**
 * CheckImportInProgressMiddlewareTest
 *
 * Tests the CheckImportInProgress middleware functionality.
 * Validates import concurrency control.
 */
class CheckImportInProgressMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    private CheckImportInProgress $middleware;

    protected function setUp(): void
    {
        parent::setUp();
        $this->middleware = new CheckImportInProgress;

        Role::create(['name' => 'Admin']);
    }

    public function test_allows_import_when_no_import_in_progress(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/imports', 'POST');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Import allowed');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Import allowed', $response->getContent());
    }

    public function test_blocks_import_when_import_in_progress(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        // Create an import in progress
        Import::factory()->create([
            'user_id' => $user->id,
            'status' => 'processing',
            'type' => 'homestay',
        ]);

        $request = Request::create('/api/imports', 'POST');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Import allowed');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(409, $response->getStatusCode());

        $responseData = json_decode($response->getContent(), true);
        $this->assertStringContainsString('import already in progress', $responseData['error']['message']);
    }

    public function test_allows_import_when_previous_import_completed(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        // Create a completed import
        Import::factory()->create([
            'user_id' => $user->id,
            'status' => 'completed',
            'type' => 'homestay',
        ]);

        $request = Request::create('/api/imports', 'POST');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Import allowed');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Import allowed', $response->getContent());
    }

    public function test_allows_import_when_previous_import_failed(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        // Create a failed import
        Import::factory()->create([
            'user_id' => $user->id,
            'status' => 'failed',
            'type' => 'homestay',
        ]);

        $request = Request::create('/api/imports', 'POST');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Import allowed');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Import allowed', $response->getContent());
    }

    public function test_allows_different_users_to_import_simultaneously(): void
    {
        $user1 = User::factory()->create();
        $user1->assignRole('Admin');

        $user2 = User::factory()->create();
        $user2->assignRole('Admin');

        // User 1 has an import in progress
        Import::factory()->create([
            'user_id' => $user1->id,
            'status' => 'processing',
            'type' => 'homestay',
        ]);

        // User 2 should still be able to start an import
        $request = Request::create('/api/imports', 'POST');
        $request->setUserResolver(fn () => $user2);

        $next = function ($request) {
            return new Response('Import allowed');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Import allowed', $response->getContent());
    }

    public function test_blocks_multiple_processing_imports_for_same_user(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        // Create multiple processing imports for the same user
        Import::factory()->create([
            'user_id' => $user->id,
            'status' => 'processing',
            'type' => 'homestay',
        ]);

        Import::factory()->create([
            'user_id' => $user->id,
            'status' => 'processing',
            'type' => 'performance',
        ]);

        $request = Request::create('/api/imports', 'POST');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Import allowed');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(409, $response->getStatusCode());

        $responseData = json_decode($response->getContent(), true);
        $this->assertStringContainsString('import already in progress', $responseData['error']['message']);
    }

    public function test_allows_import_when_import_is_queued(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        // Create a queued import (not yet processing)
        Import::factory()->create([
            'user_id' => $user->id,
            'status' => 'queued',
            'type' => 'homestay',
        ]);

        $request = Request::create('/api/imports', 'POST');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Import allowed');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Import allowed', $response->getContent());
    }

    public function test_middleware_handles_non_import_routes(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        // Create an import in progress
        Import::factory()->create([
            'user_id' => $user->id,
            'status' => 'processing',
            'type' => 'homestay',
        ]);

        // Non-import route should not be blocked
        $request = Request::create('/api/homestays', 'GET');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Success', $response->getContent());
    }

    public function test_middleware_handles_unauthenticated_requests(): void
    {
        $request = Request::create('/api/imports', 'POST');

        $next = function ($request) {
            return new Response('Import allowed');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(401, $response->getStatusCode());

        $responseData = json_decode($response->getContent(), true);
        $this->assertStringContainsString('Authentication required', $responseData['error']['message']);
    }

    public function test_middleware_provides_helpful_error_details(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $import = Import::factory()->create([
            'user_id' => $user->id,
            'status' => 'processing',
            'type' => 'homestay',
            'created_at' => now()->subMinutes(15),
        ]);

        $request = Request::create('/api/imports', 'POST');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Import allowed');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(409, $response->getStatusCode());

        $responseData = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('error', $responseData);
        $this->assertArrayHasKey('details', $responseData['error']);
        $this->assertArrayHasKey('import_id', $responseData['error']['details']);
        $this->assertArrayHasKey('import_type', $responseData['error']['details']);
        $this->assertArrayHasKey('started_at', $responseData['error']['details']);

        $this->assertEquals($import->id, $responseData['error']['details']['import_id']);
        $this->assertEquals('homestay', $responseData['error']['details']['import_type']);
    }
}
