<?php

declare(strict_types=1);

namespace App\Services\Import;

use App\Data\PerformanceData;
use App\Models\Performance;
use App\Services\PerformanceService;

/**
 * Handles performance domain upserts during imports.
 */
final class PerformanceImportProcessor
{
    public function __construct(
        private readonly PerformanceService $performanceService,
        private readonly Performance $performanceModel,
    ) {}

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    public function process(array $row): void
    {
        $data = new PerformanceData(
            homestayId: (int) ($row['homestay_id'] ?? 0),
            bulan: (int) ($row['bulan'] ?? 0),
            tahun: (int) ($row['tahun'] ?? 0),
            pelawatDomestik: (int) ($row['pelawat_domestik'] ?? 0),
            pelawatAsing: (int) ($row['pelawat_asing'] ?? 0),
            pendapatan: (float) ($row['pendapatan'] ?? 0),
            sumberLain: (float) ($row['sumber_lain'] ?? 0),
        );

        $existing = $this->performanceModel->newQuery()
            ->where('homestay_id', $data->homestayId)
            ->where('bulan', $data->bulan)
            ->where('tahun', $data->tahun)
            ->first();

        if ($existing !== null) {
            $this->performanceService->updatePerformance($existing, $data);

            return;
        }

        $this->performanceService->recordPerformance($data);
    }
}
