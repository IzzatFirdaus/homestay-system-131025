<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines (Malay)
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute mesti diterima.',
    'accepted_if' => ':attribute mesti diterima apabila :other adalah :value.',
    'active_url' => ':attribute bukan URL yang sah.',
    'after' => ':attribute mesti tarikh selepas :date.',
    'after_or_equal' => ':attribute mesti tarikh selepas atau sama dengan :date.',
    'alpha' => ':attribute hanya boleh mengandungi huruf.',
    'alpha_dash' => ':attribute hanya boleh mengandungi huruf, nombor, sengkang dan garis bawah.',
    'alpha_num' => ':attribute hanya boleh mengandungi huruf dan nombor.',
    'array' => ':attribute mesti jenis array.',
    'ascii' => ':attribute hanya boleh mengandungi aksara dan simbol abjad numerik satu bait.',
    'before' => ':attribute mesti tarikh sebelum :date.',
    'before_or_equal' => ':attribute mesti tarikh sebelum atau sama dengan :date.',
    'between' => [
        'array' => ':attribute mesti mengandungi antara :min dan :max item.',
        'file' => ':attribute mesti antara :min dan :max kilobait.',
        'numeric' => ':attribute mesti antara :min dan :max.',
        'string' => ':attribute mesti antara :min dan :max aksara.',
    ],
    'boolean' => ':attribute mesti benar atau salah.',
    'can' => ':attribute mengandungi nilai yang tidak dibenarkan.',
    'confirmed' => 'Pengesahan :attribute tidak sepadan.',
    'contains' => ':attribute tidak mengandungi nilai yang diperlukan.',
    'current_password' => 'Kata laluan tidak betul.',
    'date' => ':attribute bukan tarikh yang sah.',
    'date_equals' => ':attribute mesti tarikh sama dengan :date.',
    'date_format' => ':attribute tidak sepadan dengan format :format.',
    'decimal' => ':attribute mesti mempunyai :decimal tempat perpuluhan.',
    'declined' => ':attribute mesti ditolak.',
    'declined_if' => ':attribute mesti ditolak apabila :other adalah :value.',
    'different' => ':attribute dan :other mesti berbeza.',
    'digits' => ':attribute mesti :digits digit.',
    'digits_between' => ':attribute mesti antara :min dan :max digit.',
    'dimensions' => ':attribute mempunyai dimensi imej yang tidak sah.',
    'distinct' => ':attribute mempunyai nilai pendua.',
    'doesnt_end_with' => ':attribute tidak boleh berakhir dengan salah satu daripada yang berikut: :values.',
    'doesnt_start_with' => ':attribute tidak boleh bermula dengan salah satu daripada yang berikut: :values.',
    'email' => ':attribute mesti alamat e-mel yang sah.',
    'ends_with' => ':attribute mesti berakhir dengan salah satu daripada yang berikut: :values.',
    'enum' => ':attribute yang dipilih tidak sah.',
    'exists' => ':attribute yang dipilih tidak sah.',
    'extensions' => ':attribute mesti mempunyai salah satu sambungan berikut: :values.',
    'file' => ':attribute mesti fail.',
    'filled' => ':attribute mesti mempunyai nilai.',
    'gt' => [
        'array' => ':attribute mesti mempunyai lebih daripada :value item.',
        'file' => ':attribute mesti lebih besar daripada :value kilobait.',
        'numeric' => ':attribute mesti lebih besar daripada :value.',
        'string' => ':attribute mesti lebih besar daripada :value aksara.',
    ],
    'gte' => [
        'array' => ':attribute mesti mempunyai :value item atau lebih.',
        'file' => ':attribute mesti lebih besar daripada atau sama dengan :value kilobait.',
        'numeric' => ':attribute mesti lebih besar daripada atau sama dengan :value.',
        'string' => ':attribute mesti lebih besar daripada atau sama dengan :value aksara.',
    ],
    'hex_color' => ':attribute mesti warna heksadesimal yang sah.',
    'image' => ':attribute mesti imej.',
    'in' => ':attribute yang dipilih tidak sah.',
    'in_array' => ':attribute tidak wujud dalam :other.',
    'integer' => ':attribute mesti integer.',
    'ip' => ':attribute mesti alamat IP yang sah.',
    'ipv4' => ':attribute mesti alamat IPv4 yang sah.',
    'ipv6' => ':attribute mesti alamat IPv6 yang sah.',
    'json' => ':attribute mesti rentetan JSON yang sah.',
    'list' => ':attribute mesti senarai.',
    'lowercase' => ':attribute mesti huruf kecil.',
    'lt' => [
        'array' => ':attribute mesti mempunyai kurang daripada :value item.',
        'file' => ':attribute mesti kurang daripada :value kilobait.',
        'numeric' => ':attribute mesti kurang daripada :value.',
        'string' => ':attribute mesti kurang daripada :value aksara.',
    ],
    'lte' => [
        'array' => ':attribute tidak boleh mempunyai lebih daripada :value item.',
        'file' => ':attribute mesti kurang daripada atau sama dengan :value kilobait.',
        'numeric' => ':attribute mesti kurang daripada atau sama dengan :value.',
        'string' => ':attribute mesti kurang daripada atau sama dengan :value aksara.',
    ],
    'mac_address' => ':attribute mesti alamat MAC yang sah.',
    'max' => [
        'array' => ':attribute tidak boleh mempunyai lebih daripada :max item.',
        'file' => ':attribute tidak boleh lebih besar daripada :max kilobait.',
        'numeric' => ':attribute tidak boleh lebih besar daripada :max.',
        'string' => ':attribute tidak boleh lebih besar daripada :max aksara.',
    ],
    'max_digits' => ':attribute tidak boleh mempunyai lebih daripada :max digit.',
    'mimes' => ':attribute mesti fail jenis: :values.',
    'mimetypes' => ':attribute mesti fail jenis: :values.',
    'min' => [
        'array' => ':attribute mesti mempunyai sekurang-kurangnya :min item.',
        'file' => ':attribute mesti sekurang-kurangnya :min kilobait.',
        'numeric' => ':attribute mesti sekurang-kurangnya :min.',
        'string' => ':attribute mesti sekurang-kurangnya :min aksara.',
    ],
    'min_digits' => ':attribute mesti mempunyai sekurang-kurangnya :min digit.',
    'missing' => ':attribute mesti tiada.',
    'missing_if' => ':attribute mesti tiada apabila :other adalah :value.',
    'missing_unless' => ':attribute mesti tiada melainkan :other adalah :value.',
    'missing_with' => ':attribute mesti tiada apabila :values hadir.',
    'missing_with_all' => ':attribute mesti tiada apabila :values hadir.',
    'multiple_of' => ':attribute mesti gandaan :value.',
    'not_in' => ':attribute yang dipilih tidak sah.',
    'not_regex' => 'Format :attribute tidak sah.',
    'numeric' => ':attribute mesti nombor.',
    'password' => [
        'letters' => ':attribute mesti mengandungi sekurang-kurangnya satu huruf.',
        'mixed' => ':attribute mesti mengandungi sekurang-kurangnya satu huruf besar dan satu huruf kecil.',
        'numbers' => ':attribute mesti mengandungi sekurang-kurangnya satu nombor.',
        'symbols' => ':attribute mesti mengandungi sekurang-kurangnya satu simbol.',
        'uncompromised' => ':attribute yang diberikan telah muncul dalam kebocoran data. Sila pilih :attribute yang berbeza.',
    ],
    'present' => ':attribute mesti hadir.',
    'present_if' => ':attribute mesti hadir apabila :other adalah :value.',
    'present_unless' => ':attribute mesti hadir melainkan :other adalah :value.',
    'present_with' => ':attribute mesti hadir apabila :values hadir.',
    'present_with_all' => ':attribute mesti hadir apabila :values hadir.',
    'prohibited' => ':attribute dilarang.',
    'prohibited_if' => ':attribute dilarang apabila :other adalah :value.',
    'prohibited_unless' => ':attribute dilarang melainkan :other ada dalam :values.',
    'prohibits' => ':attribute melarang :other daripada hadir.',
    'regex' => 'Format :attribute tidak sah.',
    'required' => ':attribute diperlukan.',
    'required_array_keys' => ':attribute mesti mengandungi entri untuk: :values.',
    'required_if' => ':attribute diperlukan apabila :other adalah :value.',
    'required_if_accepted' => ':attribute diperlukan apabila :other diterima.',
    'required_if_declined' => ':attribute diperlukan apabila :other ditolak.',
    'required_unless' => ':attribute diperlukan melainkan :other ada dalam :values.',
    'required_with' => ':attribute diperlukan apabila :values hadir.',
    'required_with_all' => ':attribute diperlukan apabila :values hadir.',
    'required_without' => ':attribute diperlukan apabila :values tidak hadir.',
    'required_without_all' => ':attribute diperlukan apabila tiada :values hadir.',
    'same' => ':attribute dan :other mesti sepadan.',
    'size' => [
        'array' => ':attribute mesti mengandungi :size item.',
        'file' => ':attribute mesti :size kilobait.',
        'numeric' => ':attribute mesti :size.',
        'string' => ':attribute mesti :size aksara.',
    ],
    'starts_with' => ':attribute mesti bermula dengan salah satu daripada yang berikut: :values.',
    'string' => ':attribute mesti rentetan.',
    'timezone' => ':attribute mesti zon waktu yang sah.',
    'unique' => ':attribute telah diambil.',
    'uploaded' => ':attribute gagal dimuat naik.',
    'uppercase' => ':attribute mesti huruf besar.',
    'url' => ':attribute mesti URL yang sah.',
    'ulid' => ':attribute mesti ULID yang sah.',
    'uuid' => ':attribute mesti UUID yang sah.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "rule.attribute" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'file' => [
            'max' => 'Fail tidak boleh melebihi :max kilobait.',
            'mimes' => 'Fail mesti jenis: :values.',
        ],
        'bulan' => [
            'between' => 'Bulan mesti antara 1 dan 12.',
        ],
        'tahun' => [
            'min' => 'Tahun mesti sekurang-kurangnya :min.',
            'max' => 'Tahun tidak boleh melebihi :max.',
        ],
    ],

    'performance' => [
        'unique_monthly' => 'Rekod prestasi untuk homestay :homestay_id bulan :bulan tahun :tahun sudah wujud.',
    ],

    'state' => [
        'invalid' => 'Negeri :value tidak sah. Sila pilih dari: :states.',
        'invalid_type' => 'Kod negeri mesti rentetan.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'nama' => 'nama',
        'nama_homestay' => 'nama homestay',
        'negeri' => 'negeri',
        'alamat' => 'alamat',
        'daerah' => 'daerah',
        'kapasiti' => 'kapasiti',
        'fasiliti' => 'fasiliti',
        'model_pengurusan' => 'model pengurusan',
        'id_koperasi' => 'ID koperasi',
        'cooperative_id' => 'ID koperasi',
        'cluster_id' => 'ID kluster',
        'status' => 'status',
        'homestay_id' => 'ID homestay',
        'bulan' => 'bulan',
        'tahun' => 'tahun',
        'pelawat_domestik' => 'pelawat domestik',
        'pelawat_asing' => 'pelawat asing',
        'pendapatan' => 'pendapatan',
        'sumber_lain' => 'sumber lain',
        'email' => 'e-mel',
        'password' => 'kata laluan',
        'password_confirmation' => 'pengesahan kata laluan',
        'name' => 'nama',
        'jenis_import' => 'jenis import',
        'file' => 'fail',
        'jenis_laporan' => 'jenis laporan',
        'tarikh_mula' => 'tarikh mula',
        'tarikh_akhir' => 'tarikh akhir',
        'format' => 'format',
    ],
];
