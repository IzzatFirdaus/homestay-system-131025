<?php

declare(strict_types=1);

namespace App\Services\Import;

/**
 * Tracks import processing metrics for success, failure, and row position.
 */
final class ImportCounters
{
    private int $processed = 0;

    private int $succeeded = 0;

    private int $failed = 0;

    private int $rowNumber;

    public function __construct(int $rowNumber = 2)
    {
        $this->rowNumber = $rowNumber;
    }

    public function currentRow(): int
    {
        return $this->rowNumber;
    }

    public function processed(): int
    {
        return $this->processed;
    }

    public function succeeded(): int
    {
        return $this->succeeded;
    }

    public function failed(): int
    {
        return $this->failed;
    }

    public function recordSuccess(): void
    {
        $this->processed++;
        $this->succeeded++;
        $this->rowNumber++;
    }

    public function recordFailure(): void
    {
        $this->processed++;
        $this->failed++;
        $this->rowNumber++;
    }
}
