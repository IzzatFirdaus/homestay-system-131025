<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Cooperative API resource.
 *
 * @mixin \App\Models\Cooperative
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
            'negeri' => $this->negeri,

            // Conditionally load relationships
            'homestays' => HomestayResource::collection($this->whenLoaded('homestays')),

            // Metadata
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
