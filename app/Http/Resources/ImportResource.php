<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Import API Resource
 *
 * @property-read int $id
 * @property-read int $user_id
 * @property-read string $type
 * @property-read string $filename
 * @property-read string $status
 * @property-read int $rows_total
 * @property-read int $rows_processed
 * @property-read int $rows_success
 * @property-read int $rows_failed
 * @property-read mixed $meta
 * @property-read bool $is_processing
 * @property-read \Illuminate\Support\Carbon $created_at
 * @property-read \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\User|null $user
 */
final class ImportResource extends JsonResource
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
            'type' => $this->type,
            'status' => $this->status,
            'rows_total' => $this->rows_total,
            'rows_processed' => $this->rows_processed,
            'rows_success' => $this->rows_success,
            'rows_failed' => $this->rows_failed,
            'is_processing' => $this->is_processing,
            'meta' => $this->meta,
            'user' => $this->whenLoaded('user', fn () => new UserResource($this->user)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
