<?php

declare(strict_types=1);

namespace Tests\Feature\Dashboard;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create Admin role for tests
        Role::findOrCreate('Admin', 'web');
    }

    public function test_admin_can_view_dashboard_with_all_components(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertStatus(200)
            ->assertSeeLivewire('dashboard.stats')
            ->assertSeeLivewire('dashboard.visitors-chart')
            ->assertSeeLivewire('dashboard.revenue-by-state-chart');
    }
}
