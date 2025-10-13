<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Cooperative;
use App\Models\User;
use Illuminate\Auth\Access\Response;

/**
 * CooperativePolicy
 *
 * Defines authorization rules for Cooperative model operations based on
 * role-based access control (RBAC) and scope-based access (negeri).
 */
class CooperativePolicy
{
    /**
     * Determine whether the user can view any cooperative models.
     */
    public function viewAny(User $user): Response
    {
        // All authenticated users can view cooperatives within their scope
        return Response::allow();
    }

    /**
     * Determine whether the user can view the cooperative model.
     */
    public function view(User $user, Cooperative $cooperative): Response
    {
        // Super Admin and Admin can view any cooperative
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Check negeri access
        if ($cooperative->negeri && ! $user->canAccessNegeri($cooperative->negeri)) {
            return Response::denyWithStatus(403, 'You do not have access to cooperatives in this negeri.');
        }

        // Check if user belongs to this cooperative
        if ($user->cooperative_id === $cooperative->id) {
            return Response::allow();
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can create cooperative models.
     */
    public function create(User $user): Response
    {
        // Only Super Admin and Admin can create cooperatives
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can create cooperatives.');
    }

    /**
     * Determine whether the user can update the cooperative model.
     */
    public function update(User $user, Cooperative $cooperative): Response
    {
        // Super Admin and Admin can update any cooperative
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can update cooperatives.');
    }

    /**
     * Determine whether the user can delete the cooperative model.
     */
    public function delete(User $user, Cooperative $cooperative): Response
    {
        // Only Super Admin can delete cooperatives
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only Super Admin can delete cooperatives.');
    }

    /**
     * Determine whether the user can restore the cooperative model.
     */
    public function restore(User $user, Cooperative $cooperative): Response
    {
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can restore cooperatives.');
    }

    /**
     * Determine whether the user can permanently delete the cooperative model.
     */
    public function forceDelete(User $user, Cooperative $cooperative): Response
    {
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only Super Admin can permanently delete cooperatives.');
    }
}
