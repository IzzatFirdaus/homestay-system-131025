<?php

declare(strict_types=1);

namespace App\Data;

/**
 * Aggregated KPI metrics for a homestay within a date period.
 */
final class HomestayKpi
{
    /**
     * @param  int  $totalVisits  Sum of domestic and international visitors.
     * @param  int  $domesticVisits  Domestic visitor count.
     * @param  int  $internationalVisits  International visitor count.
     * @param  float  $totalRevenue  Combined revenue (pendapatan + sumber_lain).
     * @param  float  $averageMonthlyRevenue  Period average monthly revenue.
     */
    public function __construct(
        public readonly int $totalVisits,
        public readonly int $domesticVisits,
        public readonly int $internationalVisits,
        public readonly float $totalRevenue,
        public readonly float $averageMonthlyRevenue,
    ) {}
}
