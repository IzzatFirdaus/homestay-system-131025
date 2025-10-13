<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Cluster;
use App\Models\Cooperative;
use App\Models\Homestay;
use App\Models\Import;
use App\Models\Performance;
use App\Models\User;
use App\Policies\ClusterPolicy;
use App\Policies\CooperativePolicy;
use App\Policies\HomestayPolicy;
use App\Policies\ImportPolicy;
use App\Policies\PerformancePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

/**
 * AuthServiceProvider
 *
 * Registers authorization policies and gates for the Homestay Malaysia
 * Management & Analytics System. This provider maps models to their
 * corresponding policies for role-based access control (RBAC).
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * Maps Eloquent models to their corresponding authorization policies
     * for automatic policy resolution in controllers and middleware.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Homestay::class => HomestayPolicy::class,
        Performance::class => PerformancePolicy::class,
        Import::class => ImportPolicy::class,
        User::class => UserPolicy::class,
        Cooperative::class => CooperativePolicy::class,
        Cluster::class => ClusterPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Register custom gates for system-wide permissions
        $this->registerSystemGates();

        // Register gates for complex authorization logic
        $this->registerCustomGates();
    }

    /**
     * Register system-wide gates that don't map to specific models.
     */
    private function registerSystemGates(): void
    {
        // System administration gates
        Gate::define('manage-system', function (User $user) {
            return $user->hasRole('Super Admin');
        });

        Gate::define('manage-users', function (User $user) {
            return $user->hasAnyRole(['Super Admin', 'Admin']);
        });

        Gate::define('view-system-logs', function (User $user) {
            return $user->hasAnyRole(['Super Admin', 'Admin']);
        });

        Gate::define('manage-settings', function (User $user) {
            return $user->hasRole('Super Admin');
        });

        // Import and export gates
        Gate::define('import-data', function (User $user) {
            return $user->hasAnyRole(['Super Admin', 'Admin', 'Penganalisis']) ||
                   ($user->negeri || $user->cooperative_id);
        });

        Gate::define('export-data', function (User $user) {
            return $user->hasAnyRole(['Super Admin', 'Admin', 'Penganalisis', 'Pemerhati']);
        });

        // Reporting gates
        Gate::define('generate-reports', function (User $user) {
            return $user->hasAnyRole(['Super Admin', 'Admin', 'Penganalisis', 'Pemerhati']);
        });

        Gate::define('schedule-reports', function (User $user) {
            return $user->hasAnyRole(['Super Admin', 'Admin', 'Penganalisis']);
        });

        // Analytics gates
        Gate::define('view-analytics', function (User $user) {
            return $user->hasAnyRole(['Super Admin', 'Admin', 'Penganalisis', 'Pemerhati']);
        });

        Gate::define('view-detailed-analytics', function (User $user) {
            return $user->hasAnyRole(['Super Admin', 'Admin', 'Penganalisis']);
        });

        // Audit trail gates
        Gate::define('view-audit-logs', function (User $user) {
            return $user->hasAnyRole(['Super Admin', 'Admin']);
        });

        Gate::define('manage-audit-logs', function (User $user) {
            return $user->hasRole('Super Admin');
        });
    }

    /**
     * Register custom gates for complex authorization scenarios.
     */
    private function registerCustomGates(): void
    {
        // Negeri-scoped access gate
        Gate::define('access-negeri', function (User $user, string $negeri) {
            return $user->canAccessNegeri($negeri);
        });

        // Koperasi-scoped access gate
        Gate::define('access-koperasi', function (User $user, int $koperasiId) {
            return $user->canAccessCooperative($koperasiId);
        });

        // Dashboard access gates
        Gate::define('view-national-dashboard', function (User $user) {
            return $user->hasAnyRole(['Super Admin', 'Admin']);
        });

        Gate::define('view-negeri-dashboard', function (User $user, ?string $negeri = null) {
            if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
                return true;
            }

            if ($negeri) {
                return $user->canAccessNegeri($negeri);
            }

            return $user->negeri !== null;
        });

        Gate::define('view-koperasi-dashboard', function (User $user, ?int $koperasiId = null) {
            if ($user->hasAnyRole(['Super Admin', 'Admin'])) {
                return true;
            }

            if ($koperasiId) {
                return $user->canAccessCooperative($koperasiId);
            }

            return $user->cooperative_id !== null;
        });

        // Data modification gates based on scope
        Gate::define('modify-homestay-in-negeri', function (User $user, string $negeri) {
            if ($user->hasRole('Pemerhati')) {
                return false; // Read-only role
            }

            return $user->canAccessNegeri($negeri);
        });

        Gate::define('modify-homestay-in-koperasi', function (User $user, int $koperasiId) {
            if ($user->hasRole('Pemerhati')) {
                return false; // Read-only role
            }

            return $user->canAccessCooperative($koperasiId);
        });

        // Import scope gates
        Gate::define('import-for-negeri', function (User $user, string $negeri) {
            if (! $user->hasAnyRole(['Super Admin', 'Admin', 'Penganalisis'])) {
                return false;
            }

            return $user->hasAnyRole(['Super Admin', 'Admin']) || $user->canAccessNegeri($negeri);
        });

        Gate::define('import-for-koperasi', function (User $user, int $koperasiId) {
            if (! $user->hasAnyRole(['Super Admin', 'Admin', 'Penganalisis'])) {
                return false;
            }

            return $user->hasAnyRole(['Super Admin', 'Admin']) || $user->canAccessCooperative($koperasiId);
        });

        // Administrative actions
        Gate::define('manage-roles', function (User $user, ?User $targetUser = null) {
            if (! $user->hasAnyRole(['Super Admin', 'Admin'])) {
                return false;
            }

            // Super Admin can manage any role except other Super Admins
            if ($user->hasRole('Super Admin')) {
                return ! $targetUser || ! $targetUser->hasRole('Super Admin');
            }

            // Admin cannot manage Super Admin or other Admin users
            if ($targetUser && $targetUser->hasAnyRole(['Super Admin', 'Admin'])) {
                return false;
            }

            return true;
        });

        Gate::define('assign-scope', function (User $user) {
            return $user->hasRole('Super Admin');
        });

        // Data quality and validation gates
        Gate::define('approve-data-corrections', function (User $user) {
            return $user->hasAnyRole(['Super Admin', 'Admin']);
        });

        Gate::define('override-validation', function (User $user) {
            return $user->hasRole('Super Admin');
        });
    }
}
