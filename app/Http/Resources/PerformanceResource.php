<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Performance API resource.
 *
 * @mixin \App\Models\Performance
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
            'tahun' => $this->tahun,
            'bulan' => $this->bulan,
            'pelawat_domestik' => $this->pelawat_domestik,
            'pelawat_asing' => $this->pelawat_asing,
            'jumlah_pelawat' => $this->total_pelawat,
            'pendapatan' => $this->pendapatan,
            'sumber_lain' => $this->sumber_lain,

            // Conditionally load relationships
            'homestay' => $this->whenLoaded('homestay', fn () => new HomestayResource($this->homestay)),

            // Metadata
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
