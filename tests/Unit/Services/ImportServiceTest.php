<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Jobs\ProcessImportJob;
use App\Models\Import;
use App\Services\ImportService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

final class ImportServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_large_import_is_queued(): void
    {
        Storage::fake('local');

        // Create a mock import record exceeding threshold
        /** @var Import $import */
        $import = Import::factory()->create([
            'type' => 'homestays',
            'filename' => 'imports/test.xlsx',
            'rows_total' => 2001,
            'status' => 'queued',
        ]);

        Storage::disk('local')->put('imports/test.xlsx', 'dummy');

        Bus::fake();

        $service = app(ImportService::class);
        $service->processImport($import->id);

        Bus::assertDispatched(ProcessImportJob::class);
    }
}
