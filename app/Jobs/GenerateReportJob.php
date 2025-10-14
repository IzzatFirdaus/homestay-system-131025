<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Data\ReportType;
use App\Services\ReportService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Queue job to generate reports asynchronously.
 */
final class GenerateReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @param array<string, bool|float|int|string|null> $filters */
    public function __construct(
        private readonly ReportType $type,
        private readonly array $filters,
        private readonly string $format = 'xlsx',
    ) {
        $this->onQueue('reports');
    }

    public function handle(ReportService $service): void
    {
        // We intentionally ignore the returned file here; caller should persist linkage if required
        $service->generateReport($this->type, $this->filters, $this->format);
    }
}
