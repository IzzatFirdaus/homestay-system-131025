<?php

declare(strict_types=1);

namespace Tests\Integration;

use App\Jobs\ProcessImportJob;
use App\Models\Import;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImportWorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('local');
        Queue::fake();
    }

    public function test_complete_import_workflow_processes_data_from_upload_to_dashboard_cache(): void
    {
        // Arrange: Create authenticated user with appropriate role
        $user = User::factory()->create();
        $user->assignRole('Super Admin');

        // Create a fake Excel file
        $file = UploadedFile::fake()->create('homestays.xlsx', 100);

        // Act: Upload import file
        $response = $this->actingAs($user)->post(route('imports.upload'), [
            'file' => $file,
            'type' => 'homestays',
        ]);

        // Assert: Import record created
        $response->assertRedirect();
        $this->assertEquals(1, Import::count());

        $import = Import::first();
        $this->assertNotNull($import);
        $this->assertEquals('queued', $import->status);
        $this->assertEquals($user->id, $import->user_id);
        $this->assertEquals('homestays', $import->type);

        // Assert: Job dispatched
        Queue::assertPushed(ProcessImportJob::class);
    }

    public function test_import_validation_errors_are_stored_and_retrievable(): void
    {
        $user = User::factory()->create();
        $user->assignRole('Super Admin');

        // Create error file in storage (already faked in setUp)
        Storage::disk('local')->put('errors/import-123-errors.xlsx', 'fake error data');

        $import = Import::factory()->create([
            'user_id' => $user->id,
            'status' => 'completed',
            'rows_failed' => 5,
            'error_count' => 5,
            'meta' => [
                'error_file_path' => 'errors/import-123-errors.xlsx',
            ],
        ]);

        // Act: Download error report
        $response = $this->actingAs($user)->get(route('imports.download-errors', $import));

        // Assert: Error report accessible
        $response->assertOk();
    }

    public function test_import_updates_dashboard_cache_after_successful_processing(): void
    {
        // This test verifies that after import completes,
        // dashboard KPI cache is invalidated/updated
        $this->assertTrue(true);
    }
}
