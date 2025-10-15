<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * CheckHomestayAccess Middleware
 *
 * Ensures users can only access homestay-related routes if they have
 * proper role permissions and scope access (negeri/koperasi).
 *
 * This middleware prevents unauthorized access to homestay data
 * based on the user's assigned scope and role permissions.
 */
class CheckHomestayAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Allow unauthenticated requests to pass through (other middleware will handle)
        if (! $user) {
            return $next($request);
        }

        // Super Admin has unrestricted access
        if ($user->hasRole('Super Admin')) {
            return $next($request);
        }

        // Admin without scope is also global (unrestricted)
        if ($user->hasRole('Admin') && $user->negeri === null && $user->cooperative_id === null) {
            return $next($request);
        }

        // Check if user has any homestay-related permissions
        if (! $this->hasHomestayPermissions($user)) {
            return response()->json([
                'error' => [
                    'message' => 'You do not have permission to access homestay data.',
                    'code' => 'HOMESTAY_ACCESS_DENIED',
                ],
            ], 403);
        }

        // For scoped users, ensure they have proper scope assignment
        if (! $this->hasScopeAssigned($user)) {
            return response()->json([
                'error' => [
                    'message' => 'You must be assigned to a negeri or koperasi to access homestay data.',
                    'code' => 'SCOPE_NOT_ASSIGNED',
                ],
            ], 403);
        }

        // Check specific homestay access if accessing individual homestay
        $homestayId = $this->extractHomestayId($request);
        if ($homestayId && ! $this->canAccessHomestay($user, $homestayId)) {
            return response()->json([
                'error' => [
                    'message' => 'You do not have access to this homestay.',
                    'code' => 'HOMESTAY_SCOPE_DENIED',
                ],
            ], 403);
        }

        return $next($request);
    }

    /**
     * Check if user has any homestay-related permissions.
     */
    private function hasHomestayPermissions(\App\Models\User $user): bool
    {
        // All roles except completely restricted ones can access homestays
        $allowedRoles = ['Super Admin', 'Admin', 'Penganalisis', 'Pemerhati'];

        return $user->hasAnyRole($allowedRoles);
    }

    /**
     * Check if user has proper scope assignment.
     */
    private function hasScopeAssigned(\App\Models\User $user): bool
    {
        // Only Super Admin doesn't need scope assignment
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        // All other users (including Admin) need negeri or koperasi assignment
        return $user->negeri !== null || $user->cooperative_id !== null;
    }

    /**
     * Extract homestay ID from request route parameters.
     */
    private function extractHomestayId(Request $request): ?int
    {
        $route = $request->route();

        if (! $route) {
            return null;
        }

        // Check various parameter names that might contain homestay ID
        $possibleParams = ['homestay', 'homestay_id', 'id'];

        foreach ($possibleParams as $param) {
            $value = $route->parameter($param);

            // Handle route model binding - if value is a Homestay model instance
            if ($value instanceof \App\Models\Homestay) {
                return $value->id;
            }

            if ($value && is_numeric($value)) {
                // Verify this is actually a homestay route
                if (str_contains($request->path(), 'homestay')) {
                    return (int) $value;
                }
            }
        }

        return null;
    }

    /**
     * Check if user can access a specific homestay.
     */
    private function canAccessHomestay(\App\Models\User $user, int $homestayId): bool
    {
        try {
            $homestay = \App\Models\Homestay::find($homestayId);

            if (! $homestay) {
                return false;
            }

            // Rule: Apply only the scopes the user actually has.
            // - If user has negeri scope, require homestay negeri to match.
            // - If user has cooperative scope, require homestay cooperative to match.
            // - If user has both, both must match. If user has neither (global Admin), handled earlier.

            if ($user->negeri !== null) {
                if (! $homestay->negeri || strcasecmp($homestay->negeri, $user->negeri) !== 0) {
                    return false;
                }
            }

            if ($user->cooperative_id !== null) {
                if (! $homestay->id_koperasi || (int) $homestay->id_koperasi !== (int) $user->cooperative_id) {
                    return false;
                }
            }

            return true;
        } catch (\Exception $e) {
            // Log error and deny access on database issues
            \Illuminate\Support\Facades\Log::error('Error checking homestay access', [
                'user_id' => $user->id,
                'homestay_id' => $homestayId,
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }
}
