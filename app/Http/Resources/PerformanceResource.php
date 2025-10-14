<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Performance API Resource
 *
 * @property-read int $id
 * @property-read int $homestay_id
 * @property-read int $bulan
 * @property-read int $tahun
 * @property-read int $pelawat_domestik
 * @property-read int $pelawat_asing
 * @property-read float $pendapatan
 * @property-read int $kadar_penghunian
 * @property-read \Illuminate\Support\Carbon $created_at
 * @property-read \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Homestay|null $homestay
 */
final class PerformanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'homestay_id' => $this->homestay_id,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'pelawat_domestik' => $this->pelawat_domestik,
            'pelawat_asing' => $this->pelawat_asing,
            'pendapatan' => $this->pendapatan,
            'kadar_penghunian' => $this->kadar_penghunian,
            'homestay' => $this->whenLoaded('homestay', fn () => new HomestayResource($this->homestay)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
