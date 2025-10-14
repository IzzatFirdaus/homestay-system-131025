<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Import;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

/**
 * Test API routes for import operations.
 */
final class ImportApiRoutesTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('local');

        // Create required roles
        \Spatie\Permission\Models\Role::findOrCreate('Admin', 'web');

        $this->admin = User::factory()->create();
        $this->admin->assignRole('Admin');
    }

    public function test_api_preview_returns_preview_data(): void
    {
        // Use the test fixture file
        $fixturePath = base_path('tests/fixtures/test_homestays.csv');
        $file = new UploadedFile($fixturePath, 'test_homestays.csv', 'text/csv', null, true);

        $response = $this->actingAs($this->admin, 'sanctum')
            ->postJson('/api/v1/imports/preview', [
                'file' => $file,
                'jenis_import' => 'homestay', // Changed from 'type' to 'jenis_import' to match FormRequest
            ]);

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                'type',
                'totalRows',
                'sampleRows',
                'errors',
            ],
        ]);
    }

    public function test_api_status_returns_import_progress(): void
    {
        $import = Import::factory()->create([
            'status' => 'processing',
            'rows_total' => 100,
            'rows_processed' => 50,
        ]);

        $response = $this->actingAs($this->admin, 'sanctum')
            ->getJson("/api/v1/imports/{$import->id}/status");

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'status',
                'progress',
                'total_rows',
                'processed_rows',
                'error_count',
            ],
        ]);
    }

    public function test_api_import_requires_authentication(): void
    {
        $response = $this->getJson('/api/v1/imports');

        $response->assertUnauthorized();
    }
}
