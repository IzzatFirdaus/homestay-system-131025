<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Homestay;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Test API routes for homestay operations.
 */
final class HomestayApiRoutesTest extends TestCase
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

    public function test_api_index_returns_json_response(): void
    {
        Homestay::factory()->count(3)->create();

        $response = $this->actingAs($this->admin, 'sanctum')
            ->getJson('/api/v1/homestays');

        $response->assertOk();
        $response->assertJsonStructure([
            'data',
        ]);
    }

    public function test_api_show_returns_homestay_details(): void
    {
        $homestay = Homestay::factory()->create();

        $response = $this->actingAs($this->admin, 'sanctum')
            ->getJson("/api/v1/homestays/{$homestay->id}");

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'nama',
                'negeri',
                'status',
            ],
        ]);
    }

    public function test_api_requires_authentication(): void
    {
        $response = $this->getJson('/api/v1/homestays');

        $response->assertUnauthorized();
    }

    public function test_api_store_creates_new_homestay(): void
    {
        $cooperative = \App\Models\Cooperative::factory()->create();

        $data = [
            'nama' => 'Test Homestay',
            'negeri' => 'Selangor',
            'daerah' => 'Petaling',
            'mukim' => 'Test Mukim',
            'status' => 'Aktif',
            'model_pengurusan' => 'koperasi',
            'id_koperasi' => $cooperative->id, // Required for koperasi model
            'kapasiti' => 50, // Required field
        ];

        $response = $this->actingAs($this->admin, 'sanctum')
            ->postJson('/api/v1/homestays', $data);

        $response->assertCreated();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'nama',
                'negeri',
            ],
        ]);
    }

    public function test_api_update_modifies_homestay(): void
    {
        $homestay = Homestay::factory()->create();

        $data = [
            'nama' => 'Updated Homestay Name',
            'status' => 'Aktif',
        ];

        $response = $this->actingAs($this->admin, 'sanctum')
            ->putJson("/api/v1/homestays/{$homestay->id}", $data);

        $response->assertOk();
    }

    public function test_api_destroy_deletes_homestay(): void
    {
        $homestay = Homestay::factory()->create();

        $response = $this->actingAs($this->admin, 'sanctum')
            ->deleteJson("/api/v1/homestays/{$homestay->id}");

        $response->assertNoContent();
        $this->assertSoftDeleted('homestays', ['id' => $homestay->id]);
    }

    public function test_api_returns_proper_error_format(): void
    {
        $response = $this->actingAs($this->admin, 'sanctum')
            ->getJson('/api/v1/homestays/99999');

        $response->assertNotFound();
    }
}
