<?php

declare(strict_types=1);

namespace Tests\Feature\Livewire\Imports;

use App\Livewire\Imports\UploadForm;
use App\Models\Import as ImportModel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class UploadFormTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('local');
    }

    public function test_authorized_user_can_upload_file(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo('create-import');

        $file = UploadedFile::fake()->create('homestays.xlsx', 1000, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        Livewire::actingAs($user)
            ->test(UploadForm::class)
            ->set('file', $file)
            ->set('importType', 'homestay')
            ->call('upload')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('imports', [
            'jenis_import' => 'homestay',
            'user_id' => $user->id,
            'status' => 'pending',
        ]);
    }

    public function test_validation_fails_for_invalid_file_type(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo('create-import');

        $file = UploadedFile::fake()->create('document.pdf', 500);

        Livewire::actingAs($user)
            ->test(UploadForm::class)
            ->set('file', $file)
            ->set('importType', 'homestay')
            ->call('upload')
            ->assertHasErrors(['file']);
    }

    public function test_validation_fails_for_file_exceeding_size_limit(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo('create-import');

        // 60MB file (exceeds 50MB limit)
        $file = UploadedFile::fake()->create('large.xlsx', 60000, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        Livewire::actingAs($user)
            ->test(UploadForm::class)
            ->set('file', $file)
            ->set('importType', 'homestay')
            ->call('upload')
            ->assertHasErrors(['file']);
    }

    public function test_unauthorized_user_cannot_upload_file(): void
    {
        $user = User::factory()->create(); // No permission

        $file = UploadedFile::fake()->create('homestays.xlsx', 1000, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        Livewire::actingAs($user)
            ->test(UploadForm::class)
            ->set('file', $file)
            ->set('importType', 'homestay')
            ->call('upload')
            ->assertForbidden();
    }

    public function test_file_is_stored_correctly(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo('create-import');

        $file = UploadedFile::fake()->create('homestays.xlsx', 1000, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        Livewire::actingAs($user)
            ->test(UploadForm::class)
            ->set('file', $file)
            ->set('importType', 'homestay')
            ->call('upload');

        $import = ImportModel::latest()->first();
        $this->assertTrue(Storage::disk('local')->exists($import->file_path));
    }

    public function test_redirects_to_preview_after_successful_upload(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo('create-import');

        $file = UploadedFile::fake()->create('homestays.xlsx', 1000, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        Livewire::actingAs($user)
            ->test(UploadForm::class)
            ->set('file', $file)
            ->set('importType', 'homestay')
            ->call('upload')
            ->assertRedirect();

        $import = ImportModel::latest()->first();
        $this->assertNotNull($import);
    }
}
