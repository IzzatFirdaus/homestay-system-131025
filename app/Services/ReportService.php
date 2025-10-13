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
use Illuminate\Database\DatabaseManager;
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

    public function __construct(
        private readonly DatabaseManager $database,
        private readonly Performance $performanceModel,
        private readonly Homestay $homestayModel,
    ) {}

    /**
     * Generate a report file for the given type/filters and format.
     *
     * @param  array<string, mixed>  $filters  e.g. ['negeri' => 'Selangor', 'from' => '2025-01', 'to' => '2025-06', 'homestay_id' => 1]
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
            'pdf' => 'application/pdf',
            default => 'application/octet-stream',
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
     * @param  Collection<int, array<string, scalar|null>>  $rows
     */
    private function storeReport(array $headings, Collection $rows, string $format, string $filenameBase, string $type): string
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
     * @param  array<string, mixed>  $filters
     * @return array{0: array<int,string>, 1: Collection<int, array<string, scalar|null>>, 2: string}
     */
    private function buildDashboardSummary(array $filters): array
    {
        $query = $this->performanceModel->newQuery()->with('homestay:id,nama,negeri');

        if (isset($filters['negeri'])) {
            $query->whereHas('homestay', fn ($q) => $q->where('negeri', $filters['negeri']));
        }

        if (isset($filters['from_year'], $filters['from_month'], $filters['to_year'], $filters['to_month'])) {
            $query->betweenPeriods((int) $filters['from_year'], (int) $filters['from_month'], (int) $filters['to_year'], (int) $filters['to_month']);
        }

        $rows = $query->get(['homestay_id', 'bulan', 'tahun', 'pelawat_domestik', 'pelawat_asing', 'pendapatan', 'sumber_lain'])->map(
            function ($p) {
                /** @var \App\Models\Performance $p */
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
        );

        $headings = [
            'Homestay ID', 'Bulan', 'Tahun', 'Pelawat Domestik', 'Pelawat Asing', 'Jumlah Pelawat', 'Pendapatan (RM)', 'Sumber Lain (RM)', 'Jumlah Pendapatan (RM)',
        ];

        return [$headings, $rows->toBase(), 'Dashboard Summary'];
    }

    /**
     * @param  array<string, mixed>  $filters  expects homestay_id, optional year range
     * @return array{0: array<int,string>, 1: Collection<int, array<string, scalar|null>>, 2: string}
     */
    private function buildHomestayPerformance(array $filters): array
    {
        $homestayId = (int) ($filters['homestay_id'] ?? 0);
        if ($homestayId <= 0) {
            throw new BusinessRuleException('homestay_id diperlukan untuk laporan prestasi homestay.');
        }

        $homestay = $this->homestayModel->newQuery()->find($homestayId);
        if ($homestay === null) {
            throw new NotFoundException('Homestay tidak ditemui.');
        }

        $query = $this->performanceModel->newQuery()->where('homestay_id', $homestayId);

        if (isset($filters['from_year'], $filters['from_month'], $filters['to_year'], $filters['to_month'])) {
            $query->betweenPeriods((int) $filters['from_year'], (int) $filters['from_month'], (int) $filters['to_year'], (int) $filters['to_month']);
        }

        $rows = $query->orderBy('tahun')->orderBy('bulan')
            ->get(['bulan', 'tahun', 'pelawat_domestik', 'pelawat_asing', 'pendapatan', 'sumber_lain'])
            ->map(function ($p) use ($homestay) {
                /** @var \App\Models\Performance $p */
                return [
                    'Homestay' => $homestay->nama,
                    'Bulan' => $p->bulan,
                    'Tahun' => $p->tahun,
                    'Pelawat Domestik' => $p->pelawat_domestik,
                    'Pelawat Asing' => $p->pelawat_asing,
                    'Jumlah Pelawat' => $p->total_pelawat,
                    'Pendapatan (RM)' => (float) $p->pendapatan,
                    'Sumber Lain (RM)' => (float) $p->sumber_lain,
                    'Jumlah Pendapatan (RM)' => (float) $p->pendapatan + (float) $p->sumber_lain,
                ];
            });

        $headings = [
            'Homestay', 'Bulan', 'Tahun', 'Pelawat Domestik', 'Pelawat Asing', 'Jumlah Pelawat', 'Pendapatan (RM)', 'Sumber Lain (RM)', 'Jumlah Pendapatan (RM)',
        ];

        return [$headings, $rows->toBase(), 'Laporan Prestasi Homestay'];
    }

    /**
     * @param  array<string, mixed>  $filters  expects negeri, optional year range
     * @return array{0: array<int,string>, 1: Collection<int, array<string, scalar|null>>, 2: string}
     */
    private function buildNegeriPerformance(array $filters): array
    {
        $negeri = (string) ($filters['negeri'] ?? '');
        if ($negeri === '') {
            throw new BusinessRuleException('negeri diperlukan untuk laporan prestasi negeri.');
        }

        $query = $this->performanceModel->newQuery()->with('homestay:id,negeri')->whereHas('homestay', fn ($q) => $q->where('negeri', $negeri));

        if (isset($filters['from_year'], $filters['from_month'], $filters['to_year'], $filters['to_month'])) {
            $query->betweenPeriods((int) $filters['from_year'], (int) $filters['from_month'], (int) $filters['to_year'], (int) $filters['to_month']);
        }

        // Aggregate by month across all homestays in negeri
        $raw = $query->get(['bulan', 'tahun', 'pelawat_domestik', 'pelawat_asing', 'pendapatan', 'sumber_lain']);

        $grouped = $raw->groupBy(fn ($p) => sprintf('%04d-%02d', $p->tahun, $p->bulan));

        $rows = collect();
        foreach ($grouped as $periodKey => $items) {
            $parts = explode('-', $periodKey);
            $tahun = (int) $parts[0];
            $bulan = (int) $parts[1];

            $dom = (int) $items->sum('pelawat_domestik');
            $for = (int) $items->sum('pelawat_asing');
            $pend = (float) $items->sum('pendapatan');
            $lain = (float) $items->sum('sumber_lain');

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

        $rows = $rows->sortBy([['Tahun', 'asc'], ['Bulan', 'asc']])->values();

        $headings = [
            'Negeri', 'Bulan', 'Tahun', 'Pelawat Domestik', 'Pelawat Asing', 'Jumlah Pelawat', 'Pendapatan (RM)', 'Sumber Lain (RM)', 'Jumlah Pendapatan (RM)',
        ];

        return [$headings, $rows->toBase(), 'Laporan Prestasi Negeri'];
    }
}
