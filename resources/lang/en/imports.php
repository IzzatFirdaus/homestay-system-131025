<?php

declare(strict_types=1);

return [
    'title' => 'Data Import',
    'form' => [
        'type_label' => 'Import Type',
        'type_placeholder' => 'Select an import type',
        'file_label' => 'Excel/CSV File',
        'file_help' => 'Allowed formats: .xlsx, .xls, .csv (Maximum 50MB)',
        'submit' => 'Upload & Process',
    ],
    'table' => [
        'filename' => 'File Name',
        'type' => 'Type',
        'status' => 'Status',
        'progress' => 'Progress',
        'created_at' => 'Date',
        'actions' => 'Actions',
        'empty' => 'No import records yet. Upload your first file using the form above.',
    ],
    'show' => [
        'details' => 'File Details',
        'status' => 'Status',
        'statistics' => 'Statistics',
        'total_rows' => 'Total Rows',
        'processed_rows' => 'Processed',
        'success_rows' => 'Successful',
        'failed_rows' => 'Failed',
        'download_errors' => 'Download Error Report',
        'back' => 'Back',
    ],
];
