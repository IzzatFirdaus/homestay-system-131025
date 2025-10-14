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

    // phpstan type aliases are documented inline per method

    public function __construct(
        private readonly Performance $performanceModel,
        private readonly Homestay $homestayModel,
    ) {}

    /**
     * Generate a report file for the given type/filters and format.
     *
     * @param  array<string, int|string|null>  $filters  e.g. ['negeri' => 'Selangor', 'from_year' => '2025', 'homestay_id' => 1]
     * @param  string  $format  One of: xlsx, csv, pdf
     */
    public function generateReport(ReportType $type, array $filters = [], string $format = 'xlsx'): ReportFile
    {
        $format = strtolower($format);
        if (! in_array($format, ['xlsx', 'csv', 'pdf'], true)) {
            throw new BusinessRuleException('Format laporan tidak disokong. Guna xlsx/csv/pdf.');
        }

        // Build dataset and headings by type
        /** @var array{0: array<int,string>, 1: Collection<int, array<string, bool|float|int|string|null>>, 2: string} $built */
        $built = match ($type) {
            ReportType::DashboardSummary => $this->buildDashboardSummary($filters),
            ReportType::HomestayPerformance => $this->buildHomestayPerformance($filters),
            ReportType::NegeriPerformance => $this->buildNegeriPerformance($filters),
        };

        [$headings, $rows, $title] = $built;
        /** @var array<int, array<string, bool|float|int|string|null>> $rowsArray */
        $rowsArray = $rows instanceof Collection ? $rows->values()->all() : $rows;

        // Persist to disk
        $filenameBase = sprintf('%s-%s', Str::slug($title), now()->format('Ymd-His'));
        $relativePath = $this->storeReport($headings, $rowsArray, $format, $filenameBase, $type->value);

        $mime = match ($format) {
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'csv' => 'text/csv',
            'pdf' => 'application/pdf',
        };

        return new ReportFile(
            disk: self::STORAGE_DISK,
            path: $relativePath,
            mimeType: $mime,
            downloadName: $filenameBase.'.'.$format,
        );
    }

    /**
     * @param  array<int, string>  $headings
     * @param  array<int, array<string, bool|float|int|string|null>>  $rows
     */
    private function storeReport(array $headings, array $rows, string $format, string $filenameBase, string $type): string
    {
        $dir = 'reports/'.Str::slug($type);
        if (! Storage::disk(self::STORAGE_DISK)->exists($dir)) {
            Storage::disk(self::STORAGE_DISK)->makeDirectory($dir);
        }

        $relative = $dir.'/'.$filenameBase.'.'.$format;

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
     * @param  array<string, int|string|null>  $filters
     * @return array{0: array<int,string>, 1: array<int, array<string, bool|float|int|string|null>>, 2: string}
     */
    private function buildDashboardSummary(array $filters): array
    {
        $query = $this->performanceModel->newQuery()->with('homestay:id,nama,negeri');
        $this->applyNegeriFilter($query, $filters);
        $this->applyPeriodFilters($query, $filters);

        $rows = $query
            ->get(['homestay_id', 'bulan', 'tahun', 'pelawat_domestik', 'pelawat_asing', 'pendapatan', 'sumber_lain'])
            ->map(fn (Performance $performance): array => $this->mapDashboardRow($performance))
            ->values()
            ->all();

        return [$this->dashboardHeadings(), $rows, 'Dashboard Summary'];
    }

    /**
     * @param  array<string, int|string|null>  $filters  expects homestay_id, optional year range
     * @return array{0: array<int,string>, 1: array<int, array<string, bool|float|int|string|null>>, 2: string}
     */
    private function buildHomestayPerformance(array $filters): array
    {
        $homestayId = $this->extractHomestayId($filters);
        $homestay = $this->findHomestayOrFail($homestayId);

        $query = $this->performanceModel->newQuery()->where('homestay_id', $homestayId);
        $this->applyPeriodFilters($query, $filters);

        $rows = $query->orderBy('tahun')->orderBy('bulan')
            ->get(['bulan', 'tahun', 'pelawat_domestik', 'pelawat_asing', 'pendapatan', 'sumber_lain'])
            ->map(fn (Performance $performance): array => $this->mapHomestayRow($performance, $homestay->nama))
            ->values()
            ->all();

        return [$this->homestayHeadings(), $rows, 'Laporan Prestasi Homestay'];
    }

    /**
     * @param  array<string, int|string|null>  $filters  expects negeri, optional year range
     * @return array{0: array<int,string>, 1: array<int, array<string, bool|float|int|string|null>>, 2: string}
     */
    private function buildNegeriPerformance(array $filters): array
    {
        $negeri = $this->extractNegeri($filters);

        $query = $this->performanceModel->newQuery()
            ->with('homestay:id,negeri')
            ->whereHas('homestay', fn (Builder $builder) => $builder->where('negeri', $negeri));

        $this->applyPeriodFilters($query, $filters);

        $rows = $this->aggregateNegeriRows(
            $negeri,
            $query->get(['bulan', 'tahun', 'pelawat_domestik', 'pelawat_asing', 'pendapatan', 'sumber_lain'])
        );

        return [$this->negeriHeadings(), $rows, 'Laporan Prestasi Negeri'];
    }

    /**
     * @param  array<string, int|string|null>  $filters
     */
    /**
     * @param  Builder<Performance>  $query
     * @param  array<string, int|string|null>  $filters
     */
    private function applyNegeriFilter(Builder $query, array $filters): void
    {
        if (! isset($filters['negeri'])) {
            return;
        }

        $query->whereHas('homestay', fn (Builder $builder) => $builder->where('negeri', (string) $filters['negeri']));
    }

    /**
     * @param  array<string, int|string|null>  $filters
     */
    /**
     * @param  Builder<Performance>  $query
     * @param  array<string, int|string|null>  $filters
     */
    private function applyPeriodFilters(Builder $query, array $filters): void
    {
        if (isset($filters['from_year'], $filters['from_month'], $filters['to_year'], $filters['to_month'])) {
            $query->betweenPeriods(
                (int) $filters['from_year'],
                (int) $filters['from_month'],
                (int) $filters['to_year'],
                (int) $filters['to_month']
            );
        }
    }

    /**
     * @param  array<string, int|string|null>  $filters
     */
    private function extractHomestayId(array $filters): int
    {
        $homestayId = isset($filters['homestay_id']) ? (int) $filters['homestay_id'] : 0;

        if ($homestayId <= 0) {
            throw new BusinessRuleException('homestay_id diperlukan untuk laporan prestasi homestay.');
        }

        return $homestayId;
    }

    private function findHomestayOrFail(int $homestayId): Homestay
    {
        $homestay = $this->homestayModel->newQuery()->find($homestayId);
        if ($homestay === null) {
            throw new NotFoundException('Homestay tidak ditemui.');
        }

        return $homestay;
    }

    /**
     * @param  array<string, int|string|null>  $filters
     */
    private function extractNegeri(array $filters): string
    {
        $negeri = isset($filters['negeri']) ? (string) $filters['negeri'] : '';

        if ($negeri === '') {
            throw new BusinessRuleException('negeri diperlukan untuk laporan prestasi negeri.');
        }

        return $negeri;
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
     * @return array<int, string>
     */
    private function homestayHeadings(): array
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
     * @return array<int, string>
     */
    private function negeriHeadings(): array
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
     * @return array<string, bool|float|int|string|null>
     */
    private function mapDashboardRow(Performance $performance): array
    {
        return [
            'Homestay ID' => $performance->homestay_id,
            'Bulan' => $performance->bulan,
            'Tahun' => $performance->tahun,
            'Pelawat Domestik' => $performance->pelawat_domestik,
            'Pelawat Asing' => $performance->pelawat_asing,
            'Jumlah Pelawat' => $performance->total_pelawat,
            'Pendapatan (RM)' => (float) $performance->pendapatan,
            'Sumber Lain (RM)' => (float) $performance->sumber_lain,
            'Jumlah Pendapatan (RM)' => (float) $performance->pendapatan + (float) $performance->sumber_lain,
        ];
    }

    /**
     * @return array<string, bool|float|int|string|null>
     */
    private function mapHomestayRow(Performance $performance, string $homestayName): array
    {
        return [
            'Homestay' => $homestayName,
            'Bulan' => $performance->bulan,
            'Tahun' => $performance->tahun,
            'Pelawat Domestik' => $performance->pelawat_domestik,
            'Pelawat Asing' => $performance->pelawat_asing,
            'Jumlah Pelawat' => $performance->total_pelawat,
            'Pendapatan (RM)' => (float) $performance->pendapatan,
            'Sumber Lain (RM)' => (float) $performance->sumber_lain,
            'Jumlah Pendapatan (RM)' => (float) $performance->pendapatan + (float) $performance->sumber_lain,
        ];
    }

    /**
     * @return array<int, array<string, bool|float|int|string|null>>
     */
    /**
     * @param  Collection<int, Performance>  $records
     * @return array<int, array<string, bool|float|int|string|null>>
     */
    private function aggregateNegeriRows(string $negeri, Collection $records): array
    {
        return $records
            ->groupBy(fn (Performance $performance) => sprintf('%04d-%02d', $performance->tahun, $performance->bulan))
            ->map(fn (Collection $items, string $periodKey): array => $this->mapNegeriRow($negeri, $periodKey, $items))
            ->sortBy([['Tahun', 'asc'], ['Bulan', 'asc']])
            ->values()
            ->all();
    }

    /**
     * @return array<string, bool|float|int|string|null>
     */
    /**
     * @param  Collection<int, Performance>  $items
     * @return array<string, bool|float|int|string|null>
     */
    private function mapNegeriRow(string $negeri, string $periodKey, Collection $items): array
    {
        [$year, $month] = array_map('intval', explode('-', $periodKey));

        $domestic = (int) $items->sum('pelawat_domestik');
        $international = (int) $items->sum('pelawat_asing');
        $primary = (float) $items->sum('pendapatan');
        $secondary = (float) $items->sum('sumber_lain');

        return [
            'Negeri' => $negeri,
            'Bulan' => $month,
            'Tahun' => $year,
            'Pelawat Domestik' => $domestic,
            'Pelawat Asing' => $international,
            'Jumlah Pelawat' => $domestic + $international,
            'Pendapatan (RM)' => round($primary, 2),
            'Sumber Lain (RM)' => round($secondary, 2),
            'Jumlah Pendapatan (RM)' => round($primary + $secondary, 2),
        ];
    }
}
