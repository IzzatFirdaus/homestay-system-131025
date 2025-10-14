<?php

declare(strict_types=1);

namespace App\Data;

use Illuminate\Support\Collection;

/**
 * Preview payload returned to the UI for import validation screens.
 */
final class ImportPreviewResult
{
    /**
     * @param  string  $type  Import type identifier (homestays, performances, etc.).
     * @param  int  $totalRows  Total number of data rows detected in the source file.
     * @param  \Illuminate\Support\Collection<array-key, array<string, bool|float|int|string|null>>  $sampleRows  Sanitised preview rows.
     * @param  array<int, ImportRowError>  $errors  Non-blocking validation errors.
     */
    /**
     * @param  Collection<int, array<string, bool|float|int|string|null>>  $sampleRows
     * @param  array<int, ImportRowError>  $errors
     */
    public function __construct(
        public readonly string $type,
        public readonly int $totalRows,
        public readonly Collection $sampleRows,
        public readonly array $errors,
    ) {}
}
