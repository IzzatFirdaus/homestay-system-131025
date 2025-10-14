<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Performance;
use App\Models\User;
use Illuminate\Auth\Access\Response;

/**
 * PerformancePolicy
 *
 * Defines authorization rules for Performance model operations based on
 * role-based access control (RBAC) and scope-based access (negeri/koperasi).
 *
 * Performance data is sensitive and requires appropriate access controls
 * based on the user's role and assigned scope.
 */
class PerformancePolicy
{
    /**
     * Determine whether the user can view any performance models.
     *
     * All authenticated users can view performance data within their scope.
     */
    public function viewAny(User $user): Response
    {
        // All authenticated users can view performance data (with scope filtering)
        return Response::allow();
    }

    /**
     * Determine whether the user can view the performance model.
     *
     * Users can view performance data if they have access to the associated homestay
     * through either negeri OR koperasi scope.
     */
    public function view(User $user, Performance $performance): Response
    {
        // Super Admin and Admin can view any performance data
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Load the homestay relationship to check access
        $homestay = $performance->homestay;

        if (! $homestay) {
            return Response::denyWithStatus(404, 'Associated homestay not found.');
        }

        // Check if user has access through negeri
        if ($homestay->negeri && $user->canAccessNegeri($homestay->negeri)) {
            return Response::allow();
        }

        // Check if user has access through koperasi
        if ($homestay->id_koperasi && $user->canAccessCooperative($homestay->id_koperasi)) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have access to performance data for this homestay.');
    }

    /**
     * Determine whether the user can create performance models.
     *
     * Admin, Penganalisis, and scoped admins can create performance records.
     * Pemerhati has read-only access.
     */
    public function create(User $user): Response
    {
        // Pemerhati has read-only access - check this first
        if ($user->hasRole('Pemerhati')) {
            return Response::denyWithStatus(403, 'Pemerhati role has read-only access.');
        }

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

        return Response::denyWithStatus(403, 'You do not have permission to create performance records.');
    }

    /**
     * Determine whether the user can update the performance model.
     *
     * Users can update performance data if they have write access and
     * the associated homestay is within their scope (negeri OR koperasi).
     */
    public function update(User $user, Performance $performance): Response
    {
        // Super Admin and Admin can update any performance data
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Check if user has write permissions (not Pemerhati)
        if ($user->hasRole('Pemerhati')) {
            return Response::denyWithStatus(403, 'Pemerhati role has read-only access.');
        }

        // Load the homestay relationship to check access
        $homestay = $performance->homestay;

        if (! $homestay) {
            return Response::denyWithStatus(404, 'Associated homestay not found.');
        }

        // Check if user has access through negeri
        if ($homestay->negeri && $user->canAccessNegeri($homestay->negeri)) {
            return Response::allow();
        }

        // Check if user has access through koperasi
        if ($homestay->id_koperasi && $user->canAccessCooperative($homestay->id_koperasi)) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have access to performance data for this homestay.');
    }

    /**
     * Determine whether the user can delete the performance model.
     *
     * Only Super Admin and Admin can delete performance records.
     */
    public function delete(User $user, Performance $performance): Response
    {
        // Only Super Admin and Admin can delete performance data
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can delete performance records.');
    }

    /**
     * Determine whether the user can permanently delete the performance model.
     *
     * Only Super Admin can force delete performance records.
     */
    public function forceDelete(User $user, Performance $performance): Response
    {
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only Super Admin can permanently delete performance records.');
    }

    /**
     * Determine whether the user can restore the performance model.
     *
     * Super Admin and Admin can restore performance records.
     */
    public function restore(User $user, Performance $performance): Response
    {
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can restore performance records.');
    }

    /**
     * Determine whether the user can view aggregated performance reports.
     *
     * All users can view aggregated reports within their scope.
     */
    public function viewReports(User $user): Response
    {
        // All authenticated users can view reports within their scope
        return Response::allow();
    }

    /**
     * Determine whether the user can export performance data.
     *
     * All users can export performance data within their scope.
     */
    public function export(User $user): Response
    {
        // All authenticated users can export within their scope
        return Response::allow();
    }

    /**
     * Determine whether the user can import performance data.
     *
     * Admin, Penganalisis, and scoped admins can import performance data.
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

        return Response::denyWithStatus(403, 'You do not have permission to import performance data.');
    }

    /**
     * Determine whether the user can view detailed performance analytics.
     *
     * Penganalisis, Admin, and Super Admin can access detailed analytics.
     */
    public function viewAnalytics(User $user): Response
    {
        // Super Admin, Admin, and Penganalisis can access detailed analytics
        if ($user->hasAnyRole(['Super Admin', 'Admin', 'Penganalilis'])) {
            return Response::allow();
        }

        // Pemerhati has limited analytics access
        if ($user->hasRole('Pemerhati')) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have permission to access detailed analytics.');
    }

    /**
     * Determine whether the user can manage performance data for specific negeri.
     *
     * Helper method for negeri-scoped operations.
     */
    public function manageInNegeri(User $user, string $negeri): Response
    {
        if ($user->canAccessNegeri($negeri)) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, "You do not have access to performance data in {$negeri}.");
    }

    /**
     * Determine whether the user can manage performance data for specific koperasi.
     *
     * Helper method for koperasi-scoped operations.
     */
    public function manageInKoperasi(User $user, int $koperasiId): Response
    {
        if ($user->canAccessCooperative($koperasiId)) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have access to performance data for this koperasi.');
    }

    /**
     * Determine whether the user can create performance record for specific homestay.
     *
     * Helper method to check if user can create performance data for a specific homestay.
     */
    public function createForHomestay(User $user, int $homestayId): Response
    {
        // Super Admin and Admin can create for any homestay
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Check if user has write permissions (not Pemerhati)
        if ($user->hasRole('Pemerhati')) {
            return Response::denyWithStatus(403, 'Pemerhati role has read-only access.');
        }

        // Get homestay to check scope access
        $homestay = \App\Models\Homestay::find($homestayId);

        if (! $homestay) {
            return Response::denyWithStatus(404, 'Homestay not found.');
        }

        // Check negeri access
        if ($homestay->negeri && ! $user->canAccessNegeri($homestay->negeri)) {
            return Response::denyWithStatus(403, 'You do not have access to create performance data for this negeri.');
        }

        // Check koperasi access
        if ($homestay->id_koperasi && ! $user->canAccessCooperative($homestay->id_koperasi)) {
            return Response::denyWithStatus(403, 'You do not have access to create performance data for this koperasi.');
        }

        return Response::allow();
    }
}
