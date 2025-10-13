<?php

declare(strict_types=1);

namespace App\Data;

/**
 * Enumerates supported report types for the reporting service.
 */
enum ReportType: string
{
    case DashboardSummary = 'dashboard_summary';
    case HomestayPerformance = 'homestay_performance';
    case NegeriPerformance = 'negeri_performance';
}
