<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = $request->user() ?? Auth::user();

        // Unauthenticated requests should be rejected with 401
        if (! $user) {
            return response()->json([
                'error' => [
                    'message' => 'Authentication required to access homestay data.',
                    'code' => 'AUTH_REQUIRED',
                ],
            ], 401);
        }

        // Super Admin has unrestricted access
        if ($user->hasRole('Super Admin')) {
            return $next($request);
        }

        // Admin without scope has unrestricted access, but Admin with scope is restricted
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
        if ($homestayId) {
            $homestay = \App\Models\Homestay::find($homestayId);
            if (! $homestay) {
                return response()->json([
                    'error' => [
                        'message' => 'Homestay not found.',
                        'code' => 'HOMESTAY_NOT_FOUND',
                    ],
                ], 404);
            }

            if (! $this->canAccessHomestay($user, $homestayId)) {
                return response()->json([
                    'error' => [
                        'message' => 'You do not have permission to access this homestay.',
                        'code' => 'HOMESTAY_SCOPE_DENIED',
                    ],
                ], 403);
            }
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
        // Super Admin and Admin without scope don't need scope assignment
        if ($user->hasRole('Super Admin') ||
            ($user->hasRole('Admin') && $user->negeri === null && $user->cooperative_id === null)) {
            return true;
        }

        // Other users need negeri or koperasi assignment
        return $user->negeri !== null || $user->cooperative_id !== null;
    }

    /**
     * Extract homestay ID from request route parameters.
     */
    private function extractHomestayId(Request $request): ?int
    {
        $route = $request->route();

        if ($route) {
            // Check various parameter names that might contain homestay ID
            $possibleParams = ['homestay', 'homestay_id', 'id'];

            foreach ($possibleParams as $param) {
                $value = $route->parameter($param);
                // Handle route model binding objects
                if ($value instanceof \App\Models\Homestay) {
                    return (int) $value->id;
                }
                if ($value && is_numeric($value)) {
                    if (str_contains($request->path(), 'homestay')) {
                        return (int) $value;
                    }
                }
            }
        }

        // Fallback: parse ID from URL path when route is not available (e.g., in tests)
        if (preg_match('/\/homestays\/(\d+)/', $request->path(), $matches)) {
            return (int) $matches[1];
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
                // Handle missing homestay - return false to trigger 404 in handle method
                return false;
            }

            // Prefer cooperative scope if available
            if ($homestay->id_koperasi !== null) {
                return $user->canAccessCooperative($homestay->id_koperasi);
            }
            // Otherwise fallback to negeri
            if ($homestay->negeri && ! $user->canAccessNegeri($homestay->negeri)) {
                return false;
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
