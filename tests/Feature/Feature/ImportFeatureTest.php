<?php

declare(strict_types=1);

namespace Tests\Feature\Feature;

use App\Models\Import;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ImportFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Roles are already seeded by TestCase, just assign permissions
        $adminRole = Role::findByName('Admin', 'web');
        $importPermission = Permission::findByName('import-data', 'web');
        if (!$adminRole->hasPermissionTo($importPermission)) {
            $adminRole->givePermissionTo($importPermission);
        }

        Storage::fake('local');
    }

    public function test_admin_can_view_import_index(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $response = $this->actingAs($user)->get(route('web.imports.index'));

        $response->assertStatus(200);
        $response->assertSee(__('Import Data'));
    }

    public function test_admin_can_upload_import_file(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $file = UploadedFile::fake()->create('homestays.xlsx', 100);

        $response = $this->actingAs($user)->post(route('web.imports.upload'), [
            'file' => $file,
            'type' => 'homestays',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('imports', [
            'user_id' => $user->id,
            'type' => 'homestays',
            'status' => 'queued',
        ]);

        // Check file was stored
        $this->assertTrue(Storage::disk('local')->exists('imports/' . $file->hashName()));
    }

    public function test_validation_fails_for_missing_file(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $response = $this->actingAs($user)->post(route('web.imports.upload'), [
            'type' => 'homestays',
        ]);

        $response->assertSessionHasErrors('file');
    }

    public function test_validation_fails_for_invalid_file_type(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $file = UploadedFile::fake()->create('document.pdf', 100);

        $response = $this->actingAs($user)->post(route('web.imports.upload'), [
            'file' => $file,
            'type' => 'homestays',
        ]);

        $response->assertSessionHasErrors('file');
    }

    public function test_validation_fails_for_missing_type(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $file = UploadedFile::fake()->create('homestays.xlsx', 100);

        $response = $this->actingAs($user)->post(route('web.imports.upload'), [
            'file' => $file,
        ]);

        $response->assertSessionHasErrors('type');
    }

    public function test_admin_can_view_import_status(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $import = Import::factory()->create([
            'user_id' => $user->id,
            'type' => 'homestays',
            'status' => 'processing',
        ]);

        $response = $this->actingAs($user)->get(route('web.imports.show', $import));

        $response->assertStatus(200);
        $response->assertSee($import->filename);
        $response->assertSee(__('Status Import'));
    }

    public function test_user_cannot_view_another_users_import(): void
    {
        $user1 = User::factory()->create();
        $user1->assignRole('Pemerhati'); // Observer role - restricted access

        $user2 = User::factory()->create();
        $user2->assignRole('Admin');

        $import = Import::factory()->create([
            'user_id' => $user2->id,
        ]);

        $response = $this->actingAs($user1)->get(route('web.imports.show', $import));

        $response->assertStatus(403);
    }

    public function test_import_shows_correct_progress(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');

        $import = Import::factory()->create([
            'user_id' => $user->id,
            'rows_total' => 100,
            'rows_processed' => 50,
            'rows_success' => 45,
            'rows_failed' => 5,
        ]);

        $response = $this->actingAs($user)->get(route('web.imports.show', $import));

        $response->assertStatus(200);
        $response->assertSee('50'); // Progress percentage
        $response->assertSee('45'); // Success count
        $response->assertSee('5'); // Failed count
    }
}
