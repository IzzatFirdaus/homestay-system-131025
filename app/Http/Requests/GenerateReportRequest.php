<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Data\ReportType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

/**
 * Validation request for report generation.
 */
class GenerateReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Authorization: Only users with 'generate-reports' permission
        return Auth::user()->hasPermissionTo('generate-reports');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, \Illuminate\Contracts\Validation\ValidationRule|string>|string>
     */
    public function rules(): array
    {
        /** @var array<string, array<int, \Illuminate\Contracts\Validation\ValidationRule|string>|string> */
        return [
            'type' => [
                'required',
                'string',
                Rule::in(array_map(fn (ReportType $t) => $t->value, ReportType::cases())),
            ],
            'format' => [
                'nullable',
                'string',
                Rule::in(['xlsx', 'csv', 'pdf']),
            ],
            'start_date' => [
                'nullable',
                'date',
                'date_format:Y-m-d',
                'before_or_equal:end_date',
            ],
            'end_date' => [
                'nullable',
                'date',
                'date_format:Y-m-d',
                'after_or_equal:start_date',
            ],
            'negeri' => [
                'nullable',
                'string',
                'max:100',
            ],
            'homestay_id' => [
                'nullable',
                'integer',
                'exists:homestays,id',
            ],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'type.required' => 'Jenis laporan mesti dipilih.',
            'type.in' => 'Jenis laporan tidak sah.',
            'format.in' => 'Format fail mesti xlsx, csv, atau pdf.',
            'start_date.date' => 'Tarikh mula mesti dalam format yang sah.',
            'start_date.date_format' => 'Tarikh mula mesti dalam format YYYY-MM-DD.',
            'start_date.before_or_equal' => 'Tarikh mula mesti sebelum atau sama dengan tarikh akhir.',
            'end_date.date' => 'Tarikh akhir mesti dalam format yang sah.',
            'end_date.date_format' => 'Tarikh akhir mesti dalam format YYYY-MM-DD.',
            'end_date.after_or_equal' => 'Tarikh akhir mesti selepas atau sama dengan tarikh mula.',
            'homestay_id.exists' => 'Homestay yang dipilih tidak wujud.',
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
            'type' => 'jenis laporan',
            'format' => 'format fail',
            'start_date' => 'tarikh mula',
            'end_date' => 'tarikh akhir',
            'negeri' => 'negeri',
            'homestay_id' => 'homestay',
        ];
    }
}
