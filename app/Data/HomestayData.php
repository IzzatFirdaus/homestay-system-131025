<?php

declare(strict_types=1);

namespace App\Data;

use Illuminate\Support\Arr;

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

    /**
     * Build DTO from an input array (e.g., request validated data).
     *
     * @param  array<string, mixed>  $input
     */
    public static function fromArray(array $input): self
    {
        return new self(
            nama: (string) Arr::get($input, 'nama', ''),
            negeri: (string) Arr::get($input, 'negeri', ''),
            alamat: ($v = Arr::get($input, 'alamat')) !== null && $v !== '' ? (string) $v : null,
            kapasiti: (int) Arr::get($input, 'kapasiti', 0),
            fasiliti: ($v = Arr::get($input, 'fasiliti')) !== null && $v !== '' ? (string) $v : null,
            modelPengurusan: (string) Arr::get($input, 'model_pengurusan', 'individu'),
            cooperativeId: ($v = Arr::get($input, 'cooperative_id', Arr::get($input, 'id_koperasi'))) !== null && $v !== '' ? (int) $v : null,
            status: (string) Arr::get($input, 'status', 'Aktif'),
            clusterId: ($v = Arr::get($input, 'cluster_id')) !== null && $v !== '' ? (int) $v : null,
        );
    }
}
