<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Report (LaporanTerjadual) API Resource
 *
 * @property-read int $id
 * @property-read int $user_id
 * @property-read string $nama
 * @property-read string $format
 * @property-read string $frekuensi
 * @property-read string|null $cron_expression
 * @property-read mixed $filters
 * @property-read mixed $recipients
 * @property-read string $status
 * @property-read \Carbon\Carbon|null $last_run_at
 * @property-read bool $is_active
 * @property-read \Carbon\Carbon|null $next_run_at
 * @property-read bool $is_due
 * @property-read \Illuminate\Support\Carbon $created_at
 * @property-read \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\User|null $user
 */
final class ReportResource extends JsonResource
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
            'format' => $this->format,
            'frekuensi' => $this->frekuensi,
            'cron_expression' => $this->cron_expression,
            'filters' => $this->filters,
            'recipients' => $this->recipients,
            'status' => $this->status,
            'is_active' => $this->is_active,
            'last_run_at' => $this->last_run_at,
            'next_run_at' => $this->next_run_at,
            'is_due' => $this->is_due,
            'user' => $this->whenLoaded('user', fn () => new UserResource($this->user)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
