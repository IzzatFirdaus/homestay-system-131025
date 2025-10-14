<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Cooperative API Resource
 *
 * @property-read int $id
 * @property-read string $nama
 * @property-read string|null $alamat
 * @property-read string|null $telefon
 * @property-read string|null $emel
 * @property-read \Illuminate\Support\Carbon $created_at
 * @property-read \Illuminate\Support\Carbon $updated_at
 */
final class CooperativeResource extends JsonResource
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
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'telefon' => $this->telefon,
            'emel' => $this->emel,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
