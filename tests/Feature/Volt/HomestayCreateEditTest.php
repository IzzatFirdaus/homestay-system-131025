<?php

declare(strict_types=1);

namespace Tests\Feature\Volt;

use App\Models\Cooperative;
use App\Models\Homestay;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class HomestayCreateEditTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create Admin role for tests
        Role::findOrCreate('Admin', 'web');
    }

    public function test_admin_can_create_homestay(): void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $cooperative = Cooperative::factory()->create();

        $response = $this->actingAs($user)->post(route('homestays.store'), [
            'nama' => 'Homestay Test',
            'alamat' => '123 Jalan Test',
            'negeri' => 'JHR',
            'model_pengurusan' => 'koperasi',
            'cooperative_id' => $cooperative->id,
            'status' => 'Aktif',
            'kapasiti' => 10,
        ]);

        $response->assertRedirect(route('homestays.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('homestays', [
            'nama' => 'Homestay Test',
            'negeri' => 'JHR',
            'model_pengurusan' => 'koperasi',
            'id_koperasi' => $cooperative->id,
        ]);
    }

    public function test_admin_can_update_homestay(): void
    {
        $user = User::factory()->create()->assignRole('Admin');
        $homestay = Homestay::factory()->create();

        $response = $this->actingAs($user)->put(route('homestays.update', $homestay), [
            'nama' => 'Homestay Updated',
            'alamat' => $homestay->alamat,
            'negeri' => $homestay->negeri,
            'model_pengurusan' => $homestay->model_pengurusan,
            'cooperative_id' => $homestay->id_koperasi,
            'status' => $homestay->status,
            'kapasiti' => $homestay->kapasiti,
            'fasiliti' => $homestay->fasiliti,
            'cluster_id' => $homestay->cluster_id,
        ]);

        $response->assertRedirect(route('homestays.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('homestays', [
            'id' => $homestay->id,
            'nama' => 'Homestay Updated',
        ]);
    }

    public function test_validation_fails_for_invalid_data(): void
    {
        $user = User::factory()->create()->assignRole('Admin');

        $response = $this->actingAs($user)->post(route('homestays.store'), [
            'nama' => '',
        ]);

        $response->assertSessionHasErrors('nama');
    }
}
