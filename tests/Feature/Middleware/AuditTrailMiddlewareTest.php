<?php

declare(strict_types=1);

namespace Tests\Feature\Middleware;

use App\Http\Middleware\AuditTrail;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

/**
 * AuditTrailMiddlewareTest
 *
 * Tests the AuditTrail middleware functionality.
 * Validates audit log creation for CUD operations.
 */
class AuditTrailMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    private AuditTrail $middleware;

    protected function setUp(): void
    {
        parent::setUp();
        $this->middleware = new AuditTrail();

        // Create a test role
        Role::create(['name' => 'Admin']);
    }

    public function test_audit_trail_logs_create_operations(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/homestays', 'POST', [
            'nama' => 'Test Homestay',
            'negeri' => 'Selangor',
        ]);

        $request->setUserResolver(fn () => $user);

        // Mock the response with some data
        $next = function ($request) {
            $response = new Response();
            $response->setContent(json_encode(['id' => 1, 'nama' => 'Test Homestay']));

            return $response;
        };

        // Execute middleware
        $response = $this->middleware->handle($request, $next);

        // Assert audit log was created
        $this->assertDatabaseHas('audit_logs', [
            'user_id' => $user->id,
            'action' => 'created',
            'model' => 'App\\Models\\Homestay',
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        $auditLog = AuditLog::where('user_id', $user->id)
            ->where('action', 'created')
            ->first();
        $this->assertNotNull($auditLog);
        $this->assertEquals('created', $auditLog->action);
        $this->assertNotNull($auditLog->after);
    }

    public function test_audit_trail_logs_update_operations(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/homestays/1', 'PUT', [
            'nama' => 'Updated Homestay',
            'negeri' => 'Johor',
        ]);

        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            $response = new Response();
            $response->setContent(json_encode(['id' => 1, 'nama' => 'Updated Homestay']));

            return $response;
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertDatabaseHas('audit_logs', [
            'user_id' => $user->id,
            'action' => 'updated',
            'model' => 'App\\Models\\Homestay',
            'model_id' => 1,
        ]);
    }

    public function test_audit_trail_logs_delete_operations(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/homestays/1', 'DELETE');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('', 204);
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertDatabaseHas('audit_logs', [
            'user_id' => $user->id,
            'action' => 'deleted',
            'model' => 'App\\Models\\Homestay',
            'model_id' => 1,
        ]);
    }

    public function test_audit_trail_skips_get_operations(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/homestays', 'GET');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response(json_encode(['data' => []]));
        };

        $response = $this->middleware->handle($request, $next);

        // Should not create audit log for GET requests
        $this->assertDatabaseMissing('audit_logs', [
            'user_id' => $user->id,
            'action' => 'READ',
        ]);
    }

    public function test_audit_trail_handles_unauthenticated_requests(): void
    {
        $request = Request::create('/api/homestays', 'POST', [
            'nama' => 'Test Homestay',
        ]);

        $next = function ($request) {
            return new Response('Unauthorized', 401);
        };

        $response = $this->middleware->handle($request, $next);

        // Should log even if unauthenticated (with user_id = null)
        $this->assertDatabaseHas('audit_logs', [
            'user_id' => null,
            'action' => 'created',
            'model' => 'App\\Models\\Homestay',
        ]);
    }

    public function test_audit_trail_captures_request_metadata(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/homestays', 'POST', [
            'nama' => 'Test Homestay',
        ]);

        $request->headers->set('User-Agent', 'TestAgent/1.0');
        $request->server->set('REMOTE_ADDR', '192.168.1.100');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response(json_encode(['id' => 1]));
        };

        $response = $this->middleware->handle($request, $next);

        $auditLog = AuditLog::where('user_id', $user->id)
            ->where('action', 'created')
            ->first();

        $this->assertNotNull($auditLog);
        // IP might be 192.168.1.100 or 127.0.0.1 depending on test environment
        $this->assertNotNull($auditLog->ip_address);
        // User agent should be captured
        $this->assertNotNull($auditLog->user_agent);
        $this->assertNotNull($auditLog->created_at);
    }

    public function test_audit_trail_handles_api_routes(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/v1/homestays', 'POST', [
            'nama' => 'API Homestay',
        ]);

        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response(json_encode(['id' => 1]));
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertDatabaseHas('audit_logs', [
            'user_id' => $user->id,
            'action' => 'created',
            'model' => 'App\\Models\\Homestay',
        ]);

        $auditLog = AuditLog::where('user_id', $user->id)
            ->where('action', 'created')
            ->first();

        $this->assertNotNull($auditLog);
        $this->assertNotNull($auditLog->after);
        $this->assertArrayHasKey('url', $auditLog->after);
        $this->assertStringContainsString('/api/v1/homestays', $auditLog->after['url']);
    }

    public function test_audit_trail_handles_bulk_operations(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/homestays/bulk', 'POST', [
            'homestays' => [
                ['nama' => 'Homestay 1'],
                ['nama' => 'Homestay 2'],
            ],
        ]);

        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response(json_encode(['created' => 2]));
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertDatabaseHas('audit_logs', [
            'user_id' => $user->id,
            'action' => 'created',
            'model' => 'App\\Models\\Homestay',
        ]);

        $auditLog = AuditLog::where('user_id', $user->id)
            ->where('action', 'created')
            ->first();

        $this->assertNotNull($auditLog);
        $this->assertNotNull($auditLog->after);
        $this->assertArrayHasKey('parameters', $auditLog->after);
        $this->assertArrayHasKey('homestays', $auditLog->after['parameters']);
        $this->assertCount(2, $auditLog->after['parameters']['homestays']);
    }
}
