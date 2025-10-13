<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Homestay;
use App\Models\User;
use Illuminate\Auth\Access\Response;

/**
 * HomestayPolicy
 *
 * Defines authorization rules for Homestay model operations based on
 * role-based access control (RBAC) and scope-based access (negeri/koperasi).
 *
 * Role Hierarchy (per D03):
 * - Super Admin: Full access to all homestays nationwide
 * - Admin: Full access to all homestays nationwide
 * - Penganalisis: Can view, create, update homestays within their scope
 * - Pemerhati: Read-only access to homestays within their scope
 * - Negeri Admin: CRUD access within assigned negeri
 * - Koperasi Admin: CRUD access within assigned koperasi
 */
class HomestayPolicy
{
    /**
     * Determine whether the user can view any homestay models.
     *
     * All authenticated users can view homestays within their scope.
     */
    public function viewAny(User $user): Response
    {
        // All authenticated users can view homestays (with scope filtering)
        return Response::allow();
    }

    /**
     * Determine whether the user can view the homestay model.
     *
     * Users can view homestays if they have access to the homestay's negeri/koperasi.
     */
    public function view(User $user, Homestay $homestay): Response
    {
        // Super Admin and Admin can view any homestay
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Check negeri access
        if ($homestay->negeri && ! $user->canAccessNegeri($homestay->negeri)) {
            return Response::denyWithStatus(403, 'You do not have access to homestays in this negeri.');
        }

        // Check koperasi access
        if ($homestay->id_koperasi && ! $user->canAccessCooperative($homestay->id_koperasi)) {
            return Response::denyWithStatus(403, 'You do not have access to homestays in this koperasi.');
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can create homestay models.
     *
     * Admin, Penganalisis, Negeri Admin, and Koperasi Admin can create homestays.
     * Pemerhati role has read-only access.
     */
    public function create(User $user): Response
    {
        // Super Admin and Admin can create anywhere
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Penganalisis can create within their scope
        if ($user->hasRole('Penganalisis')) {
            return Response::allow();
        }

        // Users with negeri or koperasi scope can create within their scope
        if ($user->negeri || $user->cooperative_id) {
            return Response::allow();
        }

        // Pemerhati has read-only access
        if ($user->hasRole('Pemerhati')) {
            return Response::denyWithStatus(403, 'Pemerhati role has read-only access.');
        }

        return Response::denyWithStatus(403, 'You do not have permission to create homestays.');
    }

    /**
     * Determine whether the user can update the homestay model.
     *
     * Users can update homestays if they have write access and the homestay
     * is within their scope.
     */
    public function update(User $user, Homestay $homestay): Response
    {
        // Super Admin and Admin can update any homestay
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Check if user has write permissions (not Pemerhati)
        if ($user->hasRole('Pemerhati')) {
            return Response::denyWithStatus(403, 'Pemerhati role has read-only access.');
        }

        // Check negeri access
        if ($homestay->negeri && ! $user->canAccessNegeri($homestay->negeri)) {
            return Response::denyWithStatus(403, 'You do not have access to homestays in this negeri.');
        }

        // Check koperasi access
        if ($homestay->id_koperasi && ! $user->canAccessCooperative($homestay->id_koperasi)) {
            return Response::denyWithStatus(403, 'You do not have access to homestays in this koperasi.');
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can delete the homestay model.
     *
     * Only Super Admin and Admin can delete homestays.
     * Other roles can only perform soft deletes (status change).
     */
    public function delete(User $user, Homestay $homestay): Response
    {
        // Only Super Admin and Admin can hard delete
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can delete homestays.');
    }

    /**
     * Determine whether the user can permanently delete the homestay model.
     *
     * Only Super Admin can force delete homestays.
     */
    public function forceDelete(User $user, Homestay $homestay): Response
    {
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only Super Admin can permanently delete homestays.');
    }

    /**
     * Determine whether the user can restore the homestay model.
     *
     * Super Admin and Admin can restore homestays.
     */
    public function restore(User $user, Homestay $homestay): Response
    {
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can restore homestays.');
    }

    /**
     * Determine whether the user can change homestay status.
     *
     * Users with write access can change status within their scope.
     */
    public function changeStatus(User $user, Homestay $homestay): Response
    {
        // Super Admin and Admin can change any homestay status
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Check if user has write permissions (not Pemerhati)
        if ($user->hasRole('Pemerhati')) {
            return Response::denyWithStatus(403, 'Pemerhati role has read-only access.');
        }

        // Check negeri access
        if ($homestay->negeri && ! $user->canAccessNegeri($homestay->negeri)) {
            return Response::denyWithStatus(403, 'You do not have access to homestays in this negeri.');
        }

        // Check koperasi access
        if ($homestay->id_koperasi && ! $user->canAccessCooperative($homestay->id_koperasi)) {
            return Response::denyWithStatus(403, 'You do not have access to homestays in this koperasi.');
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can view homestay performance data.
     *
     * All users with homestay access can view performance data.
     */
    public function viewPerformance(User $user, Homestay $homestay): Response
    {
        return $this->view($user, $homestay);
    }

    /**
     * Determine whether the user can export homestay data.
     *
     * All users except certain restricted roles can export within their scope.
     */
    public function export(User $user): Response
    {
        // All authenticated users can export within their scope
        return Response::allow();
    }

    /**
     * Determine whether the user can import homestay data.
     *
     * Admin, Penganalisis, and scoped admins can import data.
     */
    public function import(User $user): Response
    {
        // Super Admin and Admin can import anywhere
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Penganalisis can import within their scope
        if ($user->hasRole('Penganalisis')) {
            return Response::allow();
        }

        // Users with negeri or koperasi scope can import within their scope
        if ($user->negeri || $user->cooperative_id) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have permission to import homestay data.');
    }

    /**
     * Determine whether the user can manage homestay within specific negeri.
     *
     * Helper method for negeri-scoped operations.
     */
    public function manageInNegeri(User $user, string $negeri): Response
    {
        if ($user->canAccessNegeri($negeri)) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, "You do not have access to homestays in {$negeri}.");
    }

    /**
     * Determine whether the user can manage homestay within specific koperasi.
     *
     * Helper method for koperasi-scoped operations.
     */
    public function manageInKoperasi(User $user, int $koperasiId): Response
    {
        if ($user->canAccessCooperative($koperasiId)) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have access to homestays in this koperasi.');
    }
}
