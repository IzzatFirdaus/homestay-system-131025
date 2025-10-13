<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Services\ImportService;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Queue job that delegates heavy import processing to the {@see ImportService}.
 */
final class ProcessImportJob implements ShouldQueue
{
    use Batchable;
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(private readonly int $importId)
    {
        $this->onQueue('imports');
    }

    public function handle(ImportService $service): void
    {
        $service->runQueuedImport($this->importId);
    }
}
