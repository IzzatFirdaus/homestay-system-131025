<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Homestay API resource.
 *
 * @mixin \App\Models\Homestay
 */
final class HomestayResource extends JsonResource
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
            'status' => $this->status,
            'model_pengurusan' => $this->model_pengurusan,

            // Conditionally load relationships
            'cooperative' => $this->whenLoaded('cooperative', fn () => new CooperativeResource($this->cooperative)),
            'cluster' => $this->whenLoaded('cluster', fn () => new ClusterResource($this->cluster)),
            'performances' => PerformanceResource::collection($this->whenLoaded('performances')),

            // Metadata
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
