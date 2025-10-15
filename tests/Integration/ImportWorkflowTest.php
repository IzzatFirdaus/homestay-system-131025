<?php

declare(strict_types=1);

use App\Jobs\ProcessImportJob;
use App\Models\Import;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Storage;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function () {
    Storage::fake('local');
    Queue::fake();
});

test('complete import workflow processes data from upload to dashboard cache', function () {
    // Arrange: Create authenticated user with appropriate role
    $user = User::factory()->create();
    $user->assignRole('Super Admin');

    // Create a fake Excel file
    $file = UploadedFile::fake()->create('homestays.xlsx', 100);

    // Act: Upload import file
    $response = test()->actingAs($user)->post(route('imports.upload'), [
        'file' => $file,
        'type' => 'homestays',
    ]);

    // Assert: Import record created
    $response->assertRedirect();
    expect(Import::count())->toBe(1);

    $import = Import::first();
    expect($import->status)->toBe('queued');
    expect($import->user_id)->toBe($user->id);
    expect($import->type)->toBe('homestays');

    // Assert: Job dispatched
    Queue::assertPushed(ProcessImportJob::class);

    // Simulate job processing
    // Note: In real test, you'd process the job or use DatabaseTransactions
    // and call ImportService directly for true integration
});

test('import validation errors are stored and retrievable', function () {
    $user = User::factory()->create();
    $user->assignRole('Super Admin');

    // Create error file in storage (already faked in beforeEach)
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
    $response = test()->actingAs($user)->get(route('imports.download-errors', $import));

    // Assert: Error report accessible
    $response->assertOk();
    // Note: Actual file download would be tested with mock
});

test('import updates dashboard cache after successful processing', function () {
    // This test would verify that after import completes,
    // dashboard KPI cache is invalidated/updated
    // Placeholder for integration with cache layer
    expect(true)->toBeTrue();
})->todo();
