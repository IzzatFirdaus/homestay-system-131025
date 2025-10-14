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
        return $user->hasAnyRole(['Super Admin', 'Admin'])
            ? Response::allow()
            : Response::denyWithStatus(403, 'You do not have permission to view user listings.');
    }

    /**
     * Determine whether the user can view the user model.
     *
     * Users can view their own profile, admins can view others within scope.
     */
    public function view(User $user, User $model): Response
    {
        if ($this->isSameUser($user, $model)) {
            return Response::allow();
        }

        if ($user->hasRole('Super Admin') || $this->adminCanAccess($user, $model, false)) {
            return Response::allow();
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
        return $user->hasAnyRole(['Super Admin', 'Admin'])
            ? Response::allow()
            : Response::denyWithStatus(403, 'Only administrators can create new users.');
    }

    /**
     * Determine whether the user can update the user model.
     *
     * Users can update themselves, admins can update others with restrictions.
     */
    public function update(User $user, User $model): Response
    {
        if ($this->isSameUser($user, $model)) {
            return Response::allow();
        }

        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        if ($this->adminCanAccess($user, $model)) {
            return Response::allow();
        }

        if ($model->hasRole('Super Admin')) {
            return Response::denyWithStatus(403, 'Cannot modify Super Admin users.');
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
        if ($this->isSameUser($user, $model)) {
            return Response::denyWithStatus(403, 'You cannot delete your own account.');
        }

        if ($user->hasRole('Super Admin')) {
            return $model->hasRole('Super Admin')
                ? Response::denyWithStatus(403, 'Cannot delete other Super Admin users.')
                : Response::allow();
        }

        if ($this->adminCanAccess($user, $model)) {
            return Response::allow();
        }

        if ($model->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::denyWithStatus(403, 'Cannot delete administrator users.');
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
        return $user->hasRole('Super Admin') && ! $this->isSameUser($user, $model)
            ? Response::allow()
            : Response::denyWithStatus(403, 'Only Super Admin can permanently delete users.');
    }

    /**
     * Determine whether the user can restore the user model.
     *
     * Super Admin and Admin can restore users.
     */
    public function restore(User $user, User $model): Response
    {
        return $user->hasAnyRole(['Super Admin', 'Admin'])
            ? Response::allow()
            : Response::denyWithStatus(403, 'Only administrators can restore users.');
    }

    /**
     * Determine whether the user can assign roles.
     *
     * Role assignment follows strict hierarchical rules.
     */
    public function assignRole(User $user, User $model): Response
    {
        if ($this->isSameUser($user, $model)) {
            return Response::denyWithStatus(403, 'You cannot modify your own roles.');
        }

        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        if ($this->adminCanAccess($user, $model)) {
            return Response::allow();
        }

        if ($model->hasAnyRole(['Super Admin', 'Admin'])) {
            return Response::denyWithStatus(403, 'Cannot modify administrator roles.');
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
        return $user->hasRole('Super Admin')
            ? Response::allow()
            : Response::denyWithStatus(403, 'Only Super Admin can modify user scopes.');
    }

    /**
     * Determine whether the user can reset password for another user.
     *
     * Admins can reset passwords within their scope.
     */
    public function resetPassword(User $user, User $model): Response
    {
        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        if ($this->adminCanAccess($user, $model)) {
            return Response::allow();
        }

        if ($model->hasRole('Super Admin')) {
            return Response::denyWithStatus(403, 'Cannot reset Super Admin passwords.');
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
        if ($this->isSameUser($user, $model)) {
            return Response::denyWithStatus(403, 'You cannot change your own status.');
        }

        if ($user->hasRole('Super Admin')) {
            return Response::allow();
        }

        if ($this->adminCanAccess($user, $model)) {
            return Response::allow();
        }

        if ($model->hasRole('Super Admin')) {
            return Response::denyWithStatus(403, 'Cannot change Super Admin status.');
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
        if ($this->isSameUser($user, $model)) {
            return Response::allow();
        }

        if ($user->hasRole('Super Admin') || $this->adminCanAccess($user, $model, false)) {
            return Response::allow();
        }

        return Response::denyWithStatus(403, 'You do not have permission to view this user\'s audit logs.');
    }

    private function isSameUser(User $actor, User $target): bool
    {
        return $actor->id === $target->id;
    }

    private function adminCanAccess(User $actor, User $target, bool $restrictAdminTargets = true): bool
    {
        if (! $actor->hasRole('Admin')) {
            return false;
        }

        if ($target->hasRole('Super Admin')) {
            return false;
        }

        if ($restrictAdminTargets && $target->hasRole('Admin')) {
            return false;
        }

        if ($this->sharesScope($actor, $target)) {
            return true;
        }

        if (! $this->isUnscoped($actor)) {
            return false;
        }

        return $restrictAdminTargets ? ! $target->hasRole('Admin') : true;
    }

    private function sharesScope(User $actor, User $target): bool
    {
        $sameState = $actor->negeri !== null && $actor->negeri !== '' && $actor->negeri === $target->negeri;
        $sameCooperative = $actor->cooperative_id !== null && $actor->cooperative_id === $target->cooperative_id;

        return $sameState || $sameCooperative;
    }

    private function isUnscoped(User $actor): bool
    {
        return ($actor->negeri === null || $actor->negeri === '') && $actor->cooperative_id === null;
    }
}
