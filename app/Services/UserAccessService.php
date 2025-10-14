<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Cooperative;
use App\Models\Homestay;
use App\Models\User;
use Illuminate\Support\Collection;

/**
 * Centralises RBAC-aware resource visibility queries.
 */
final class UserAccessService
{
    public function __construct() {}

    /**
     * Retrieve homestays that a user is permitted to view.
     *
     * @return Collection<int, Homestay>
     */
    public function getAccessibleHomestays(User $user): Collection
    {
        $query = $user->getAccessibleHomestays();

        return $query->orderBy('nama')->get();
    }

    /**
     * Retrieve cooperatives that a user is permitted to view.
     *
     * @return Collection<int, Cooperative>
     */
    public function getAccessibleCooperatives(User $user): Collection
    {
        $query = $user->getAccessibleCooperatives();

        return $query->orderBy('nama')->get();
    }
}
