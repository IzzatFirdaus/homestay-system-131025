<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Performance;
use App\Rules\UniquePerformancePerMonth;
use App\Rules\ValidMonthYear;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Form request for storing new performance data.
 *
 * Validates all required fields and ensures no duplicate monthly records.
 *
 * @method \App\Models\User|null user()
 * @method mixed input(string $key, mixed $default = null)
 * @method array<string, mixed> all()
 */
class StorePerformanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Performance::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'homestay_id' => ['required', 'integer', Rule::exists('homestays', 'id')],
            'bulan' => ['required', 'integer', 'between:1,12', new ValidMonthYear('month')],
            'tahun' => ['required', 'integer', 'min:2000', new ValidMonthYear('year')],
            'pelawat_domestik' => ['required', 'integer', 'min:0', 'max:999999'],
            'pelawat_asing' => ['required', 'integer', 'min:0', 'max:999999'],
            'pendapatan' => ['required', 'numeric', 'min:0', 'max:9999999999.99'],
            'sumber_lain' => ['required', 'numeric', 'min:0', 'max:9999999999.99'],
            'homestay_id_check' => [new UniquePerformancePerMonth],
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
            'homestay_id' => __('validation.attributes.homestay_id'),
            'bulan' => __('validation.attributes.bulan'),
            'tahun' => __('validation.attributes.tahun'),
            'pelawat_domestik' => __('validation.attributes.pelawat_domestik'),
            'pelawat_asing' => __('validation.attributes.pelawat_asing'),
            'pendapatan' => __('validation.attributes.pendapatan'),
            'sumber_lain' => __('validation.attributes.sumber_lain'),
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
            'homestay_id.required' => __('validation.required', ['attribute' => __('validation.attributes.homestay_id')]),
            'homestay_id.exists' => __('validation.exists', ['attribute' => __('validation.attributes.homestay_id')]),
            'bulan.required' => __('validation.required', ['attribute' => __('validation.attributes.bulan')]),
            'bulan.between' => __('validation.custom.bulan.between'),
            'tahun.required' => __('validation.required', ['attribute' => __('validation.attributes.tahun')]),
            'tahun.min' => __('validation.custom.tahun.min', ['min' => 2000]),
            'pelawat_domestik.required' => __('validation.required', ['attribute' => __('validation.attributes.pelawat_domestik')]),
            'pelawat_domestik.min' => __('validation.min.numeric', ['attribute' => __('validation.attributes.pelawat_domestik'), 'min' => 0]),
            'pelawat_asing.required' => __('validation.required', ['attribute' => __('validation.attributes.pelawat_asing')]),
            'pelawat_asing.min' => __('validation.min.numeric', ['attribute' => __('validation.attributes.pelawat_asing'), 'min' => 0]),
            'pendapatan.required' => __('validation.required', ['attribute' => __('validation.attributes.pendapatan')]),
            'pendapatan.min' => __('validation.min.numeric', ['attribute' => __('validation.attributes.pendapatan'), 'min' => 0]),
            'sumber_lain.required' => __('validation.required', ['attribute' => __('validation.attributes.sumber_lain')]),
            'sumber_lain.min' => __('validation.min.numeric', ['attribute' => __('validation.attributes.sumber_lain'), 'min' => 0]),
        ];
    }
}
