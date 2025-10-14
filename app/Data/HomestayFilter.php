<?php

declare(strict_types=1);

namespace App\Data;

use Illuminate\Http\Request;

/**
 * Filter constraints for querying homestays collections.
 */
final class HomestayFilter
{
    public function __construct(
        public readonly ?string $negeri = null,
        public readonly ?string $status = null,
        public readonly ?int $cooperativeId = null,
        public readonly ?int $clusterId = null,
        public readonly ?string $modelPengurusan = null,
        public readonly ?string $searchTerm = null,
    ) {}

    /**
     * Build filter from HTTP request query/body.
     */
    public static function fromRequest(Request $request): self
    {
        $negeri = $request->string('negeri')->trim();
        $status = $request->string('status')->trim();
        $model = $request->string('model_pengurusan')->trim();
        $search = $request->string('search')->trim();

        return new self(
            negeri: $negeri->isEmpty() ? null : $negeri->toString(),
            status: $status->isEmpty() ? null : $status->toString(),
            cooperativeId: $request->has('cooperative_id') ? (int) $request->input('cooperative_id') : null,
            clusterId: $request->has('cluster_id') ? (int) $request->input('cluster_id') : null,
            modelPengurusan: $model->isEmpty() ? null : $model->toString(),
            searchTerm: $search->isEmpty() ? null : $search->toString(),
        );
    }
}
