<?php

declare(strict_types=1);

namespace App\Services\Import;

use App\Data\ImportRowError;
use Illuminate\Support\Facades\Validator;

/**
 * Validates normalized import rows based on the requested domain type.
 */
final class RowValidator
{
    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    public function validate(string $type, array $row, int $rowNumber): ?ImportRowError
    {
        $rules = $this->rulesForType($type);
        if ($rules === []) {
            return null;
        }

        $validator = Validator::make($row, $rules);

        if ($validator->fails()) {
            $message = implode(' ', $validator->errors()->all());

            return new ImportRowError($rowNumber, $message);
        }

        return null;
    }

    /**
     * @return array<string, string>
     */
    private function rulesForType(string $type): array
    {
        return match (strtolower($type)) {
            'homestays' => [
                'nama' => 'required|string|max:255',
                'negeri' => 'required|string|max:50',
                'kapasiti' => 'required|numeric|min:0',
                'model_pengurusan' => 'required|in:koperasi,individu',
                'status' => 'required|in:Aktif,Tidak Aktif',
            ],
            'performances' => [
                'homestay_id' => 'required|integer|min:1',
                'bulan' => 'required|integer|between:1,12',
                'tahun' => 'required|integer|min:2000',
                'pelawat_domestik' => 'required|numeric|min:0',
                'pelawat_asing' => 'required|numeric|min:0',
                'pendapatan' => 'required|numeric|min:0',
                'sumber_lain' => 'nullable|numeric|min:0',
            ],
            default => [],
        };
    }
}
