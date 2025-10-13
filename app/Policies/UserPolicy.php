<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

/**
 * UserPolicy
 *
 * Defines authorization rules for User model operations based on
 * role-based access control (RBAC) and hierarchical permissions.
 *
 * User management follows strict hierarchical rules to prevent
 * privilege escalation and maintain system security.
 */
class UserPolicy
{
    /**
     * Determine whether the user can view any user models.
     *
     * Admin roles can view users, others can only view themselves.
     */
    public function viewAny(User $user): Response
    {
        // Super Admin and Admin can view all users
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have permission to view user listings.');
    }

    /**
     * Determine whether the user can view the user model.
     *
     * Users can view their own profile, admins can view others within scope.
     */
    public function view(User $user, User $model): Response
    {
        // Users can always view themselves
        if ($user->id === $model->id) {
            return Response::allow();
        }

        // Super Admin can view any user
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        // Admin can view users within their scope
        if ($user->hasRole('Admin')) {
            // Admin can view users in their negeri or koperasi
            if ($user->negeri && $model->negeri === $user->negeri) {
                return Response::allow();
            }

            if ($user->cooperative_id && $model->cooperative_id === $user->cooperative_id) {
                return Response::allow();
            }

            // Admin without scope can view all users
            if (! $user->negeri && ! $user->cooperative_id) {
                return Response::allow();
            }
        }

        return Response::denyWithStatus(403, 'You do not have permission to view this user profile.');
    }

    /**
     * Determine whether the user can create user models.
     *
     * Only Admin and Super Admin can create new users.
     */
    public function create(User $user): Response
    {
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can create new users.');
    }

    /**
     * Determine whether the user can update the user model.
     *
     * Users can update themselves, admins can update others with restrictions.
     */
    public function update(User $user, User $model): Response
    {
        // Users can update their own profile (excluding role/scope changes)
        if ($user->id === $model->id) {
            return Response::allow();
        }

        // Super Admin can update any user
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        // Admin can update users within their scope
        if ($user->hasRole('Admin')) {
            // Cannot update Super Admin users
            if ($model->hasRole('Super Admin')) {
                return Response::denyWithStatus(403, 'Cannot modify Super Admin users.');
            }

            // Admin can update users in their negeri or koperasi
            if ($user->negeri && $model->negeri === $user->negeri) {
                return Response::allow();
            }

            if ($user->cooperative_id && $model->cooperative_id === $user->cooperative_id) {
                return Response::allow();
            }

            // Admin without scope can update non-admin users
            if (! $user->negeri && ! $user->cooperative_id && ! $model->hasRole('Admin')) {
                return Response::allow();
            }
        }

        return Response::denyWithStatus(403, 'You do not have permission to update this user.');
    }

    /**
     * Determine whether the user can delete the user model.
     *
     * Only Super Admin and Admin can delete users with restrictions.
     */
    public function delete(User $user, User $model): Response
    {
        // Cannot delete yourself
        if ($user->id === $model->id) {
            return Response::denyWithStatus(403, 'You cannot delete your own account.');
        }

        // Super Admin can delete any user except other Super Admins
        if ($user->hasRole('Super Admin')) {
            if ($model->hasRole('Super Admin')) {
                return Response::denyWithStatus(403, 'Cannot delete other Super Admin users.');
            }

            return Response::allow();
        }

        // Admin can delete users within their scope
        if ($user->hasRole('Admin')) {
            // Cannot delete Super Admin or other Admin users
            if ($model->hasAnyRole(['Super Admin', 'Admin'])) {
                return Response::denyWithStatus(403, 'Cannot delete administrator users.');
            }

            // Admin can delete users in their negeri or koperasi
            if ($user->negeri && $model->negeri === $user->negeri) {
                return Response::allow();
            }

            if ($user->cooperative_id && $model->cooperative_id === $user->cooperative_id) {
                return Response::allow();
            }

            // Admin without scope can delete non-admin users
            if (! $user->negeri && ! $user->cooperative_id) {
                return Response::allow();
            }
        }

        return Response::denyWithStatus(403, 'You do not have permission to delete this user.');
    }

    /**
     * Determine whether the user can permanently delete the user model.
     *
     * Only Super Admin can force delete users.
     */
    public function forceDelete(User $user, User $model): Response
    {
        if ($user->hasRole('Super Admin') && $user->id !== $model->id) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only Super Admin can permanently delete users.');
    }

    /**
     * Determine whether the user can restore the user model.
     *
     * Super Admin and Admin can restore users.
     */
    public function restore(User $user, User $model): Response
    {
        if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only administrators can restore users.');
    }

    /**
     * Determine whether the user can assign roles.
     *
     * Role assignment follows strict hierarchical rules.
     */
    public function assignRole(User $user, User $model): Response
    {
        // Cannot assign roles to yourself
        if ($user->id === $model->id) {
            return Response::denyWithStatus(403, 'You cannot modify your own roles.');
        }

        // Super Admin can assign any role except Super Admin to others
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        // Admin can assign limited roles within their scope
        if ($user->hasRole('Admin')) {
            // Cannot modify Super Admin or other Admin users
            if ($model->hasAnyRole(['Super Admin', 'Admin'])) {
                return Response::denyWithStatus(403, 'Cannot modify administrator roles.');
            }

            // Admin can assign roles within their scope
            if ($user->negeri && $model->negeri === $user->negeri) {
                return Response::allow();
            }

            if ($user->cooperative_id && $model->cooperative_id === $user->cooperative_id) {
                return Response::allow();
            }

            // Admin without scope can assign limited roles
            if (! $user->negeri && ! $user->cooperative_id) {
                return Response::allow();
            }
        }

        return Response::denyWithStatus(403, 'You do not have permission to assign roles to this user.');
    }

    /**
     * Determine whether the user can change user's scope (negeri/koperasi).
     *
     * Only Super Admin can change user scopes.
     */
    public function changeScope(User $user, User $model): Response
    {
        // Only Super Admin can change scopes
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'Only Super Admin can modify user scopes.');
    }

    /**
     * Determine whether the user can reset password for another user.
     *
     * Admins can reset passwords within their scope.
     */
    public function resetPassword(User $user, User $model): Response
    {
        // Super Admin can reset any password
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        // Admin can reset passwords within their scope
        if ($user->hasRole('Admin')) {
            // Cannot reset Super Admin passwords
            if ($model->hasRole('Super Admin')) {
                return Response::denyWithStatus(403, 'Cannot reset Super Admin passwords.');
            }

            // Admin can reset passwords in their scope
            if ($user->negeri && $model->negeri === $user->negeri) {
                return Response::allow();
            }

            if ($user->cooperative_id && $model->cooperative_id === $user->cooperative_id) {
                return Response::allow();
            }

            // Admin without scope can reset non-admin passwords
            if (! $user->negeri && ! $user->cooperative_id && ! $model->hasRole('Admin')) {
                return Response::allow();
            }
        }

        return Response::denyWithStatus(403, 'You do not have permission to reset this user\'s password.');
    }

    /**
     * Determine whether the user can activate/deactivate another user.
     *
     * Admins can activate/deactivate users within their scope.
     */
    public function changeStatus(User $user, User $model): Response
    {
        // Cannot change your own status
        if ($user->id === $model->id) {
            return Response::denyWithStatus(403, 'You cannot change your own status.');
        }

        // Super Admin can change any user status
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        // Admin can change status within their scope
        if ($user->hasRole('Admin')) {
            // Cannot change Super Admin status
            if ($model->hasRole('Super Admin')) {
                return Response::denyWithStatus(403, 'Cannot change Super Admin status.');
            }

            // Admin can change status in their scope
            if ($user->negeri && $model->negeri === $user->negeri) {
                return Response::allow();
            }

            if ($user->cooperative_id && $model->cooperative_id === $user->cooperative_id) {
                return Response::allow();
            }

            // Admin without scope can change non-admin status
            if (! $user->negeri && ! $user->cooperative_id && ! $model->hasRole('Admin')) {
                return Response::allow();
            }
        }

        return Response::denyWithStatus(403, 'You do not have permission to change this user\'s status.');
    }

    /**
     * Determine whether the user can view audit logs for another user.
     *
     * Admins can view audit logs within their scope.
     */
    public function viewAuditLogs(User $user, User $model): Response
    {
        // Users can view their own audit logs
        if ($user->id === $model->id) {
            return Response::allow();
        }

        // Super Admin can view any audit logs
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        // Admin can view audit logs within their scope
        if ($user->hasRole('Admin')) {
            if ($user->negeri && $model->negeri === $user->negeri) {
                return Response::allow();
            }

            if ($user->cooperative_id && $model->cooperative_id === $user->cooperative_id) {
                return Response::allow();
            }

            // Admin without scope can view non-admin audit logs
            if (! $user->negeri && ! $user->cooperative_id) {
                return Response::allow();
            }
        }

        return Response::denyWithStatus(403, 'You do not have permission to view this user\'s audit logs.');
    }
}
