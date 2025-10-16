<?php

declare(strict_types=1);

namespace Tests\Feature\Livewire\Homestays;

use App\Livewire\Homestays\CreateEditForm;
use App\Models\Cooperative;
use App\Models\Homestay;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateEditFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_authorized_user_can_view_homestay_create_form(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo('create-homestay');

        $this->actingAs($user)
            ->get(route('homestays.create'))
            ->assertStatus(200)
            ->assertSeeLivewire(CreateEditForm::class);
    }

    public function test_can_create_new_homestay_with_valid_data(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo('create-homestay');

        Livewire::actingAs($user)
            ->test(CreateEditForm::class)
            ->set('nama', 'Test Homestay')
            ->set('negeri', 'Selangor')
            ->set('alamat', 'Test Address')
            ->set('model_pengurusan', 'individu')
            ->set('status', 'Aktif')
            ->call('save')
            ->assertHasNoErrors()
            ->assertRedirect(route('homestays.index'));

        $this->assertDatabaseHas('homestays', [
            'nama' => 'Test Homestay',
            'negeri' => 'Selangor',
            'model_pengurusan' => 'individu',
        ]);
    }

    public function test_validation_fails_for_missing_required_fields(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo('create-homestay');

        Livewire::actingAs($user)
            ->test(CreateEditForm::class)
            ->set('form.nama_homestay', '')
            ->call('save')
            ->assertHasErrors(['form.nama_homestay']);
    }

    public function test_unauthorized_user_cannot_create_homestay(): void
    {
        $user = User::factory()->create(); // No permission

        Livewire::actingAs($user)
            ->test(CreateEditForm::class)
            ->call('save')
            ->assertForbidden();
    }

    public function test_cooperative_field_only_visible_when_model_is_koperasi(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo('create-homestay');
        $cooperative = Cooperative::factory()->create();

        Livewire::actingAs($user)
            ->test(CreateEditForm::class)
            ->set('form.model_pengurusan', 'koperasi')
            ->set('form.nama_homestay', 'Koperasi Homestay')
            ->set('form.negeri', 'Selangor')
            ->set('form.daerah', 'Petaling')
            ->set('form.status', 'aktif')
            ->set('form.cooperative_id', $cooperative->id)
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('homestays', [
            'nama_homestay' => 'Koperasi Homestay',
            'model_pengurusan' => 'koperasi',
            'cooperative_id' => $cooperative->id,
        ]);
    }

    public function test_can_update_existing_homestay(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo('update-homestay');
        $homestay = Homestay::factory()->create([
            'nama_homestay' => 'Original Name',
        ]);

        Livewire::actingAs($user)
            ->test(CreateEditForm::class, ['homestay' => $homestay])
            ->set('form.nama_homestay', 'Updated Name')
            ->call('save')
            ->assertHasNoErrors()
            ->assertRedirect(route('homestays.index'));

        $this->assertDatabaseHas('homestays', [
            'id' => $homestay->id,
            'nama_homestay' => 'Updated Name',
        ]);
    }
}
