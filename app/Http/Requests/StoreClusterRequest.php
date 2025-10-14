<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Cluster;
use App\Rules\ValidStateCode;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Form request for storing a new cluster.
 *
 * @method \App\Models\User|null user()
 * @method mixed input(string $key, mixed $default = null)
 * @method array<string, mixed> all()
 */
class StoreClusterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Cluster::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'negeri' => ['required', 'string', 'max:50', new ValidStateCode],
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
            'negeri' => __('validation.attributes.negeri'),
        ];
    }
}
