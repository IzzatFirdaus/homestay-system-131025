<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Import;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Form request for validating import preview requests.
 *
 * @method \App\Models\User|null user()
 * @method mixed input(string $key = null, mixed $default = null)
 * @method mixed route(string|null $param = null, mixed $default = null)
 * @method array<string, mixed> all()
 * @method \Illuminate\Http\UploadedFile|null file(string $key)
 */
final class PreviewImportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Import::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jenis_import' => [
                'required',
                'string',
                Rule::in(['homestay', 'cooperative', 'cluster', 'performance']),
            ],
            'file' => [
                'required',
                'file',
                'mimes:xlsx,xls,csv',
                'max:10240', // 10MB max
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
            'jenis_import' => __('validation.attributes.jenis_import'),
            'file' => __('validation.attributes.file'),
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
            'jenis_import.required' => __('validation.required', ['attribute' => __('validation.attributes.jenis_import')]),
            'jenis_import.in' => __('validation.in', ['attribute' => __('validation.attributes.jenis_import')]),
            'file.required' => __('validation.required', ['attribute' => __('validation.attributes.file')]),
            'file.mimes' => __('validation.custom.file.mimes', ['values' => 'Excel (xlsx, xls) atau CSV']),
            'file.max' => __('validation.custom.file.max', ['max' => '10MB']),
        ];
    }
}
