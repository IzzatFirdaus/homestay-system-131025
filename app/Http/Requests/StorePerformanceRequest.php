<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePerformanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->can('create', \App\Models\Performance::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'homestay_id' => 'required|integer|exists:homestays,id',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000|max:'.(date('Y') + 1),
            'pelawat_domestik' => 'required|integer|min:0',
            'pelawat_asing' => 'required|integer|min:0',
            'pendapatan' => 'required|numeric|min:0',
            'sumber_lain' => 'nullable|numeric|min:0',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'homestay_id' => __('Homestay'),
            'bulan' => __('Bulan'),
            'tahun' => __('Tahun'),
            'pelawat_domestik' => __('Pelawat Domestik'),
            'pelawat_asing' => __('Pelawat Asing'),
            'pendapatan' => __('Pendapatan'),
            'sumber_lain' => __('Sumber Lain'),
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'homestay_id.required' => __('Sila pilih homestay.'),
            'homestay_id.exists' => __('Homestay yang dipilih tidak wujud.'),
            'bulan.required' => __('Sila pilih bulan.'),
            'bulan.min' => __('Bulan mesti antara 1 hingga 12.'),
            'bulan.max' => __('Bulan mesti antara 1 hingga 12.'),
            'tahun.required' => __('Sila masukkan tahun.'),
            'tahun.min' => __('Tahun mesti bermula dari 2000.'),
            'pelawat_domestik.required' => __('Sila masukkan bilangan pelawat domestik.'),
            'pelawat_domestik.min' => __('Bilangan pelawat tidak boleh negatif.'),
            'pelawat_asing.required' => __('Sila masukkan bilangan pelawat asing.'),
            'pelawat_asing.min' => __('Bilangan pelawat tidak boleh negatif.'),
            'pendapatan.required' => __('Sila masukkan jumlah pendapatan.'),
            'pendapatan.min' => __('Pendapatan tidak boleh negatif.'),
            'sumber_lain.min' => __('Sumber lain tidak boleh negatif.'),
        ];
    }
}
