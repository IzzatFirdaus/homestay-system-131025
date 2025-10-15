<?php

declare(strict_types=1);

return [
    'title' => 'Generate Report',
    'type' => 'Report Type',
    'type_placeholder' => '-- Select Report Type --',
    'types' => [
        'dashboard_summary' => 'Dashboard Summary',
        'homestay_performance' => 'Homestay Performance',
        'negeri_performance' => 'State Performance',
    ],
    'hint_choose_type' => 'Choose the type of report to generate',
    'start_date' => 'Start Date',
    'end_date' => 'End Date',
    'negeri' => 'State',
    'negeri_all' => '-- All States --',
    'homestay' => 'Homestay',
    'homestay_all' => '-- All Homestays --',
    'format' => 'File Format',
    'formats' => [
        'xlsx' => 'Excel (.xlsx)',
        'csv' => 'CSV (.csv)',
        'pdf' => 'PDF (.pdf)',
    ],
    'generate' => 'Generate Report',
    'info_title' => 'Report Information',
    'available_types' => 'Available Report Types:',
    'desc_dashboard' => 'Aggregate statistics for key KPIs.',
    'desc_homestay' => 'Performance analysis for an individual homestay or all homestays.',
    'desc_negeri' => 'Performance comparison across states.',
    'large_report_notice' => 'Large reports may take a few minutes to generate. You will receive a download link when it is ready.',
];
