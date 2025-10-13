<?php

declare(strict_types=1);

namespace App\Data;

/**
 * Represents a validation or business rule failure encountered during import processing.
 */
final class ImportRowError
{
    /**
     * @param  int  $rowNumber  1-based Excel row index for the failing row.
     * @param  string  $message  Human readable failure description (localized upstream).
     * @param  array<string, mixed>|null  $context  Optional additional context metadata.
     */
    public function __construct(
        public readonly int $rowNumber,
        public readonly string $message,
        public readonly ?array $context = null,
    ) {}
}
