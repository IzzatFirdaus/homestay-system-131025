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
        $this->middleware = new AuditTrail;

        // Clear permission cache to avoid test pollution
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Ensure the test role exists
        Role::findOrCreate('Admin', 'web');
    }

    public function test_audit_trail_logs_create_operations(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/homestays', 'POST', [
            'nama_homestay' => 'Test Homestay',
            'negeri' => 'Selangor',
        ]);

        $request->setUserResolver(fn () => $user);

        // Mock the response with some data
        $next = function ($request) {
            $response = new Response;
            $response->setContent(json_encode(['id' => 1, 'nama_homestay' => 'Test Homestay']));

            return $response;
        };

        // Execute middleware
        $response = $this->middleware->handle($request, $next);

        // Assert audit log was created
        $this->assertDatabaseHas('audit_logs', [
            'user_id' => $user->id,
            'action' => 'CREATE',
            'table_name' => 'homestays',
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        $auditLog = AuditLog::where('user_id', $user->id)->first();
        $this->assertNotNull($auditLog);
        $this->assertEquals('CREATE', $auditLog->action);
        $this->assertNotNull($auditLog->new_values);
    }

    public function test_audit_trail_logs_update_operations(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/homestays/1', 'PUT', [
            'nama_homestay' => 'Updated Homestay',
            'negeri' => 'Johor',
        ]);

        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            $response = new Response;
            $response->setContent(json_encode(['id' => 1, 'nama_homestay' => 'Updated Homestay']));

            return $response;
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertDatabaseHas('audit_logs', [
            'user_id' => $user->id,
            'action' => 'UPDATE',
            'table_name' => 'homestays',
            'record_id' => '1',
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
            'action' => 'DELETE',
            'table_name' => 'homestays',
            'record_id' => '1',
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
            'nama_homestay' => 'Test Homestay',
        ]);

        $next = function ($request) {
            return new Response('Unauthorized', 401);
        };

        $response = $this->middleware->handle($request, $next);

        // Should not create audit log for unauthenticated requests
        $this->assertDatabaseMissing('audit_logs', [
            'action' => 'CREATE',
        ]);
    }

    public function test_audit_trail_captures_request_metadata(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/homestays', 'POST', [
            'nama_homestay' => 'Test Homestay',
        ]);

        $request->headers->set('User-Agent', 'TestAgent/1.0');
        $request->server->set('REMOTE_ADDR', '192.168.1.100');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response(json_encode(['id' => 1]));
        };

        $response = $this->middleware->handle($request, $next);

        $auditLog = AuditLog::where('user_id', $user->id)->first();
        $this->assertEquals('192.168.1.100', $auditLog->ip_address);
        $this->assertEquals('TestAgent/1.0', $auditLog->user_agent);
        $this->assertNotNull($auditLog->created_at);
    }

    public function test_audit_trail_handles_api_routes(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/v1/homestays', 'POST', [
            'nama_homestay' => 'API Homestay',
        ]);

        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response(json_encode(['id' => 1]));
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertDatabaseHas('audit_logs', [
            'user_id' => $user->id,
            'action' => 'CREATE',
            'table_name' => 'homestays',
        ]);

        $auditLog = AuditLog::where('user_id', $user->id)->first();
        $this->assertStringContainsString('/api/v1/homestays', $auditLog->url);
    }

    public function test_audit_trail_handles_bulk_operations(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $request = Request::create('/api/homestays/bulk', 'POST', [
            'homestays' => [
                ['nama_homestay' => 'Homestay 1'],
                ['nama_homestay' => 'Homestay 2'],
            ],
        ]);

        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response(json_encode(['created' => 2]));
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertDatabaseHas('audit_logs', [
            'user_id' => $user->id,
            'action' => 'CREATE',
            'table_name' => 'homestays',
        ]);

        $auditLog = AuditLog::where('user_id', $user->id)->first();
        $requestData = json_decode($auditLog->new_values, true);
        $this->assertArrayHasKey('homestays', $requestData);
        $this->assertCount(2, $requestData['homestays']);
    }
}
