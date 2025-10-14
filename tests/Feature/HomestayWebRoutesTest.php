<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Homestay;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Test web routes for homestay operations.
 */
final class HomestayWebRoutesTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Create required roles
        \Spatie\Permission\Models\Role::findOrCreate('Admin', 'web');

        $this->admin = User::factory()->create();
        $this->admin->assignRole('Admin');
    }

    public function test_index_page_is_accessible_to_authenticated_users(): void
    {
        $response = $this->actingAs($this->admin)->get(route('homestays.index'));

        $response->assertOk();
        $response->assertViewIs('homestays.index');
    }

    public function test_index_page_requires_authentication(): void
    {
        $response = $this->get(route('homestays.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_show_page_displays_homestay_details(): void
    {
        $homestay = Homestay::factory()->create();

        $response = $this->actingAs($this->admin)->get(route('homestays.show', $homestay));

        $response->assertOk();
        $response->assertViewIs('homestays.show');
        $response->assertViewHas('homestay');
    }

    public function test_create_page_is_accessible_to_authorized_users(): void
    {
        $response = $this->actingAs($this->admin)->get(route('homestays.create'));

        $response->assertOk();
        $response->assertViewIs('homestays.create');
    }

    public function test_edit_page_is_accessible_to_authorized_users(): void
    {
        $homestay = Homestay::factory()->create();

        $response = $this->actingAs($this->admin)->get(route('homestays.edit', $homestay));

        $response->assertOk();
        $response->assertViewIs('homestays.edit');
        $response->assertViewHas('homestay');
    }
}
