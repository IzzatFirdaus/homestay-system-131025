<?php

declare(strict_types=1);

namespace App\Data;

/**
 * Transfer object describing a set of performance metrics for a Performance record.
 */
final class PerformanceData
{
    /**
     * @param  int  $homestayId  Target homestay identifier.
     * @param  int  $bulan  Month component (1-12).
     * @param  int  $tahun  Year component (>= 2000 per D09 §6.3 conventions).
     * @param  int  $pelawatDomestik  Domestic visitor count for the period.
     * @param  int  $pelawatAsing  International visitor count for the period.
     * @param  float  $pendapatan  Primary income in MYR.
     * @param  float  $sumberLain  Ancillary income in MYR.
     */
    public function __construct(
        public readonly int $homestayId,
        public readonly int $bulan,
        public readonly int $tahun,
        public readonly int $pelawatDomestik,
        public readonly int $pelawatAsing,
        public readonly float $pendapatan,
        public readonly float $sumberLain,
    ) {}

    /**
     * Create instance from array data (e.g., from HTTP request).
     *
     * @param  array<string, mixed>  $data
     */
    public static function from(array $data): self
    {
        return new self(
            homestayId: (int) $data['homestay_id'],
            bulan: (int) $data['bulan'],
            tahun: (int) $data['tahun'],
            pelawatDomestik: (int) $data['pelawat_domestik'],
            pelawatAsing: (int) $data['pelawat_asing'],
            pendapatan: (float) $data['pendapatan'],
            sumberLain: (float) ($data['sumber_lain'] ?? 0),
        );
    }
}
