<?php

declare(strict_types=1);

namespace App\Services\Import;

use App\Data\HomestayData;
use App\Exceptions\BusinessRuleException;
use App\Exceptions\ValidationException;
use App\Models\Homestay;
use App\Services\HomestayService;

/**
 * Applies normalized homestay rows using the domain service layer.
 */
final class HomestayImportProcessor
{
    public function __construct(
        private readonly HomestayService $homestayService,
        private readonly Homestay $homestayModel,
    ) {}

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     *
     * @throws ValidationException
     * @throws BusinessRuleException
     */
    public function process(array $row): void
    {
        $data = $this->mapToDto($row);
        $existing = $this->locateExistingHomestay($data);

        if ($existing !== null) {
            $this->homestayService->updateHomestay($existing, $data);

            return;
        }

        $this->homestayService->createHomestay($data);
    }

    /**
     * @param  array<string, bool|float|int|string|null>  $row
     */
    private function mapToDto(array $row): HomestayData
    {
        $name = is_string($row['nama'] ?? null) ? trim((string) $row['nama']) : '';
        $state = is_string($row['negeri'] ?? null) ? trim((string) $row['negeri']) : '';
        $address = isset($row['alamat']) && $row['alamat'] !== '' ? (string) $row['alamat'] : null;
        $capacity = $this->asInt($row['kapasiti'] ?? null);
        $facilities = isset($row['fasiliti']) && $row['fasiliti'] !== '' ? (string) $row['fasiliti'] : null;
        $modelRaw = $row['model_pengurusan'] ?? null;
        $model = strtolower(is_string($modelRaw) ? (string) $modelRaw : 'koperasi');
        if (! in_array($model, ['koperasi', 'individu'], true)) {
            $model = 'koperasi';
        }
        $statusRaw = is_string($row['status'] ?? null) ? (string) $row['status'] : 'Aktif';
        $status = $statusRaw === '' ? 'Aktif' : ucwords(strtolower($statusRaw));
        $cooperativeId = $this->asNullableInt($row['cooperative_id'] ?? $row['id_koperasi'] ?? null);
        $clusterId = $this->asNullableInt($row['cluster_id'] ?? null);

        return new HomestayData(
            nama: $name,
            negeri: $state,
            alamat: $address,
            kapasiti: $capacity,
            fasiliti: $facilities,
            modelPengurusan: $model,
            cooperativeId: $cooperativeId,
            status: $status,
            clusterId: $clusterId,
        );
    }

    private function locateExistingHomestay(HomestayData $data): ?Homestay
    {
        return $this->homestayModel->newQuery()
            ->where('nama', $data->nama)
            ->where('negeri', $data->negeri)
            ->first();
    }

    private function asInt(mixed $value): int
    {
        if ($value === null || $value === '') {
            return 0;
        }

        if (is_int($value)) {
            return $value;
        }

        if (is_numeric($value)) {
            return max(0, (int) $value);
        }

        return 0;
    }

    private function asNullableInt(mixed $value): ?int
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_int($value)) {
            return $value;
        }

        if (is_numeric($value)) {
            return (int) $value;
        }

        return null;
    }
}
