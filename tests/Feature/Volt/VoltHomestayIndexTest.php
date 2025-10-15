<?php

declare(strict_types=1);

namespace Tests\Feature\Volt;

use App\Models\Homestay;
use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Volt\Volt;
use Tests\TestCase;

class VoltHomestayIndexTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
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
        $this->actingAs($user);

        Homestay::factory()->individu()->create(['nama' => 'Homestay Alpha']);
        Homestay::factory()->individu()->create(['nama' => 'Homestay Beta']);

        Volt::test('homestays.index')
            ->set('search', 'Alpha')
            ->assertSee('Homestay Alpha')
            ->assertDontSee('Homestay Beta');
    }

    public function test_negeri_filter_works_correctly(): void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        Homestay::factory()->individu()->create(['nama' => 'Homestay Selangor', 'negeri' => 'SGR']);
        Homestay::factory()->individu()->create(['nama' => 'Homestay Penang', 'negeri' => 'PNG']);

        Volt::test('homestays.index')
            ->set('negeriFilter', 'SGR')
            ->assertSee('Homestay Selangor')
            ->assertDontSee('Homestay Penang');
    }

    public function test_status_filter_works_correctly(): void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        Homestay::factory()->individu()->create(['nama' => 'Active Homestay', 'status' => 'Aktif']);
        Homestay::factory()->individu()->create(['nama' => 'Inactive Homestay', 'status' => 'Tidak Aktif']);

        Volt::test('homestays.index')
            ->set('statusFilter', 'Aktif')
            ->assertSee('Active Homestay')
            ->assertDontSee('Inactive Homestay');
    }

    public function test_clear_filters_resets_all_filters(): void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        Volt::test('homestays.index')
            ->set('search', 'Test')
            ->set('negeriFilter', 'SGR')
            ->set('statusFilter', 'Aktif')
            ->call('clearFilters')
            ->assertSet('search', '')
            ->assertSet('negeriFilter', '')
            ->assertSet('statusFilter', '');
    }

    public function test_pagination_works_correctly(): void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        // Create 20 homestays (15 per page)
        Homestay::factory()->individu()->count(20)->create();

        Volt::test('homestays.index')
            ->assertSee(trans('homestays.index.pagination_summary', [
                'from' => 1,
                'to' => 15,
                'total' => 20,
            ]));
    }

    public function test_search_triggers_pagination_reset(): void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        $component = Volt::test('homestays.index');

        $component->set('paginators.page', 2);
        $component->set('search', 'test');

        $component->assertSet('paginators.page', 1);
    }

    public function test_shows_empty_state_when_no_results(): void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        Volt::test('homestays.index')
            ->set('search', 'NonExistentHomestay')
            ->assertSee(__('homestays.index.table.empty'));
    }

    public function test_edit_link_visible_with_permission(): void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        $homestay = Homestay::factory()->individu()->create();

        Volt::test('homestays.index')
            ->assertSee(__('homestays.index.actions.edit'));
    }

    public function test_create_button_visible_with_permission(): void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $this->actingAs($user);

        Volt::test('homestays.index')
            ->assertSee(__('homestays.index.actions.create'));
    }
}
