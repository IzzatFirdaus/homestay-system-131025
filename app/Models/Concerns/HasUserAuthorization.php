<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use App\Models\Homestay;
use Illuminate\Database\Eloquent\Builder;

/**
 * User Authorization Methods Trait
 *
 * Handles all user authorization and permission checking logic
 * to reduce complexity in the main User model.
 */
/** @phpstan-ignore-next-line */
trait HasUserAuthorization
{
    /**
     * Check if user can access data from a specific negeri.
     */
    public function canAccessNegeri(string $negeri): bool
    {
        // Super Admin and Admin can access all negeri
        if ($this->hasAnyRole(['Super Admin', 'Admin'])) {
            return true;
        }

        // Users with negeri scope can only access their assigned negeri
        return $this->negeri === null || $this->negeri === $negeri;
    }

    /**
     * Check if user can access data from a specific cooperative.
     */
    public function canAccessCooperative(int $cooperativeId): bool
    {
        // Super Admin and Admin can access all cooperatives
        if ($this->hasAnyRole(['Super Admin', 'Admin'])) {
            return true;
        }

        // Users with cooperative scope can only access their assigned cooperative
        return $this->cooperative_id === null || $this->cooperative_id === $cooperativeId;
    }

    /**
     * Check if user can perform data imports.
     */
    public function canImport(): bool
    {
        return $this->hasAnyRole(['Admin', 'Super Admin', 'Penganalisis']);
    }

    /**
     * Check if user can export data.
     */
    public function canExport(): bool
    {
        return $this->hasAnyRole(['Admin', 'Super Admin', 'Penganalisis', 'Pemerhati']);
    }

    /**
     * Check if user can manage system settings.
     */
    public function canManageSettings(): bool
    {
        return $this->hasRole('Super Admin');
    }

    /**
     * Check if user can manage users.
     */
    public function canManageUsers(): bool
    {
        return $this->hasAnyRole(['Super Admin', 'Admin']);
    }

    /**
     * Get the homestays this user can access based on their scope.
     *
     * @return Builder<\App\Models\Homestay>
     */
    public function getAccessibleHomestays(): Builder
    {
        $query = Homestay::query();

        // Apply negeri scope if user has one
        if ($this->negeri && ! $this->hasAnyRole(['Super Admin', 'Admin'])) {
            $query->where('negeri', $this->negeri);
        }

        // Apply cooperative scope if user has one
        if ($this->cooperative_id && ! $this->hasAnyRole(['Super Admin', 'Admin'])) {
            $query->where('id_koperasi', $this->cooperative_id);
        }

        return $query;
    }
}
