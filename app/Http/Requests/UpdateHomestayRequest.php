<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Homestay;
use App\Rules\ValidStateCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Form request for updating an existing homestay.
 *
 * Validates all required fields and business rules for updating a homestay.
 *
 * @method \App\Models\User|null user()
 * @method mixed input(string $key, mixed $default = null)
 * @method array<string, mixed> all()
 * @method mixed route(string $param = null, mixed $default = null)
 */
class UpdateHomestayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /** @var Homestay $homestay */
        $homestay = $this->route('homestay');

        return $this->user()->can('update', $homestay);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['sometimes', 'required', 'string', 'max:255'],
            'nama_homestay' => ['nullable', 'string', 'max:255'],
            'negeri' => ['sometimes', 'required', 'string', 'max:50', new ValidStateCode],
            'alamat' => ['nullable', 'string', 'max:1000'],
            'daerah' => ['nullable', 'string', 'max:100'],
            'kapasiti' => ['sometimes', 'required', 'integer', 'min:1', 'max:1000'],
            'fasiliti' => ['nullable', 'string', 'max:5000'],
            'model_pengurusan' => ['sometimes', 'required', 'string', Rule::in(['koperasi', 'individu'])],
            'id_koperasi' => [
                'nullable',
                'integer',
                Rule::exists('cooperatives', 'id'),
                'required_if:model_pengurusan,koperasi',
            ],
            'cluster_id' => ['nullable', 'integer', Rule::exists('clusters', 'id')],
            'status' => ['sometimes', 'required', 'string', Rule::in(['Aktif', 'Tidak Aktif'])],
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
            'nama' => __('validation.attributes.nama'),
            'nama_homestay' => __('validation.attributes.nama_homestay'),
            'negeri' => __('validation.attributes.negeri'),
            'alamat' => __('validation.attributes.alamat'),
            'daerah' => __('validation.attributes.daerah'),
            'kapasiti' => __('validation.attributes.kapasiti'),
            'fasiliti' => __('validation.attributes.fasiliti'),
            'model_pengurusan' => __('validation.attributes.model_pengurusan'),
            'id_koperasi' => __('validation.attributes.id_koperasi'),
            'cluster_id' => __('validation.attributes.cluster_id'),
            'status' => __('validation.attributes.status'),
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
            'nama.required' => __('validation.required', ['attribute' => __('validation.attributes.nama')]),
            'negeri.required' => __('validation.required', ['attribute' => __('validation.attributes.negeri')]),
            'kapasiti.required' => __('validation.required', ['attribute' => __('validation.attributes.kapasiti')]),
            'kapasiti.min' => __('validation.min.numeric', ['attribute' => __('validation.attributes.kapasiti'), 'min' => 1]),
            'model_pengurusan.required' => __('validation.required', ['attribute' => __('validation.attributes.model_pengurusan')]),
            'model_pengurusan.in' => __('validation.in', ['attribute' => __('validation.attributes.model_pengurusan')]),
            'id_koperasi.required_if' => 'ID koperasi diperlukan untuk model pengurusan koperasi.',
            'status.required' => __('validation.required', ['attribute' => __('validation.attributes.status')]),
        ];
    }
}
