<?php

declare(strict_types=1);

namespace App\Data;

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
}
