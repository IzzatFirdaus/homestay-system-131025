<?php

declare(strict_types=1);

return [
    'title' => 'Import Data',
    'form' => [
        'type_label' => 'Jenis Import',
        'type_placeholder' => 'Pilih jenis import',
        'file_label' => 'Fail Excel/CSV',
        'file_help' => 'Format dibenarkan: .xlsx, .xls, .csv (Maksimum 50MB)',
        'submit' => 'Muat Naik & Proses',
    ],
    'table' => [
        'filename' => 'Nama Fail',
        'type' => 'Jenis',
        'status' => 'Status',
        'progress' => 'Kemajuan',
        'created_at' => 'Tarikh',
        'actions' => 'Tindakan',
        'empty' => 'Tiada rekod import. Muat naik fail pertama anda menggunakan borang di atas.',
    ],
    'show' => [
        'details' => 'Maklumat Fail',
        'status' => 'Status',
        'statistics' => 'Statistik',
        'total_rows' => 'Jumlah Baris',
        'processed_rows' => 'Diproses',
        'success_rows' => 'Berjaya',
        'failed_rows' => 'Gagal',
        'download_errors' => 'Muat Turun Laporan Ralat',
        'back' => 'Kembali',
    ],
];
