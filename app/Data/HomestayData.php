<?php

declare(strict_types=1);

namespace App\Data;

/**
 * Value object describing the attributes required to create or update a Homestay.
 */
final class HomestayData
{
    /**
     * @param  string  $nama  Display name of the homestay.
     * @param  string  $negeri  State/negeri identifier (title-cased string per D09 §5.1).
     * @param  string|null  $alamat  Optional mailing address for the homestay.
     * @param  int  $kapasiti  Maximum guest capacity (must be >= 0).
     * @param  string|null  $fasiliti  JSON / text payload describing facilities.
     * @param  string  $modelPengurusan  Either 'koperasi' or 'individu'.
     * @param  int|null  $cooperativeId  Foreign key reference to cooperatives.id.
     * @param  string  $status  Either 'Aktif' or 'Tidak Aktif'.
     * @param  int|null  $clusterId  Optional reference to clusters.id for grouping.
     */
    public function __construct(
        public readonly string $nama,
        public readonly string $negeri,
        public readonly ?string $alamat,
        public readonly int $kapasiti,
        public readonly ?string $fasiliti,
        public readonly string $modelPengurusan,
        public readonly ?int $cooperativeId,
        public readonly string $status,
        public readonly ?int $clusterId,
    ) {}

    public static function from(array $data): self
    {
        return new self(
            nama: $data['nama'],
            negeri: $data['negeri'],
            alamat: $data['alamat'] ?? null,
            kapasiti: $data['kapasiti'] ?? 0,
            fasiliti: $data['fasiliti'] ?? null,
            modelPengurusan: $data['model_pengurusan'],
            cooperativeId: $data['cooperative_id'] ?? null,
            status: $data['status'],
            clusterId: $data['cluster_id'] ?? null,
        );
    }
}
