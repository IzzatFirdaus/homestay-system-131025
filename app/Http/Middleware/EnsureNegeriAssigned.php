<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * EnsureNegeriAssigned Middleware
 *
 * Ensures that users have proper negeri or koperasi assignment
 * before accessing restricted modules that require scope-based access.
 *
 * This middleware is applied to routes that require users to have
 * a specific scope assignment to access data.
 */
class EnsureNegeriAssigned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Allow unauthenticated requests (other middleware will handle)
        if (! $user) {
            return $next($request);
        }

        // Super Admin and Admin don't need scope assignment
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return $next($request);
        }

        // Check if user needs scope assignment for this route
        if ($this->requiresScopeAssignment($request) && ! $this->hasScopeAssigned($user)) {
            $errorResponse = [
                'error' => [
                    'message' => 'Access denied. You must be assigned to a negeri or koperasi to access this resource.',
                    'code' => 'SCOPE_ASSIGNMENT_REQUIRED',
                    'details' => [
                        'required_scope' => $this->getRequiredScope($request),
                        'user_scope' => [
                            'negeri' => $user->negeri,
                            'koperasi_id' => $user->cooperative_id,
                        ],
                        'contact_admin' => 'Please contact your administrator to assign you to a negeri or koperasi.',
                    ],
                ],
            ];

            // Return appropriate response based on request type
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json($errorResponse, 403);
            }

            // For web requests, redirect to a scope assignment page or show error
            return redirect()->route('profile.scope-required')
                ->with('error', $errorResponse['error']['message']);
        }

        return $next($request);
    }

    /**
     * Check if the route requires scope assignment.
     */
    private function requiresScopeAssignment(Request $request): bool
    {
        $path = $request->path();
        $routeName = $request->route()?->getName();

        // Routes that require scope assignment
        $scopedRoutes = [
            // Dashboard routes
            'dashboard',
            'dashboard/*',

            // Homestay management
            'homestays',
            'homestays/*',

            // Performance data
            'performances',
            'performances/*',

            // Import operations
            'imports/homestays',
            'imports/performances',

            // Reports
            'reports/negeri',
            'reports/koperasi',

            // API endpoints
            'api/homestays',
            'api/performances',
            'api/dashboard',
        ];

        foreach ($scopedRoutes as $scopedRoute) {
            if (str_contains($path, $scopedRoute) ||
                ($routeName && str_contains($routeName, str_replace('/*', '', $scopedRoute)))) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if user has proper scope assignment.
     */
    private function hasScopeAssigned(\App\Models\User $user): bool
    {
        return $user->negeri !== null || $user->cooperative_id !== null;
    }

    /**
     * Get the required scope type for the current route.
     */
    private function getRequiredScope(Request $request): string
    {
        $path = $request->path();

        // Determine what type of scope is required
        if (str_contains($path, 'koperasi') || str_contains($path, 'cooperative')) {
            return 'koperasi';
        }

        if (str_contains($path, 'negeri') || str_contains($path, 'state')) {
            return 'negeri';
        }

        // Default to either negeri or koperasi
        return 'negeri_or_koperasi';
    }
}
