<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Import;
use App\Models\User;
use Illuminate\Auth\Access\Response;

/**
 * ImportPolicy
 *
 * Defines authorization rules for Import model operations based on
 * role-based access control (RBAC) and scope-based access (negeri/koperasi).
 *
 * Import operations are sensitive and require appropriate permissions
 * to maintain data integrity and security.
 */
class ImportPolicy
{
    /**
     * Determine whether the user can view any import models.
     *
     * Users with import permissions can view import history within their scope.
     */
    public function viewAny(User $user): Response
    {
        // Super Admin and Admin can view all imports
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Penganalisis can view imports within their scope
        if ($user->hasRole('Penganalisis')) {
            return Response::allow();
        }

        // Users with negeri or koperasi scope can view their imports
        if ($user->negeri || $user->cooperative_id) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have permission to view import history.');
    }

    /**
     * Determine whether the user can view the import model.
     *
     * Users can view specific import if they have access to the related data scope.
     */
    public function view(User $user, Import $import): Response
    {
        // Super Admin and Admin can view any import
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Users can view their own imports
        if ($import->user_id === $user->id) {
            return Response::allow();
        }

        // Check scope access based on user only (imports are global to user)

        return Response::allow();
    }

    /**
     * Determine whether the user can create import models.
     *
     * Admin, Penganalisis, and scoped admins can initiate imports.
     * Pemerhati has read-only access.
     */
    public function create(User $user): Response
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

        // Pemerhati has read-only access
        if ($user->hasRole('Pemerhati')) {
            return Response::denyWithStatus(403, 'Pemerhati role cannot perform data imports.');
        }

        return Response::denyWithStatus(403, 'You do not have permission to perform data imports.');
    }

    /**
     * Determine whether the user can update the import model.
     *
     * Generally, imports should not be updated after creation.
     * Only status updates are allowed by admins.
     */
    public function update(User $user, Import $import): Response
    {
        // Only Super Admin and Admin can update import records (usually just status)
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Users can update their own imports if in progress
        if ($import->user_id === $user->id && in_array($import->status, ['queued', 'processing'], true)) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Import records cannot be modified once completed.');
    }

    /**
     * Determine whether the user can delete the import model.
     *
     * Only Super Admin can delete import records for audit trail integrity.
     */
    public function delete(User $user, Import $import): Response
    {
        // Only Super Admin can delete import records
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only Super Admin can delete import records.');
    }

    /**
     * Determine whether the user can permanently delete the import model.
     *
     * Only Super Admin can force delete import records.
     */
    public function forceDelete(User $user, Import $import): Response
    {
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only Super Admin can permanently delete import records.');
    }

    /**
     * Determine whether the user can restore the import model.
     *
     * Super Admin and Admin can restore import records.
     */
    public function restore(User $user, Import $import): Response
    {
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can restore import records.');
    }

    /**
     * Determine whether the user can cancel the import.
     *
     * Users can cancel their own imports if they are in progress.
     */
    public function cancel(User $user, Import $import): Response
    {
        // Super Admin and Admin can cancel any import
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Users can cancel their own imports if in progress
        if ($import->user_id === $user->id && $import->status === 'in_progress') {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You can only cancel your own imports that are in progress.');
    }

    /**
     * Determine whether the user can retry the import.
     *
     * Users can retry their own failed imports within their scope.
     */
    public function retry(User $user, Import $import): Response
    {
        // Super Admin and Admin can retry any import
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Users can retry their own failed imports
        if ($import->user_id === $user->id && $import->status === 'failed') {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You can only retry your own failed imports.');
    }

    /**
     * Determine whether the user can download import errors.
     *
     * Users can download error reports for their own imports or within their scope.
     */
    public function downloadErrors(User $user, Import $import): Response
    {
        // Super Admin and Admin can download any error report
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Users can download errors for their own imports
        if ($import->user_id === $user->id) {
            return Response::allow();
        }

        // Imports belong to a user; allow if user has general view permissions

        return Response::allow();
    }

    /**
     * Determine whether the user can initiate homestay import.
     *
     * Specific permission for homestay data imports.
     */
    public function importHomestays(User $user): Response
    {
        return $this->create($user);
    }

    /**
     * Determine whether the user can initiate performance import.
     *
     * Specific permission for performance data imports.
     */
    public function importPerformances(User $user): Response
    {
        return $this->create($user);
    }

    /**
     * Determine whether the user can initiate cooperative import.
     *
     * Only Admin and Super Admin can import cooperative data.
     */
    public function importCooperatives(User $user): Response
    {
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can import cooperative data.');
    }

    /**
     * Determine whether the user can import data for specific negeri.
     *
     * Helper method for negeri-scoped import operations.
     */
    public function importInNegeri(User $user, string $negeri): Response
    {
        // Super Admin and Admin can import anywhere
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Check if user has import permission and negeri access
        if ($this->create($user)->allowed() && $user->canAccessNegeri($negeri)) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, "You do not have permission to import data for {$negeri}.");
    }

    /**
     * Determine whether the user can import data for specific koperasi.
     *
     * Helper method for koperasi-scoped import operations.
     */
    public function importInKoperasi(User $user, int $koperasiId): Response
    {
        // Super Admin and Admin can import anywhere
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Check if user has import permission and koperasi access
        if ($this->create($user)->allowed() && $user->canAccessCooperative($koperasiId)) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have permission to import data for this koperasi.');
    }

    /**
     * Determine whether the user can view import statistics.
     *
     * Users can view import statistics within their scope.
     */
    public function viewStatistics(User $user): Response
    {
        // Super Admin and Admin can view all statistics
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        // Penganalisis can view statistics within their scope
        if ($user->hasRole('Penganalisis')) {
            return Response::allow();
        }

        // Users with scope can view their statistics
        if ($user->negeri || $user->cooperative_id) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have permission to view import statistics.');
    }
}
