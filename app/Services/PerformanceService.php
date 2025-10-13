<?php

declare(strict_types=1);

namespace App\Services;

use App\Data\HomestayKpi;
use App\Data\PerformanceData;
use App\Data\Period;
use App\Exceptions\BusinessRuleException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ValidationException;
use App\Models\Homestay;
use App\Models\Performance;
use Carbon\CarbonImmutable;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Collection;

/**
 * Measures and persists homestay performance metrics.
 */
final class PerformanceService
{
    private const MAX_MONTH = 12;

    private const MIN_MONTH = 1;

    private const OLDEST_EDITABLE_MONTHS = 3;

    public function __construct(
        private readonly DatabaseManager $database,
        private readonly Performance $performanceModel,
        private readonly Homestay $homestayModel,
    ) {}

    /**
     * Record a new monthly performance entry.
     *
     * @throws ValidationException
     * @throws BusinessRuleException
     * @throws NotFoundException
     */
    public function recordPerformance(PerformanceData $data): Performance
    {
        $this->validateData($data);
        $this->assertHomestayExists($data->homestayId);
        $this->assertNoDuplicate($data);

        return $this->database->transaction(function () use ($data): Performance {
            $performance = $this->performanceModel->newInstance($this->mapToAttributes($data));
            $performance->save();

            return $performance->refresh();
        });
    }

    /**
     * Update an existing performance entry.
     *
     * @throws ValidationException
     * @throws BusinessRuleException
     * @throws NotFoundException
     */
    public function updatePerformance(Performance $performance, PerformanceData $data): Performance
    {
        $this->validateData($data);
        $this->assertHomestayExists($data->homestayId);
        $this->assertEditable($performance);
        $this->assertNoDuplicate($data, $performance->id);

        return $this->database->transaction(function () use ($performance, $data): Performance {
            $performance->fill($this->mapToAttributes($data));
            $performance->save();

            return $performance->refresh();
        });
    }

    /**
     * Produce KPI aggregates for a homestay across a period.
     */
    public function getKpiForHomestay(int $homestayId, Period $period): HomestayKpi
    {
        $startKey = (int) $period->from->format('Ym');
        $endKey = (int) $period->to->format('Ym');

        $rows = $this->performanceModel->newQuery()
            ->where('homestay_id', $homestayId)
            ->whereRaw('(tahun * 100 + bulan) between ? and ?', [$startKey, $endKey])
            ->get(['pelawat_domestik', 'pelawat_asing', 'pendapatan', 'sumber_lain']);

        if ($rows->isEmpty()) {
            return new HomestayKpi(0, 0, 0, 0.0, 0.0);
        }

        /** @var Collection<int, array{pelawat_domestik:int, pelawat_asing:int, pendapatan:float|int|string, sumber_lain:float|int|string}> $rows */
        $totalDomestic = (int) $rows->sum(static fn (array $r): int => (int) $r['pelawat_domestik']);
        $totalInternational = (int) $rows->sum(static fn (array $r): int => (int) $r['pelawat_asing']);
        $totalRevenue = $rows->reduce(
            static fn (float $carry, array $row): float => $carry + (float) $row['pendapatan'] + (float) $row['sumber_lain'],
            0.0
        );

        $months = max($rows->count(), 1);
        $averageMonthlyRevenue = round($totalRevenue / $months, 2);

        return new HomestayKpi(
            $totalDomestic + $totalInternational,
            $totalDomestic,
            $totalInternational,
            round($totalRevenue, 2),
            $averageMonthlyRevenue,
        );
    }

    private function validateData(PerformanceData $data): void
    {
        if ($data->bulan < self::MIN_MONTH || $data->bulan > self::MAX_MONTH) {
            throw new ValidationException('Bulan mestilah antara 1 hingga 12.', ['bulan' => $data->bulan]);
        }

        if ($data->tahun < 2000) {
            throw new ValidationException('Tahun mestilah 2000 atau lebih baharu.', ['tahun' => $data->tahun]);
        }

        if ($data->pelawatDomestik < 0 || $data->pelawatAsing < 0) {
            throw new ValidationException('Bilangan pelawat tidak boleh negatif.');
        }

        if ($data->pendapatan < 0 || $data->sumberLain < 0) {
            throw new ValidationException('Nilai pendapatan tidak boleh negatif.');
        }
    }

    private function assertHomestayExists(int $homestayId): void
    {
        if (! $this->homestayModel->newQuery()->whereKey($homestayId)->exists()) {
            throw new NotFoundException('Homestay tidak ditemui.');
        }
    }

    private function assertNoDuplicate(PerformanceData $data, ?int $ignoreId = null): void
    {
        $query = $this->performanceModel->newQuery()
            ->where('homestay_id', $data->homestayId)
            ->where('bulan', $data->bulan)
            ->where('tahun', $data->tahun);

        if ($ignoreId !== null) {
            $query->whereKeyNot($ignoreId);
        }

        if ($query->exists()) {
            throw new BusinessRuleException('Rekod prestasi bagi bulan dan tahun tersebut telah wujud.');
        }
    }

    private function assertEditable(Performance $performance): void
    {
        // Use non-nullable Carbon operations by deriving from a known instance's timezone
        $recordMonth = CarbonImmutable::now()->setDate($performance->tahun, $performance->bulan, 1)->startOfDay();
        $threshold = CarbonImmutable::now($recordMonth->timezone)->startOfMonth()->subMonths(self::OLDEST_EDITABLE_MONTHS);

        if ($recordMonth->lessThan($threshold)) {
            throw new BusinessRuleException('Rekod prestasi lebih daripada tiga bulan tidak boleh dikemas kini.');
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function mapToAttributes(PerformanceData $data): array
    {
        return [
            'homestay_id' => $data->homestayId,
            'bulan' => $data->bulan,
            'tahun' => $data->tahun,
            'pelawat_domestik' => $data->pelawatDomestik,
            'pelawat_asing' => $data->pelawatAsing,
            'pendapatan' => $data->pendapatan,
            'sumber_lain' => $data->sumberLain,
        ];
    }
}
