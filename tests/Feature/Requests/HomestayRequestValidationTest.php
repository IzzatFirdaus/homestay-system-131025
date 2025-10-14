<?php

declare(strict_types=1);

namespace Tests\Feature\Requests;

use App\Models\Homestay;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

/**
 * Test homestay form request validation.
 */
final class HomestayRequestValidationTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        Role::findOrCreate('Admin', 'web');
        $this->admin = User::factory()->create();
        $this->admin->assignRole('Admin');
    }

    public function test_store_homestay_validation_passes_with_valid_data(): void
    {
        $data = [
            'nama' => 'Test Homestay',
            'negeri' => 'Selangor',
            'kapasiti' => 20,
            'model_pengurusan' => 'individu',
            'status' => 'Aktif',
        ];

        $response = $this->actingAs($this->admin)
            ->post(route('homestays.store'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('homestays', [
            'nama' => 'Test Homestay',
            'negeri' => 'Selangor',
        ]);
    }

    public function test_store_homestay_validation_fails_with_missing_required_fields(): void
    {
        $data = [
            'nama' => '', // Missing
            'negeri' => '', // Missing
        ];

        $response = $this->actingAs($this->admin)
            ->post(route('homestays.store'), $data);

        $response->assertSessionHasErrors(['nama', 'negeri', 'kapasiti', 'model_pengurusan', 'status']);
    }

    public function test_store_homestay_validation_fails_with_invalid_state(): void
    {
        $data = [
            'nama' => 'Test Homestay',
            'negeri' => 'InvalidState',
            'kapasiti' => 20,
            'model_pengurusan' => 'individu',
            'status' => 'Aktif',
        ];

        $response = $this->actingAs($this->admin)
            ->post(route('homestays.store'), $data);

        $response->assertSessionHasErrors(['negeri']);
    }

    public function test_store_homestay_validation_requires_cooperative_when_model_is_koperasi(): void
    {
        $data = [
            'nama' => 'Test Homestay',
            'negeri' => 'Selangor',
            'kapasiti' => 20,
            'model_pengurusan' => 'koperasi',
            'status' => 'Aktif',
            // Missing id_koperasi
        ];

        $response = $this->actingAs($this->admin)
            ->post(route('homestays.store'), $data);

        $response->assertSessionHasErrors(['id_koperasi']);
    }

    public function test_store_homestay_validation_fails_with_invalid_status(): void
    {
        $data = [
            'nama' => 'Test Homestay',
            'negeri' => 'Selangor',
            'kapasiti' => 20,
            'model_pengurusan' => 'individu',
            'status' => 'InvalidStatus',
        ];

        $response = $this->actingAs($this->admin)
            ->post(route('homestays.store'), $data);

        $response->assertSessionHasErrors(['status']);
    }

    public function test_update_homestay_validation_passes_with_partial_data(): void
    {
        $homestay = Homestay::factory()->create();

        $data = [
            'nama' => 'Updated Homestay Name',
        ];

        $response = $this->actingAs($this->admin)
            ->put(route('homestays.update', $homestay), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('homestays', [
            'id' => $homestay->id,
            'nama' => 'Updated Homestay Name',
        ]);
    }

    public function test_store_homestay_validation_fails_with_capacity_below_minimum(): void
    {
        $data = [
            'nama' => 'Test Homestay',
            'negeri' => 'Selangor',
            'kapasiti' => 0, // Below minimum of 1
            'model_pengurusan' => 'individu',
            'status' => 'Aktif',
        ];

        $response = $this->actingAs($this->admin)
            ->post(route('homestays.store'), $data);

        $response->assertSessionHasErrors(['kapasiti']);
    }
}
