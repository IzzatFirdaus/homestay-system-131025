<?php

declare(strict_types=1);

namespace App\Services;

use App\Data\ReportFile;
use App\Data\ReportType;
use App\Exceptions\BusinessRuleException;
use App\Exceptions\NotFoundException;
use App\Exports\GenericArrayExport;
use App\Models\Homestay;
use App\Models\Performance;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Generates analytical reports in XLSX/CSV/PDF formats.
 *
 * Business logic: dataset selection, aggregation, and export. No HTTP concerns.
 */
final class ReportService
{
    private const STORAGE_DISK = 'local';

    public function __construct(
        private readonly Performance $performanceModel,
        private readonly Homestay $homestayModel,
    ) {}

    /**
     * Get aggregated statistics for the main dashboard.
     *
     * @param  array<string, mixed>  $filters
     * @return array<string, mixed>
     */
    public function getDashboardStats(array $filters = []): array
    {
        $query = $this->performanceModel->newQuery();

        if (! empty($filters['negeri'])) {
            $query->whereHas('homestay', function (Builder $q) use ($filters) {
                $q->where('negeri', $filters['negeri']);
            });
        }

        $totalVisitors = $query->sum(DB::raw('pelawat_domestik + pelawat_asing'));
        $totalRevenue = $query->sum('pendapatan');

        $homestayQuery = $this->homestayModel->newQuery();
        if (! empty($filters['negeri'])) {
            $homestayQuery->where('negeri', $filters['negeri']);
        }
        $totalHomestays = $homestayQuery->count();

        // Occupancy rate is a complex calculation, returning a placeholder for now.
        // It would typically require data on `total_rooms` and `days_in_month`.
        $occupancyRate = 75; // Placeholder

        return [
            'total_visitors' => (int) $totalVisitors,
            'total_revenue' => (float) $totalRevenue,
            'total_homestays' => $totalHomestays,
            'occupancy_rate' => $occupancyRate,
        ];
    }

    /**
     * Get data for the visitors chart.
     *
     * @param  array<string, mixed>  $filters
     * @return array<string, mixed>
     */
    public function getVisitorsChartData(array $filters = []): array
    {
        $query = $this->performanceModel->newQuery()
            ->selectRaw('tahun, bulan, SUM(pelawat_domestik) as total_domestik, SUM(pelawat_asing) as total_asing')
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan');

        if (! empty($filters['negeri'])) {
            $query->whereHas('homestay', function (Builder $q) use ($filters) {
                $q->where('negeri', $filters['negeri']);
            });
        }

        if (! empty($filters['tahun'])) {
            $query->where('tahun', $filters['tahun']);
        } else {
            $query->where('tahun', now()->year);
        }

        $results = $query->get();

        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $domestik = array_fill(0, 12, 0);
        $asing = array_fill(0, 12, 0);

        foreach ($results as $result) {
            $monthIndex = $result->bulan - 1;
            if ($monthIndex >= 0 && $monthIndex < 12) {
                $domestik[$monthIndex] = (int) $result->total_domestik;
                $asing[$monthIndex] = (int) $result->total_asing;
            }
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Domestic Visitors',
                    'data' => $domestik,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
                ],
                [
                    'label' => 'Foreign Visitors',
                    'data' => $asing,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
                ],
            ],
        ];
    }

    /**
     * Get data for the revenue by state chart.
     *
     * @return array<string, mixed>
     */
    public function getRevenueByStateChartData(): array
    {
        $results = $this->performanceModel->newQuery()
            ->join('homestays', 'performances.homestay_id', '=', 'homestays.id')
            ->selectRaw('homestays.negeri, SUM(performances.pendapatan) as total_revenue')
            ->groupBy('homestays.negeri')
            ->orderBy('homestays.negeri')
            ->get();

        $labels = $results->pluck('negeri')->toArray();
        $data = $results->pluck('total_revenue')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Revenue by State',
                    'data' => $data,
                    // You can add more styling options here
                ],
            ],
        ];
    }

    /**
     * Generate a report file for the given type/filters and format.
     *
     * @param  array<string, bool|float|int|string|null>  $filters  e.g. ['negeri' => 'Selangor', 'from' => '2025-01', 'to' => '2025-06', 'homestay_id' => 1]
     * @param  string  $format  One of: xlsx, csv, pdf
     */
    public function generateReport(ReportType $type, array $filters = [], string $format = 'xlsx'): ReportFile
    {
        $format = strtolower($format);
        if (! in_array($format, ['xlsx', 'csv', 'pdf'], true)) {
            throw new BusinessRuleException('Format laporan tidak disokong. Guna xlsx/csv/pdf.');
        }

        // Build dataset and headings by type
        [$headings, $rows, $title] = match ($type) {
            ReportType::DashboardSummary => $this->buildDashboardSummary($filters),
            ReportType::HomestayPerformance => $this->buildHomestayPerformance($filters),
            ReportType::NegeriPerformance => $this->buildNegeriPerformance($filters),
        };

        // Persist to disk
        $filenameBase = sprintf('%s-%s', Str::slug($title), now()->format('Ymd-His'));
        $relativePath = $this->storeReport($headings, $rows, $format, $filenameBase, $type->value);

        $mime = match ($format) {
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'csv' => 'text/csv',
            default => 'application/pdf',
        };

        return new ReportFile(
            disk: self::STORAGE_DISK,
            path: $relativePath,
            mimeType: $mime,
            downloadName: $filenameBase . '.' . $format,
        );
    }

    /**
     * @param  array<int, string>  $headings
     * @param  Collection<int, array<string, bool|float|int|string|null>>  $rows
     */
    private function storeReport(array $headings, Collection $rows, string $format, string $filenameBase, string $type): string
    {
        $dir = 'reports/' . Str::slug($type);
        if (! Storage::disk(self::STORAGE_DISK)->exists($dir)) {
            Storage::disk(self::STORAGE_DISK)->makeDirectory($dir);
        }

        $relative = $dir . '/' . $filenameBase . '.' . $format;

        if ($format === 'pdf') {
            // Render a small Blade template for printable PDF
            $html = view('reports.table', [
                'title' => $filenameBase,
                'headings' => $headings,
                'rows' => $rows,
            ])->render();

            $pdf = Pdf::loadHTML($html);
            Storage::disk(self::STORAGE_DISK)->put($relative, $pdf->output());

            return $relative;
        }

        // Excel/CSV via Laravel-Excel
        Excel::store(new GenericArrayExport($headings, $rows), $relative, self::STORAGE_DISK);

        return $relative;
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $filters
     * @return array{0: array<int,string>, 1: Collection<int, array<string, bool|float|int|string|null>>, 2: string}
     */
    /** @phpstan-ignore-next-line */
    private function buildDashboardSummary(array $filters): array
    {
        $query = $this->applyFiltersForDashboard($filters);

        $rows = $query->get([
            'homestay_id', 'bulan', 'tahun', 'pelawat_domestik',
            'pelawat_asing', 'pendapatan', 'sumber_lain',
        ])
            ->map($this->mapDashboardRow(...));

        return [$this->dashboardHeadings(), $rows->toBase(), 'Dashboard Summary'];
    }

    /**
     * Apply dashboard-specific filters (negeri, date range) to query.
     *
     * @param  array<string, bool|float|int|string|null>  $filters
     * @return \Illuminate\Database\Eloquent\Builder<\App\Models\Performance>
     */
    private function applyFiltersForDashboard(array $filters): \Illuminate\Database\Eloquent\Builder
    {
        $query = $this->performanceModel->newQuery()->with('homestay:id,nama,negeri');

        if (isset($filters['negeri'])) {
            $query->whereHas('homestay', static function (Builder $q) use ($filters): void {
                $q->where('negeri', $filters['negeri']);
            });
        }

        if (isset($filters['from_year'], $filters['from_month'], $filters['to_year'], $filters['to_month'])) {
            $query->betweenPeriods(
                (int) $filters['from_year'],
                (int) $filters['from_month'],
                (int) $filters['to_year'],
                (int) $filters['to_month']
            );
        }

        return $query;
    }

    /**
     * Map a Performance record to dashboard row format.
     *
     * @return array<string, float|int>
     */
    private function mapDashboardRow(Performance $p): array
    {
        return [
            'Homestay ID' => $p->homestay_id,
            'Bulan' => $p->bulan,
            'Tahun' => $p->tahun,
            'Pelawat Domestik' => $p->pelawat_domestik,
            'Pelawat Asing' => $p->pelawat_asing,
            'Jumlah Pelawat' => $p->total_pelawat,
            'Pendapatan (RM)' => (float) $p->pendapatan,
            'Sumber Lain (RM)' => (float) $p->sumber_lain,
            'Jumlah Pendapatan (RM)' => (float) $p->pendapatan + (float) $p->sumber_lain,
        ];
    }

    /**
     * @return array<int, string>
     */
    private function dashboardHeadings(): array
    {
        return [
            'Homestay ID',
            'Bulan',
            'Tahun',
            'Pelawat Domestik',
            'Pelawat Asing',
            'Jumlah Pelawat',
            'Pendapatan (RM)',
            'Sumber Lain (RM)',
            'Jumlah Pendapatan (RM)',
        ];
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $filters  expects homestay_id, optional year range
     * @return array{0: array<int,string>, 1: Collection<int, array<string, bool|float|int|string|null>>, 2: string}
     */
    /** @phpstan-ignore-next-line */
    private function buildHomestayPerformance(array $filters): array
    {
        $homestay = $this->validateAndGetHomestay($filters);
        $query = $this->applyFiltersForHomestayPerformance($filters, (int) $homestay->id);

        $rows = $query->orderBy('tahun')
            ->orderBy('bulan')
            ->get(['bulan', 'tahun', 'pelawat_domestik', 'pelawat_asing', 'pendapatan', 'sumber_lain'])
            ->map(fn (Performance $p) => $this->mapHomestayPerformanceRow($p, $homestay));

        return [$this->homestayPerformanceHeadings(), $rows->toBase(), 'Laporan Prestasi Homestay'];
    }

    /**
     * Validate homestay_id and return the Homestay model.
     *
     * @param  array<string, bool|float|int|string|null>  $filters
     */
    private function validateAndGetHomestay(array $filters): Homestay
    {
        $homestayId = (int) ($filters['homestay_id'] ?? 0);
        if ($homestayId <= 0) {
            throw new BusinessRuleException('homestay_id diperlukan untuk laporan prestasi homestay.');
        }

        $homestay = $this->homestayModel->newQuery()->find($homestayId);
        if ($homestay === null) {
            throw new NotFoundException('Homestay tidak ditemui.');
        }

        return $homestay;
    }

    /**
     * Apply homestay-specific filters to performance query.
     *
     * @param  array<string, bool|float|int|string|null>  $filters
     * @return \Illuminate\Database\Eloquent\Builder<\App\Models\Performance>
     */
    private function applyFiltersForHomestayPerformance(
        array $filters,
        int $homestayId
    ): \Illuminate\Database\Eloquent\Builder {
        $query = $this->performanceModel->newQuery()->where('homestay_id', $homestayId);

        if (isset($filters['from_year'], $filters['from_month'], $filters['to_year'], $filters['to_month'])) {
            $query->betweenPeriods(
                (int) $filters['from_year'],
                (int) $filters['from_month'],
                (int) $filters['to_year'],
                (int) $filters['to_month']
            );
        }

        return $query;
    }

    /**
     * Map a Performance record to homestay performance row format.
     *
     * @return array<string, float|int|string>
     */
    private function mapHomestayPerformanceRow(Performance $p, Homestay $homestay): array
    {
        $homestayNama = is_string($homestay->nama) ? $homestay->nama : 'Unknown';
        $bulan = is_int($p->bulan) ? $p->bulan : 0;
        $tahun = is_int($p->tahun) ? $p->tahun : 0;
        $pelawatDomestik = is_int($p->pelawat_domestik) ? $p->pelawat_domestik : 0;
        $pelawatAsing = is_int($p->pelawat_asing) ? $p->pelawat_asing : 0;

        return [
            'Homestay' => $homestayNama,
            'Bulan' => $bulan,
            'Tahun' => $tahun,
            'Pelawat Domestik' => $pelawatDomestik,
            'Pelawat Asing' => $pelawatAsing,
            'Jumlah Pelawat' => $pelawatDomestik + $pelawatAsing,
            'Pendapatan (RM)' => (float) $p->pendapatan,
            'Sumber Lain (RM)' => (float) $p->sumber_lain,
            'Jumlah Pendapatan (RM)' => (float) $p->pendapatan + (float) $p->sumber_lain,
        ];
    }

    /**
     * @return array<int, string>
     */
    private function homestayPerformanceHeadings(): array
    {
        return [
            'Homestay',
            'Bulan',
            'Tahun',
            'Pelawat Domestik',
            'Pelawat Asing',
            'Jumlah Pelawat',
            'Pendapatan (RM)',
            'Sumber Lain (RM)',
            'Jumlah Pendapatan (RM)',
        ];
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $filters  expects negeri, optional year range
     * @return array{0: array<int,string>, 1: Collection<int, array<string, bool|float|int|string|null>>, 2: string}
     */
    private function buildNegeriPerformance(array $filters): array
    {
        $negeri = $this->validateAndGetNegeri($filters);
        $query = $this->applyFiltersForNegeriPerformance($filters, $negeri);

        /** @var \Illuminate\Support\Collection<int, Performance> $raw */
        $raw = $query->get(['bulan', 'tahun', 'pelawat_domestik', 'pelawat_asing', 'pendapatan', 'sumber_lain']);

        $rows = $this->aggregateNegeriPerformanceByPeriod($raw, $negeri);
        $rows = $rows->sortBy([['Tahun', 'asc'], ['Bulan', 'asc']])->values();

        /** @var \Illuminate\Support\Collection<int, array<string, bool|float|int|string|null>> $typedRows */
        $typedRows = $rows;

        return [$this->negeriPerformanceHeadings(), $typedRows, 'Laporan Prestasi Negeri'];
    }

    /**
     * Validate negeri parameter.
     *
     * @param  array<string, bool|float|int|string|null>  $filters
     */
    private function validateAndGetNegeri(array $filters): string
    {
        $negeri = (string) ($filters['negeri'] ?? '');
        if ($negeri === '') {
            throw new BusinessRuleException('negeri diperlukan untuk laporan prestasi negeri.');
        }

        return $negeri;
    }

    /**
     * Apply negeri-specific filters to performance query.
     *
     * @param  array<string, bool|float|int|string|null>  $filters
     * @return \Illuminate\Database\Eloquent\Builder<\App\Models\Performance>
     */
    private function applyFiltersForNegeriPerformance(
        array $filters,
        string $negeri
    ): \Illuminate\Database\Eloquent\Builder {
        $query = $this->performanceModel->newQuery()
            ->with('homestay:id,negeri')
            ->whereHas('homestay', static function (Builder $q) use ($negeri): void {
                $q->where('negeri', $negeri);
            });

        if (isset($filters['from_year'], $filters['from_month'], $filters['to_year'], $filters['to_month'])) {
            $query->betweenPeriods(
                (int) $filters['from_year'],
                (int) $filters['from_month'],
                (int) $filters['to_year'],
                (int) $filters['to_month']
            );
        }

        return $query;
    }

    /**
     * Aggregate performance data by period across homestays.
     *
     * @param  \Illuminate\Support\Collection<int, Performance>  $raw
     * @return \Illuminate\Support\Collection<int, array<string, bool|float|int|string|null>>
     */
    private function aggregateNegeriPerformanceByPeriod(
        \Illuminate\Support\Collection $raw,
        string $negeri
    ): \Illuminate\Support\Collection {
        $grouped = $raw->groupBy(
            static fn (Performance $p): string => sprintf('%04d-%02d', $p->tahun, $p->bulan)
        );

        $rows = collect();
        foreach ($grouped as $periodKey => $items) {
            $parts = explode('-', (string) $periodKey);
            $tahun = (int) ($parts[0] ?? 0);
            $bulan = (int) ($parts[1] ?? 0);

            $domestikSum = $items->sum('pelawat_domestik');
            $asingSum = $items->sum('pelawat_asing');
            $pendapatanSum = $items->sum('pendapatan');
            $lainSum = $items->sum('sumber_lain');

            $dom = is_numeric($domestikSum) ? (int) $domestikSum : 0;
            $for = is_numeric($asingSum) ? (int) $asingSum : 0;
            $pend = is_numeric($pendapatanSum) ? (float) $pendapatanSum : 0.0;
            $lain = is_numeric($lainSum) ? (float) $lainSum : 0.0;

            $rows->push([
                'Negeri' => $negeri,
                'Bulan' => $bulan,
                'Tahun' => $tahun,
                'Pelawat Domestik' => $dom,
                'Pelawat Asing' => $for,
                'Jumlah Pelawat' => $dom + $for,
                'Pendapatan (RM)' => round($pend, 2),
                'Sumber Lain (RM)' => round($lain, 2),
                'Jumlah Pendapatan (RM)' => round($pend + $lain, 2),
            ]);
        }

        return $rows;
    }

    /**
     * @return array<int, string>
     */
    private function negeriPerformanceHeadings(): array
    {
        return [
            'Negeri',
            'Bulan',
            'Tahun',
            'Pelawat Domestik',
            'Pelawat Asing',
            'Jumlah Pelawat',
            'Pendapatan (RM)',
            'Sumber Lain (RM)',
            'Jumlah Pendapatan (RM)',
        ];
    }

    /**
     * Returns an array of monthly visitor totals for a given negeri and tahun.
     * Used by visitors-chart.blade.php.
     *
     * @return array<string, int> // ['Jan' => 123, ...]
     */
    public function getVisitorTrends(?string $negeri, int $tahun): array
    {
        $query = $this->performanceModel->newQuery()
            ->selectRaw('bulan, SUM(pelawat_domestik + pelawat_asing) as total_visitors')
            ->where('tahun', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan');

        if (! empty($negeri)) {
            $query->whereHas('homestay', function (Builder $q) use ($negeri) {
                $q->where('negeri', $negeri);
            });
        }

        $results = $query->get();
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $data = array_fill_keys($labels, 0);

        foreach ($results as $row) {
            $monthIdx = (int) $row->bulan - 1;
            if ($monthIdx >= 0 && $monthIdx < 12) {
                $data[$labels[$monthIdx]] = (int) $row->total_visitors;
            }
        }

        return $data;
    }

    /**
     * Returns an array of total revenue by negeri for a given tahun.
     * Used by revenue-by-state-chart.blade.php.
     *
     * @return array<string, float> // ['Selangor' => 12345.67, ...]
     */
    public function getRevenueByState(int $tahun): array
    {
        $results = $this->performanceModel->newQuery()
            ->join('homestays', 'performances.homestay_id', '=', 'homestays.id')
            ->selectRaw('homestays.negeri, SUM(performances.pendapatan) as total_revenue')
            ->where('performances.tahun', $tahun)
            ->groupBy('homestays.negeri')
            ->orderBy('homestays.negeri')
            ->get();

        /** @var array<string, float> $data */
        $data = [];
        foreach ($results as $row) {
            /** @var string $negeri */
            $negeri = $row->negeri;
            $data[$negeri] = (float) $row->total_revenue;
        }

        return $data;
    }
}
