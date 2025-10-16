<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreHomestayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()?->can('create', \App\Models\Homestay::class) ?? false;
    }

    /** @return array<string, string|array<int, string|\Illuminate\Validation\Rules\In>> */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'negeri' => ['required', 'string', Rule::in(array_keys(config('app.negeri')))],
            'kapasiti' => 'required|integer|min:0',
            'fasiliti' => 'nullable|string',
            'model_pengurusan' => ['required', 'string', Rule::in(['individu', 'koperasi'])],
            'cooperative_id' => 'nullable|required_if:model_pengurusan,koperasi|exists:cooperatives,id',
            'status' => ['required', 'string', Rule::in(['Aktif', 'Tidak Aktif'])],
            'cluster_id' => 'nullable|exists:clusters,id',
        ];
    }
}
