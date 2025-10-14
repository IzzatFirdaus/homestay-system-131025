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
use Illuminate\Routing\Router;
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
     * Create a request with a mock route for testing
     */
    private function createRequestWithRoute(string $uri, string $method = 'GET'): Request
    {
        $request = Request::create($uri, $method);

        // Create and bind a mock route
        $route = new Route([$method], $uri, ['uses' => function () {
            return 'test';
        }]);

        // Bind route to router
        $router = app(Router::class);
        $route->bind($request);

        $request->setRouteResolver(function () use ($route) {
            return $route;
        });

        return $request;
    }

    public function test_super_admin_can_access_any_homestay(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Super Admin');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET');
        $request->setUserResolver(fn () => $user);
        $request->route()->setParameter('homestay', (string) $homestay->id);

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

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET');
        $request->setUserResolver(fn () => $user);
        $request->route()->setParameter('homestay', (string) $homestay->id);

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

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET');
        $request->setUserResolver(fn () => $user);
        $request->route()->setParameter('homestay', (string) $homestay->id);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(403, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertStringContainsString('access this homestay', $responseData['error']['message']);
    }

    public function test_user_can_access_homestay_in_same_koperasi(): void
    {
        $user = User::factory()->create(['cooperative_id' => 1]);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create(['id_koperasi' => 1]);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET');
        $request->setUserResolver(fn () => $user);
        $request->route()->setParameter('homestay', (string) $homestay->id);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_user_cannot_access_homestay_in_different_koperasi(): void
    {
        $user = User::factory()->create(['cooperative_id' => 1]);
        $user->assignRole('Penganalisis');

        $homestay = Homestay::factory()->create(['id_koperasi' => 2]);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET');
        $request->setUserResolver(fn () => $user);
        $request->route()->setParameter('homestay', (string) $homestay->id);

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

        $request = $this->createRequestWithRoute('/api/homestays/999', 'GET');
        $request->setUserResolver(fn () => $user);
        $request->route()->setParameter('homestay', '999');

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(404, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertStringContainsString('Homestay not found', $responseData['error']['message']);
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

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $methods = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'];

        foreach ($methods as $method) {
            $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", $method);
            $request->setUserResolver(fn () => $user);
            $request->route()->setParameter('homestay', (string) $homestay->id);

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

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET');
        $request->route()->setParameter('homestay', (string) $homestay->id);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(401, $response->getStatusCode());
        $responseData = json_decode($response->getContent(), true);
        $this->assertStringContainsString('Authentication required', $responseData['error']['message']);
    }

    public function test_global_admin_without_scope_can_access_any_homestay(): void
    {
        // Admin without specific negeri or koperasi scope
        $user = User::factory()->create(['negeri' => null, 'cooperative_id' => null]);
        $user->assignRole('Admin');

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET');
        $request->setUserResolver(fn () => $user);
        $request->route()->setParameter('homestay', (string) $homestay->id);

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

        $homestay = Homestay::factory()->create(['negeri' => 'Selangor']);

        $request = $this->createRequestWithRoute("/api/homestays/{$homestay->id}", 'GET');
        $request->setUserResolver(fn () => $user);

        // Simulate route model binding
        $request->route()->setParameter('homestay', $homestay);

        $next = function ($request) {
            return new Response('Success');
        };

        $response = $this->middleware->handle($request, $next);

        $this->assertEquals(200, $response->getStatusCode());
    }
}
