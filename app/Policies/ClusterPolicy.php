<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Cluster;
use App\Models\User;
use Illuminate\Auth\Access\Response;

/**
 * ClusterPolicy
 *
 * Defines authorization rules for Cluster model operations based on
 * role-based access control (RBAC) and scope-based access (negeri).
 */
class ClusterPolicy
{
    /**
     * Determine whether the user can view any cluster models.
     */
    public function viewAny(User $user): Response
    {
        // All authenticated users can view clusters within their scope
        return Response::allow();
    }

    /**
     * Determine whether the user can view the cluster model.
     */
    public function view(User $user, Cluster $cluster): Response
    {
        // Super Admin and Admin can view any cluster
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Check negeri access
        if ($cluster->negeri && ! $user->canAccessNegeri($cluster->negeri)) {
            return Response::denyWithStatus(403, 'You do not have access to clusters in this negeri.');
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can create cluster models.
     */
    public function create(User $user): Response
    {
        // Super Admin, Admin, and Penganalisis can create clusters
        if ($user->hasAnyRole(['Super Admin', 'Admin', 'Penganalisis'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have permission to create clusters.');
    }

    /**
     * Determine whether the user can update the cluster model.
     */
    public function update(User $user, Cluster $cluster): Response
    {
        // Super Admin and Admin can update any cluster
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Penganalisis can update clusters within their scope
        if ($user->hasRole('Penganalisis')) {
            if ($cluster->negeri && ! $user->canAccessNegeri($cluster->negeri)) {
                return Response::denyWithStatus(403, 'You do not have access to clusters in this negeri.');
            }

            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have permission to update this cluster.');
    }

    /**
     * Determine whether the user can delete the cluster model.
     */
    public function delete(User $user, Cluster $cluster): Response
    {
        // Only Super Admin and Admin can delete clusters
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can delete clusters.');
    }

    /**
     * Determine whether the user can restore the cluster model.
     */
    public function restore(User $user, Cluster $cluster): Response
    {
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can restore clusters.');
    }

    /**
     * Determine whether the user can permanently delete the cluster model.
     */
    public function forceDelete(User $user, Cluster $cluster): Response
    {
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only Super Admin can permanently delete clusters.');
    }
}
