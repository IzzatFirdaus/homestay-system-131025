<?php

declare(strict_types=1);

return [
    'index' => [
        'title' => 'Senarai Homestay',
        'search_placeholder' => 'Cari homestay...',
        'negeri_all' => 'Semua Negeri',
        'status_all' => 'Semua Status',
        'actions' => [
            'create' => 'Tambah Homestay',
            'edit' => 'Kemaskini',
        ],
        'table' => [
            'name' => 'Nama',
            'state' => 'Negeri',
            'status' => 'Status',
            'actions' => 'Tindakan',
            'empty' => 'Tiada rekod homestay ditemui.',
        ],
        'pagination_summary' => 'Menunjukkan :from hingga :to daripada :total rekod',
    ],
    'form' => [
        'create_title' => 'Tambah Homestay',
        'edit_title' => 'Kemaskini Homestay',
        'fields' => [
            'name' => 'Nama Homestay',
            'address' => 'Alamat',
            'state' => 'Negeri',
            'status' => 'Status',
            'management_model' => 'Model Pengurusan',
            'cooperative' => 'Koperasi',
        ],
        'placeholders' => [
            'state' => 'Pilih Negeri',
            'cooperative' => 'Pilih Koperasi',
        ],
        'helpers' => [
            'cooperative_required' => 'Pilih koperasi apabila model pengurusan adalah koperasi.',
        ],
        'notifications' => [
            'created' => 'Homestay berjaya dicipta.',
            'updated' => 'Homestay berjaya dikemaskini.',
        ],
        'management_models' => [
            'individu' => 'Individu',
            'koperasi' => 'Koperasi',
        ],
    ],
];
