<?php

declare(strict_types=1);

return [
    'title' => 'Import Data',
    'subtitle' => 'Muat naik fail Excel atau CSV untuk mengimport data homestay atau prestasi',
    'labels' => [
        'type' => 'Jenis Import',
        'file' => 'Fail Excel/CSV',
        'progress' => 'Kemajuan Muat Naik',
    ],
    'buttons' => [
        'upload' => 'Muat Naik',
        'reset' => 'Tetapkan Semula',
    ],
    'help' => [
        'type' => 'Pilih jenis data yang ingin diimport',
        'file' => 'Format dibenarkan: .xlsx, .xls, .csv (Maksimum 50MB)',
    ],
    'types' => [
        'homestay' => 'Data Homestay',
        'performance' => 'Data Prestasi',
    ],
    'info' => [
        'formats' => 'Format Disokong',
        'max_size' => 'Saiz Maksimum',
    ],
    'messages' => [
        'uploading' => 'Sedang memproses muat naik...',
        'upload_success' => 'Fail :filename berjaya dimuat naik. Data akan diproses secara latar belakang.',
        'upload_error' => 'Ralat semasa memuat naik fail: :error',
    ],
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
