<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

/**
 * Homestay Collection Resource
 *
 * Handles collection of homestays with pagination metadata.
 */
final class HomestayCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => HomestayResource::collection($this->collection),
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @return array<string, mixed>
     */
    public function with(Request $request): array
    {
        $meta = [
            'total' => null,
            'per_page' => null,
            'current_page' => null,
            'last_page' => null,
        ];

        if ($this->resource instanceof LengthAwarePaginator) {
            $meta['total'] = $this->resource->total();
            $meta['per_page'] = $this->resource->perPage();
            $meta['current_page'] = $this->resource->currentPage();
            $meta['last_page'] = $this->resource->lastPage();
        } elseif ($this->resource instanceof Paginator) {
            $meta['total'] = $this->collection->count();
            $meta['per_page'] = $this->resource->perPage();
            $meta['current_page'] = $this->resource->currentPage();
            $meta['last_page'] = null; // Simple paginator does not know last page
        } else {
            $meta['total'] = $this->collection->count();
            $meta['per_page'] = $this->collection->count();
            $meta['current_page'] = 1;
            $meta['last_page'] = 1;
        }

        return [
            'meta' => $meta,
        ];
    }
}
