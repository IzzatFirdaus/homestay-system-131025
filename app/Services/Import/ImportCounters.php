<?php

declare(strict_types=1);

namespace App\Services\Import;

/**
 * Tracks import progress counters and provides the current row index.
 */
final class ImportCounters
{
    private int $processed = 0;

    private int $succeeded = 0;

    private int $failed = 0;

    private int $currentRow = 2;

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

    public function currentRow(): int
    {
        return $this->currentRow;
    }

    public function recordSuccess(): void
    {
        $this->processed++;
        $this->succeeded++;
        $this->currentRow++;
    }

    public function recordFailure(): void
    {
        $this->processed++;
        $this->failed++;
        $this->currentRow++;
    }
}
