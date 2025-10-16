<?php

declare(strict_types=1);

namespace App\Http\Requests\Homestay;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $homestay = $this->route('homestay');

        return $homestay && (Auth::user()?->can('update', $homestay) ?? false);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     *
     * @phpstan-return array<string, \Illuminate\Contracts\Validation\ValidationRule|list<string|\Illuminate\Validation\Rules\In|\Illuminate\Validation\Rules\Exists>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'negeri' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:500'],
            'kapasiti' => ['required', 'integer', 'min:0'],
            'fasiliti' => ['nullable', 'string'],
            'model_pengurusan' => ['required', 'string', Rule::in(['individu', 'koperasi'])],
            'cooperative_id' => ['nullable', 'integer', Rule::exists('cooperatives', 'id')],
            'status' => ['required', 'string', Rule::in(['Aktif', 'Tidak Aktif'])],
            'cluster_id' => ['nullable', 'integer', Rule::exists('clusters', 'id')],
        ];
    }
}
