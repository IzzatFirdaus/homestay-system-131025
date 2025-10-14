<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Import API resource.
 *
 * @mixin \App\Models\Import
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
            'filename' => $this->filename,
            'status' => $this->status,
            'total_rows' => $this->rows_total,
            'processed_rows' => $this->rows_processed,
            'error_count' => $this->rows_failed,
            'progress' => $this->progress_percentage,
            'is_processing' => $this->is_processing,
            'started_at' => $this->created_at->toIso8601String(),
            'completed_at' => $this->updated_at->toIso8601String(),

            // Metadata
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
