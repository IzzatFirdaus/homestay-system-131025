<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Homestay API Resource
 *
 * Transforms Homestay model into JSON API response format.
 *
 * @property-read int $id
 * @property-read string $nama
 * @property-read string $negeri
 * @property-read string|null $alamat
 * @property-read int $kapasiti
 * @property-read string|null $fasiliti
 * @property-read string $model_pengurusan
 * @property-read int|null $id_koperasi
 * @property-read string $status
 * @property-read int|null $cluster_id
 * @property-read \Illuminate\Support\Carbon $created_at
 * @property-read \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Cooperative|null $cooperative
 * @property-read \App\Models\Cluster|null $cluster
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
            'alamat' => $this->alamat,
            'kapasiti' => $this->kapasiti,
            'fasiliti' => $this->fasiliti,
            'model_pengurusan' => $this->model_pengurusan,
            'status' => $this->status,
            'cooperative' => $this->whenLoaded('cooperative', fn () => new CooperativeResource($this->cooperative)),
            'cluster' => $this->whenLoaded('cluster', fn () => new ClusterResource($this->cluster)),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
