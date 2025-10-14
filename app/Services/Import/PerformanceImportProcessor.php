<?php

declare(strict_types=1);

namespace App\Services\Import;

use App\Data\PerformanceData;
use App\Exceptions\BusinessRuleException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ValidationException;
use App\Models\Performance;
use App\Services\PerformanceService;

/**
 * Applies normalized performance rows using the domain performance service.
 */
final class PerformanceImportProcessor
{
    public function __construct(
        private readonly PerformanceService $performanceService,
        private readonly Performance $performanceModel,
    ) {}

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     *
     * @throws ValidationException
     * @throws BusinessRuleException
     * @throws NotFoundException
     */
    public function process(array $row): void
    {
        $data = $this->mapToDto($row);

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

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    private function mapToDto(array $row): PerformanceData
    {
        $homestayId = $this->asInt($row['homestay_id'] ?? $row['id_homestay'] ?? null);
        $month = $this->asInt($row['bulan'] ?? null);
        $year = $this->asInt($row['tahun'] ?? null);
        $domestic = $this->asInt($row['pelawat_domestik'] ?? null);
        $international = $this->asInt($row['pelawat_asing'] ?? null);
        $income = $this->asFloat($row['pendapatan'] ?? null);
        $otherIncome = $this->asFloat($row['sumber_lain'] ?? null);

        return new PerformanceData(
            homestayId: $homestayId,
            bulan: $month,
            tahun: $year,
            pelawatDomestik: $domestic,
            pelawatAsing: $international,
            pendapatan: $income,
            sumberLain: $otherIncome,
        );
    }

    private function asInt(mixed $value): int
    {
        if ($value === null || $value === '') {
            return 0;
        }

        if (is_int($value)) {
            return $value;
        }

        if (is_numeric($value)) {
            return (int) $value;
        }

        return 0;
    }

    private function asFloat(mixed $value): float
    {
        if ($value === null || $value === '') {
            return 0.0;
        }

        if (is_float($value) || is_int($value)) {
            return round((float) $value, 2);
        }

        if (is_numeric($value)) {
            return round((float) $value, 2);
        }

        return 0.0;
    }
}
