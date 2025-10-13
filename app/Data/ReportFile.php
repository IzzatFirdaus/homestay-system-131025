<?php

declare(strict_types=1);

namespace App\Data;

/**
 * Value object describing a generated report artifact.
 */
final class ReportFile
{
    /**
     * @param  string  $disk  Storage disk identifier used when persisting the report.
     * @param  string  $path  Relative path to the report file on the disk.
     * @param  string  $mimeType  MIME content type of the generated report.
     * @param  string  $downloadName  Suggested download filename presented to users.
     */
    public function __construct(
        public readonly string $disk,
        public readonly string $path,
        public readonly string $mimeType,
        public readonly string $downloadName,
    ) {}
}
