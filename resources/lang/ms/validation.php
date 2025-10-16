<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted' => 'Medan :attribute mesti diterima.',
    'accepted_if' => 'Medan :attribute mesti diterima apabila :other adalah :value.',
    'active_url' => 'Medan :attribute bukan URL yang sah.',
    'after' => 'Medan :attribute mesti tarikh selepas :date.',
    'after_or_equal' => 'Medan :attribute mesti tarikh selepas atau sama dengan :date.',
    'alpha' => 'Medan :attribute hanya boleh mengandungi huruf.',
    'alpha_dash' => 'Medan :attribute hanya boleh mengandungi huruf, nombor, dan tanda sempung.',
    'alpha_num' => 'Medan :attribute hanya boleh mengandungi huruf dan nombor.',
    'array' => 'Medan :attribute mesti berupa larik.',
    'ascii' => 'Medan :attribute hanya boleh mengandungi aksara ASCII satu-bait.',
    'before' => 'Medan :attribute mesti tarikh sebelum :date.',
    'before_or_equal' => 'Medan :attribute mesti tarikh sebelum atau sama dengan :date.',
    'between' => [
        'array' => 'Medan :attribute mesti mempunyai antara :min dan :max item.',
        'file' => 'Medan :attribute mesti antara :min dan :max kilobait.',
        'numeric' => 'Medan :attribute mesti antara :min dan :max.',
        'string' => 'Medan :attribute mesti antara :min dan :max aksara.',
    ],
    'boolean' => 'Medan :attribute mesti benar atau salah.',
    'confirmed' => 'Pengesahan medan :attribute tidak sepadan.',
    'current_password' => 'Kata laluan tidak betul.',
    'date' => 'Medan :attribute bukan tarikh yang sah.',
    'date_equals' => 'Medan :attribute mesti tarikh yang sama dengan :date.',
    'date_format' => 'Medan :attribute tidak sepadan dengan format :format.',
    'declined' => 'Medan :attribute mesti ditolak.',
    'declined_if' => 'Medan :attribute mesti ditolak apabila :other adalah :value.',
    'different' => 'Medan :attribute dan :other mestilah berbeza.',
    'digits' => 'Medan :attribute mesti :digits digit.',
    'digits_between' => 'Medan :attribute mesti antara :min dan :max digit.',
    'dimensions' => 'Medan :attribute mempunyai dimensi imej yang tidak sah.',
    'distinct' => 'Medan :attribute mempunyai nilai yang berganda.',
    'email' => 'Medan :attribute mesti alamat e-mel yang sah.',
    'ends_with' => 'Medan :attribute mesti berakhir dengan salah satu daripada: :values.',
    'exists' => 'Pilihan :attribute yang dipilih tidak sah.',
    'file' => 'Medan :attribute mesti berupa fail.',
    'filled' => 'Medan :attribute mesti mempunyai nilai.',
    'gt' => [
        'array' => 'Medan :attribute mesti mempunyai lebih daripada :value item.',
        'file' => 'Medan :attribute mesti lebih besar daripada :value kilobait.',
        'numeric' => 'Medan :attribute mesti lebih besar daripada :value.',
        'string' => 'Medan :attribute mesti lebih besar daripada :value aksara.',
    ],
    'gte' => [
        'array' => 'Medan :attribute mesti mempunyai item :value atau lebih banyak.',
        'file' => 'Medan :attribute mesti lebih besar daripada atau sama dengan :value kilobait.',
        'numeric' => 'Medan :attribute mesti lebih besar daripada atau sama dengan :value.',
        'string' => 'Medan :attribute mesti lebih besar daripada atau sama dengan :value aksara.',
    ],
    'image' => 'Medan :attribute mesti berupa imej.',
    'in' => 'Pilihan :attribute yang dipilih tidak sah.',
    'in_array' => 'Medan :attribute mesti wujud dalam :other.',
    'integer' => 'Medan :attribute mesti berupa integer.',
    'ip' => 'Medan :attribute mesti alamat IP yang sah.',
    'ipv4' => 'Medan :attribute mesti alamat IPv4 yang sah.',
    'ipv6' => 'Medan :attribute mesti alamat IPv6 yang sah.',
    'json' => 'Medan :attribute mesti rentetan JSON yang sah.',
    'lt' => [
        'array' => 'Medan :attribute mesti mempunyai kurang daripada :value item.',
        'file' => 'Medan :attribute mesti kurang daripada :value kilobait.',
        'numeric' => 'Medan :attribute mesti kurang daripada :value.',
        'string' => 'Medan :attribute mesti kurang daripada :value aksara.',
    ],
    'lte' => [
        'array' => 'Medan :attribute tidak boleh mempunyai lebih daripada :value item.',
        'file' => 'Medan :attribute mesti kurang daripada atau sama dengan :value kilobait.',
        'numeric' => 'Medan :attribute mesti kurang daripada atau sama dengan :value.',
        'string' => 'Medan :attribute mesti kurang daripada atau sama dengan :value aksara.',
    ],
    'max' => [
        'array' => 'Medan :attribute tidak boleh mempunyai lebih daripada :max item.',
        'file' => 'Medan :attribute tidak boleh lebih besar daripada :max kilobait.',
        'numeric' => 'Medan :attribute tidak boleh lebih besar daripada :max.',
        'string' => 'Medan :attribute tidak boleh lebih besar daripada :max aksara.',
    ],
    'mimes' => 'Medan :attribute mesti berupa fail jenis: :values.',
    'mimetypes' => 'Medan :attribute mesti berupa fail jenis: :values.',
    'min' => [
        'array' => 'Medan :attribute mesti mempunyai sekurang-kurangnya :min item.',
        'file' => 'Medan :attribute mesti sekurang-kurangnya :min kilobait.',
        'numeric' => 'Medan :attribute mesti sekurang-kurangnya :min.',
        'string' => 'Medan :attribute mesti sekurang-kurangnya :min aksara.',
    ],
    'multiple_of' => 'Medan :attribute mesti gandaan :value.',
    'not_in' => 'Pilihan :attribute yang dipilih tidak sah.',
    'not_regex' => 'Format medan :attribute tidak sah.',
    'numeric' => 'Medan :attribute mesti berupa nombor.',
    'password' => 'Kata laluan tidak betul.',
    'present' => 'Medan :attribute mesti ada.',
    'regex' => 'Format medan :attribute tidak sah.',
    'required' => 'Medan :attribute adalah wajib.',
    'required_array_keys' => 'Medan :attribute mesti mengandungi entri untuk: :values.',
    'required_if' => 'Medan :attribute adalah wajib apabila :other adalah :value.',
    'required_unless' => 'Medan :attribute adalah wajib melainkan :other adalah :value.',
    'required_with' => 'Medan :attribute adalah wajib apabila :values ada.',
    'required_with_all' => 'Medan :attribute adalah wajib apabila :values ada.',
    'required_without' => 'Medan :attribute adalah wajib apabila :values tidak ada.',
    'required_without_all' => 'Medan :attribute adalah wajib apabila tiada :values ada.',
    'same' => 'Medan :attribute dan :other mestilah sepadan.',
    'size' => [
        'array' => 'Medan :attribute mesti mengandungi :size item.',
        'file' => 'Medan :attribute mestilah :size kilobait.',
        'numeric' => 'Medan :attribute mestilah :size.',
        'string' => 'Medan :attribute mestilah :size aksara.',
    ],
    'starts_with' => 'Medan :attribute mesti bermula dengan salah satu daripada: :values.',
    'string' => 'Medan :attribute mesti berupa rentetan.',
    'timezone' => 'Medan :attribute mesti zon masa yang sah.',
    'unique' => ':attribute sudah digunakan.',
    'uploaded' => 'Medan :attribute gagal dimuat naik.',
    'url' => 'Format medan :attribute tidak sah.',
    'uuid' => 'Medan :attribute mesti UUID yang sah.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute
    | placeholder with something more reader friendly like E-Mail
    | instead of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],
];
