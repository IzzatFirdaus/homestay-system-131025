<?php

declare(strict_types=1);

namespace Tests\Feature\Volt;

use App\Models\Homestay;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Volt\Volt;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class VoltHomestayIndexTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create Admin role for tests
        Role::findOrCreate('Admin', 'web');
    }

    public function test_authorized_user_can_view_volt_homestay_index(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        $this->actingAs($user)
            ->get(route('homestays.volt.index'))
            ->assertStatus(200)
            ->assertSeeLivewire('homestays.index');
    }

    public function test_search_filters_homestays_correctly(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        Homestay::factory()->create(['nama' => 'Homestay Alpha']);
        Homestay::factory()->create(['nama' => 'Homestay Beta']);

        Volt::test('homestays.index')
            ->actingAs($user)
            ->set('search', 'Alpha')
            ->assertSee('Homestay Alpha')
            ->assertDontSee('Homestay Beta');
    }

    public function test_negeri_filter_works_correctly(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        Homestay::factory()->create(['nama' => 'Homestay Selangor', 'negeri_id' => 1]);
        Homestay::factory()->create(['nama' => 'Homestay Penang', 'negeri_id' => 2]);

        Volt::test('homestays.index')
            ->actingAs($user)
            ->set('negeriFilter', 1)
            ->assertSee('Homestay Selangor')
            ->assertDontSee('Homestay Penang');
    }

    public function test_status_filter_works_correctly(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        Homestay::factory()->create(['nama' => 'Active Homestay', 'status' => 'aktif']);
        Homestay::factory()->create(['nama' => 'Inactive Homestay', 'status' => 'tidak_aktif']);

        Volt::test('homestays.index')
            ->actingAs($user)
            ->set('statusFilter', 'aktif')
            ->assertSee('Active Homestay')
            ->assertDontSee('Inactive Homestay');
    }

    public function test_clear_filters_resets_all_filters(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        Volt::test('homestays.index')
            ->actingAs($user)
            ->set('search', 'Test')
            ->set('negeriFilter', 1)
            ->set('statusFilter', 'aktif')
            ->call('clearFilters')
            ->assertSet('search', '')
            ->assertSet('negeriFilter', '')
            ->assertSet('statusFilter', '');
    }

    public function test_pagination_works_correctly(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        // Create 20 homestays (15 per page)
        Homestay::factory()->count(20)->create();

        Volt::test('homestays.index')
            ->actingAs($user)
            ->assertSee('Showing');
    }

    public function test_search_triggers_pagination_reset(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        Volt::test('homestays.index')
            ->actingAs($user)
            ->set('search', 'test')
            ->assertMethodWasCalled('resetPage');
    }

    public function test_shows_empty_state_when_no_results(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        Volt::test('homestays.index')
            ->actingAs($user)
            ->set('search', 'NonExistentHomestay')
            ->assertSee('Tiada rekod'); // Empty state text
    }

    public function test_edit_link_visible_with_permission(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        $homestay = Homestay::factory()->create();

        Volt::test('homestays.index')
            ->actingAs($user)
            ->assertSee('Edit');
    }

    public function test_create_button_visible_with_permission(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        Volt::test('homestays.index')
            ->actingAs($user)
            ->assertSee('Tambah Homestay');
    }
}
