<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UploadImportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->hasPermissionTo('import-data');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => 'required|file|mimes:xlsx,xls,csv|max:51200', // Max 50MB
            'type' => 'required|string|in:homestays,performances,cooperatives',
        ];
    }

    /**
     * Get custom error messages for validator.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'file.required' => 'Sila pilih fail untuk dimuat naik.',
            'file.file' => 'Fail yang dipilih tidak sah.',
            'file.mimes' => 'Fail mesti dalam format Excel (.xlsx, .xls) atau CSV (.csv).',
            'file.max' => 'Saiz fail tidak boleh melebihi 50MB.',
            'type.required' => 'Sila pilih jenis import.',
            'type.in' => 'Jenis import yang dipilih tidak sah.',
        ];
    }

    /**
     * Get custom attribute names for validator.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'file' => 'fail',
            'type' => 'jenis import',
        ];
    }
}
