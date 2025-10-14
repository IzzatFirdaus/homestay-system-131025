<?php

declare(strict_types=1);

namespace Tests\Feature\Middleware;

use App\Http\Middleware\CheckHomestayAccess;
use App\Models\Homestay;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

/**
 * CheckHomestayAccessMiddlewareTest
 *
 * Tests the CheckHomestayAccess middleware functionality.
 * Validates scope-based access control for homestay operations.
 */
class CheckHomestayAccessMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    private CheckHomestayAccess $middleware;

    protected function setUp(): void
    {
        parent::setUp();
        $this->middleware = new CheckHomestayAccess;

        // Create roles
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Penganalisis']);
        Role::create(['name' => 'Pemerhati']);
    }

    /**
     * Create a request with a mocked route.
     */
    private function createRequestWithRoute(string $uri, string $method = 'GET', array $parameters = []): Request
    {
        $request = Request::create($uri, $method);

        // Create a mock route and bind it
        $route = new Route($method, $uri, []);
        $route->bind($request);  // Bind the route to initialize parameters

        foreach ($parameters as $key => $value) {
            $route->setParameter($key, $value);
        }

        $request->setRouteResolver(fn () => $route);

        return $request;
    }

    public function test_super_admin_can_access_any_homestay(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Super Admin');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET', [
            'homestay' => (string) $homestay->id,
        ]);
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Success', $response->getContent());
    }

    public function test_admin_can_access_homestay_in_same_negeri(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Admin');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET', [
            'homestay' => (string) $homestay->id,
        ]);
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_admin_cannot_access_homestay_in_different_negeri(): void
    {
        $user = User::factory()->create(['negeri' => 'Johor']);
        $user->assignRole('Admin');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET', [
            'homestay' => (string) $homestay->id,
        ]);
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(403, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertStringContainsString('homestay', strtolower($responseData['error']['message']));
    }

    public function test_user_can_access_homestay_in_same_koperasi(): void
    {
        // First create the cooperative
        $cooperative = \App\Models\Cooperative::factory()->create(['negeri' => 'Selangor']);

        $user = User::factory()->create(['cooperative_id' => $cooperative->id, 'negeri' => 'Selangor']);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create(['id_koperasi' => $cooperative->id, 'negeri' => 'Selangor']);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET', [
            'homestay' => (string) $homestay->id,
        ]);
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_user_cannot_access_homestay_in_different_koperasi(): void
    {
        // Create two cooperatives
        $cooperative1 = \App\Models\Cooperative::factory()->create(['negeri' => 'Selangor']);
        $cooperative2 = \App\Models\Cooperative::factory()->create(['negeri' => 'Johor']);

        $user = User::factory()->create(['cooperative_id' => $cooperative1->id, 'negeri' => 'Selangor']);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create(['id_koperasi' => $cooperative2->id, 'negeri' => 'Johor']);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET', [
            'homestay' => (string) $homestay->id,
        ]);
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(403, $response->getStatusCode());
    }

    public function test_middleware_handles_non_existent_homestay(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Admin');

        $request = $this->createRequestWithRoute('/api/homestays/999', 'GET', [
            'homestay' => '999',
        ]);
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(403, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertStringContainsString('homestay', strtolower($responseData['error']['message']));
    }

    public function test_middleware_handles_missing_homestay_parameter(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Admin');

        $request = Request::create('/api/homestays/create', 'GET');
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        // Should pass through if no homestay parameter
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_middleware_works_with_different_http_methods(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create([
            'negeri' => 'Selangor',
            'model_pengurusan' => 'individu',  // Ensure no koperasi association
        ]);

        $methods = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'];

        foreach ($methods as $method) {
            $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", $method, [
                'homestay' => (string) $homestay->id,
            ]);
            $request->setUserResolver(fn () => $user);

            $next = function ($request) {
                return new Response('Success');
            };

            $response = $this->middleware->handle($request, $next);

            $this->assertEquals(200, $response->getStatusCode(), "Method {$method} should be allowed");
        }
    }

    public function test_middleware_handles_unauthenticated_requests(): void
    {
        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET', [
            'homestay' => (string) $homestay->id,
        ]);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        // Unauthenticated requests pass through - other middleware handles auth
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_global_admin_without_scope_can_access_any_homestay(): void
    {
        // Admin without specific negeri or koperasi scope
        $user = User::factory()->create(['negeri' => null, 'cooperative_id' => null]);
        $user->assignRole('Admin');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET', [
            'homestay' => (string) $homestay->id,
        ]);
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_middleware_works_with_route_model_binding(): void
    {
        $user = User::factory()->create(['negeri' => 'Selangor']);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create([
            'negeri' => 'Selangor',
            'model_pengurusan' => 'individu',  // Ensure no koperasi association
        ]);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET', [
            'homestay' => $homestay,  // Pass the model itself
        ]);
        $request->setUserResolver(fn () => $user);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
    }
}
