<?php

declare(strict_types=1);

namespace App\Data;

/**
 * Result payload for a processed import session.
 */
final class ImportResult
{
    /**
     * @param  int  $importId  Identifier of the import session.
     * @param  int  $processed  Number of rows processed.
     * @param  int  $succeeded  Number of rows imported successfully.
     * @param  int  $failed  Number of rows that failed validation/business rules.
     * @param  string|null  $errorReportPath  Storage path to generated error report, if any.
     */
    public function __construct(
        public readonly int $importId,
        public readonly int $processed,
        public readonly int $succeeded,
        public readonly int $failed,
        public readonly ?string $errorReportPath = null,
    ) {}
}
