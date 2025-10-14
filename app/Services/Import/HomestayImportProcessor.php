<?php

declare(strict_types=1);

namespace App\Services\Import;

use App\Data\HomestayData;
use App\Models\Homestay;
use App\Services\HomestayService;

/**
 * Handles homestay domain upserts during imports.
 */
final class HomestayImportProcessor
{
    public function __construct(
        private readonly HomestayService $homestayService,
        private readonly Homestay $homestayModel,
    ) {}

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    public function process(array $row): void
    {
        $data = new HomestayData(
            nama: $this->stringValue($row, 'nama'),
            negeri: $this->stringValue($row, 'negeri'),
            alamat: $this->nullableString($row, 'alamat'),
            kapasiti: $this->intValue($row, 'kapasiti'),
            fasiliti: $this->nullableString($row, 'fasiliti'),
            modelPengurusan: $this->stringValue($row, 'model_pengurusan', 'individu'),
            cooperativeId: $this->nullableInt($row, 'id_koperasi'),
            status: $this->stringValue($row, 'status', 'Aktif'),
            clusterId: $this->nullableInt($row, 'cluster_id'),
        );

        $existing = $this->homestayModel->newQuery()
            ->where('nama', $data->nama)
            ->where('negeri', $data->negeri)
            ->first();

        if ($existing !== null) {
            $this->homestayService->updateHomestay($existing, $data);

            return;
        }

        $this->homestayService->createHomestay($data);
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    private function stringValue(array $row, string $key, string $default = ''): string
    {
        $value = $row[$key] ?? null;
        if ($value === null) {
            return $default;
        }

        if (is_string($value)) {
            $trimmed = trim($value);

            return $trimmed === '' ? $default : $trimmed;
        }

        return (string) $value;
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    private function nullableString(array $row, string $key): ?string
    {
        if (! array_key_exists($key, $row)) {
            return null;
        }

        $value = $row[$key];

        if ($value === null) {
            return null;
        }

        $stringValue = is_string($value) ? trim($value) : (string) $value;

        return $stringValue === '' ? null : $stringValue;
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    private function nullableInt(array $row, string $key): ?int
    {
        if (! array_key_exists($key, $row)) {
            return null;
        }

        $value = $row[$key];

        if ($value === null || $value === '') {
            return null;
        }

        return (int) $value;
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    private function intValue(array $row, string $key, int $default = 0): int
    {
        $value = $row[$key] ?? $default;

        return (int) $value;
    }
}
