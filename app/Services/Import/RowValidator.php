<?php

declare(strict_types=1);

namespace App\Services\Import;

use App\Data\ImportRowError;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 * Performs lightweight validation for normalized import rows.
 */
final class RowValidator
{
    private const HOMESTAY_MODELS = ['koperasi', 'individu'];

    private const HOMESTAY_STATUSES = ['Aktif', 'Tidak Aktif'];

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    public function validate(string $type, array $row, int $rowNumber): ?ImportRowError
    {
        return match (strtolower($type)) {
            'homestays' => $this->validateHomestay($row, $rowNumber),
            'performances' => $this->validatePerformance($row, $rowNumber),
            default => new ImportRowError($rowNumber, 'Jenis import tidak disokong.', ['type' => $type]),
        };
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    private function validateHomestay(array $row, int $rowNumber): ?ImportRowError
    {
        [$normalized, $rules, $messages] = $this->homestayRules($row);

        return $this->validateWith($normalized, $rules, $messages, $rowNumber);
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    private function validatePerformance(array $row, int $rowNumber): ?ImportRowError
    {
        [$normalized, $rules, $messages] = $this->performanceRules($row);

        return $this->validateWith($normalized, $rules, $messages, $rowNumber);
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $normalized
     * @param  array<string, array<int, mixed>>  $rules
     * @param  array<string, string>  $messages
     */
    private function validateWith(array $normalized, array $rules, array $messages, int $rowNumber): ?ImportRowError
    {
        $validator = Validator::make($normalized, $rules, $messages);

        if (! $validator->fails()) {
            return null;
        }

        $errors = $validator->errors();

        return new ImportRowError(
            $rowNumber,
            (string) $errors->first(),
            ['errors' => $errors->toArray()]
        );
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     * @return array{0: array<string, bool|float|int|string|null>, 1: array<string, array<int, mixed>>, 2: array<string, string>}
     */
    private function homestayRules(array $row): array
    {
        $normalized = $this->normalizeHomestayRow($row);

        $rules = [
            'nama' => ['required', 'string'],
            'negeri' => ['required', 'string'],
            'model_pengurusan' => ['required', Rule::in(self::HOMESTAY_MODELS)],
            'status' => ['required', Rule::in(self::HOMESTAY_STATUSES)],
            'kapasiti' => ['nullable', 'integer', 'min:0'],
        ];

        $messages = [
            'nama.required' => 'Nama homestay diperlukan.',
            'negeri.required' => 'Negeri homestay diperlukan.',
            'model_pengurusan.required' => 'Model pengurusan diperlukan.',
            'model_pengurusan.in' => 'Model pengurusan tidak sah.',
            'status.required' => 'Status homestay diperlukan.',
            'status.in' => 'Status homestay tidak sah.',
            'kapasiti.integer' => 'Kapasiti mesti dalam nombor bulat.',
            'kapasiti.min' => 'Kapasiti tidak boleh negatif.',
        ];

        return [$normalized, $rules, $messages];
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     * @return array{0: array<string, bool|float|int|string|null>, 1: array<string, array<int, mixed>>, 2: array<string, string>}
     */
    private function performanceRules(array $row): array
    {
        $normalized = $this->normalizePerformanceRow($row);

        $rules = [
            'homestay_id' => ['required', 'integer', 'min:1'],
            'bulan' => ['required', 'integer', 'between:1,12'],
            'tahun' => ['required', 'integer', 'min:2000'],
            'pelawat_domestik' => ['nullable', 'integer', 'min:0'],
            'pelawat_asing' => ['nullable', 'integer', 'min:0'],
            'pendapatan' => ['nullable', 'numeric', 'min:0'],
            'sumber_lain' => ['nullable', 'numeric', 'min:0'],
        ];

        $messages = [
            'homestay_id.required' => 'ID homestay tidak sah.',
            'homestay_id.min' => 'ID homestay tidak sah.',
            'bulan.required' => 'Bulan mestilah antara 1 hingga 12.',
            'bulan.between' => 'Bulan mestilah antara 1 hingga 12.',
            'tahun.required' => 'Tahun mestilah 2000 atau lebih baharu.',
            'tahun.min' => 'Tahun mestilah 2000 atau lebih baharu.',
            'pelawat_domestik.integer' => 'Bilangan pelawat tidak boleh negatif.',
            'pelawat_domestik.min' => 'Bilangan pelawat tidak boleh negatif.',
            'pelawat_asing.integer' => 'Bilangan pelawat tidak boleh negatif.',
            'pelawat_asing.min' => 'Bilangan pelawat tidak boleh negatif.',
            'pendapatan.numeric' => 'Nilai pendapatan tidak boleh negatif.',
            'pendapatan.min' => 'Nilai pendapatan tidak boleh negatif.',
            'sumber_lain.numeric' => 'Nilai pendapatan tidak boleh negatif.',
            'sumber_lain.min' => 'Nilai pendapatan tidak boleh negatif.',
        ];

        return [$normalized, $rules, $messages];
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     * @return array<string, bool|float|int|string|null>
     */
    private function normalizeHomestayRow(array $row): array
    {
        return [
            'nama' => $this->valueAsString($row['nama'] ?? null),
            'negeri' => $this->valueAsString($row['negeri'] ?? null),
            'model_pengurusan' => strtolower($this->valueAsString($row['model_pengurusan'] ?? null)),
            'status' => $this->normalizeStatus($row['status'] ?? null),
            'kapasiti' => $this->optionalInt($row['kapasiti'] ?? null),
        ];
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     * @return array<string, bool|float|int|string|null>
     */
    private function normalizePerformanceRow(array $row): array
    {
        return [
            'homestay_id' => $this->valueAsInt($row['homestay_id'] ?? $row['id_homestay'] ?? null),
            'bulan' => $this->valueAsInt($row['bulan'] ?? null),
            'tahun' => $this->valueAsInt($row['tahun'] ?? null),
            'pelawat_domestik' => $this->optionalInt($row['pelawat_domestik'] ?? null),
            'pelawat_asing' => $this->optionalInt($row['pelawat_asing'] ?? null),
            'pendapatan' => $this->optionalFloat($row['pendapatan'] ?? null),
            'sumber_lain' => $this->optionalFloat($row['sumber_lain'] ?? null),
        ];
    }

    private function normalizeStatus(mixed $value): string
    {
        $status = $this->valueAsString($value);

        return $status === '' ? '' : ucwords(strtolower($status));
    }

    private function optionalInt(mixed $value): ?int
    {
        return ($value === null || $value === '') ? null : $this->valueAsInt($value);
    }

    private function optionalFloat(mixed $value): ?float
    {
        return ($value === null || $value === '') ? null : $this->valueAsFloat($value);
    }

    private function valueAsString(mixed $value): string
    {
        return is_string($value) ? trim($value) : '';
    }

    private function valueAsInt(mixed $value): int
    {
        return match (true) {
            is_int($value) => $value,
            is_numeric($value) => (int) $value,
            default => 0,
        };
    }

    private function valueAsFloat(mixed $value): float
    {
        return match (true) {
            is_float($value), is_int($value) => (float) $value,
            is_numeric($value) => (float) $value,
            default => 0.0,
        };
    }
}
