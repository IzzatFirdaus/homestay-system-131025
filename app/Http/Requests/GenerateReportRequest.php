<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\ValidStateCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Form request for generating a report.
 *
 * Validates report generation parameters including type, date range, and filters.
 *
 * @method \App\Models\User|null user()
 * @method mixed input(string $key, mixed $default = null)
 * @method array<string, mixed> all()
 */
class GenerateReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // All authenticated users can generate reports within their scope
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jenis_laporan' => [
                'required',
                'string',
                Rule::in(['nasional', 'negeri', 'koperasi', 'homestay', 'prestasi']),
            ],
            'format' => [
                'required',
                'string',
                Rule::in(['pdf', 'excel', 'csv']),
            ],
            'tarikh_mula' => [
                'required',
                'date',
                'before_or_equal:tarikh_akhir',
            ],
            'tarikh_akhir' => [
                'required',
                'date',
                'after_or_equal:tarikh_mula',
            ],
            'negeri' => [
                'nullable',
                'string',
                'max:50',
                new ValidStateCode,
            ],
            'cooperative_id' => [
                'nullable',
                'integer',
                Rule::exists('cooperatives', 'id'),
            ],
            'homestay_id' => [
                'nullable',
                'integer',
                Rule::exists('homestays', 'id'),
            ],
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
            'jenis_laporan' => __('validation.attributes.jenis_laporan'),
            'format' => __('validation.attributes.format'),
            'tarikh_mula' => __('validation.attributes.tarikh_mula'),
            'tarikh_akhir' => __('validation.attributes.tarikh_akhir'),
            'negeri' => __('validation.attributes.negeri'),
            'cooperative_id' => __('validation.attributes.cooperative_id'),
            'homestay_id' => __('validation.attributes.homestay_id'),
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
            'jenis_laporan.required' => __('validation.required', ['attribute' => __('validation.attributes.jenis_laporan')]),
            'jenis_laporan.in' => __('validation.in', ['attribute' => __('validation.attributes.jenis_laporan')]),
            'format.required' => __('validation.required', ['attribute' => __('validation.attributes.format')]),
            'format.in' => __('validation.in', ['attribute' => __('validation.attributes.format')]),
            'tarikh_mula.required' => __('validation.required', ['attribute' => __('validation.attributes.tarikh_mula')]),
            'tarikh_mula.date' => __('validation.date', ['attribute' => __('validation.attributes.tarikh_mula')]),
            'tarikh_mula.before_or_equal' => __('validation.before_or_equal', ['attribute' => __('validation.attributes.tarikh_mula'), 'date' => __('validation.attributes.tarikh_akhir')]),
            'tarikh_akhir.required' => __('validation.required', ['attribute' => __('validation.attributes.tarikh_akhir')]),
            'tarikh_akhir.date' => __('validation.date', ['attribute' => __('validation.attributes.tarikh_akhir')]),
            'tarikh_akhir.after_or_equal' => __('validation.after_or_equal', ['attribute' => __('validation.attributes.tarikh_akhir'), 'date' => __('validation.attributes.tarikh_mula')]),
        ];
    }
}
