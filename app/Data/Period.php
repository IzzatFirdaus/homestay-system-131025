<?php

declare(strict_types=1);

namespace App\Data;

use Carbon\CarbonImmutable;

/**
 * Immutable value object describing a closed date range (inclusive of both bounds).
 */
final class Period
{
    /**
     * @param  CarbonImmutable  $from  Inclusive lower bound.
     * @param  CarbonImmutable  $to  Inclusive upper bound.
     */
    public function __construct(
        public readonly CarbonImmutable $from,
        public readonly CarbonImmutable $to,
    ) {
        if ($this->to->lessThan($this->from)) {
            throw new \InvalidArgumentException('The "to" boundary must not precede the "from" boundary.');
        }
    }

    /**
     * Determine whether a given year-month pair falls within the period.
     */
    public function containsMonth(int $year, int $month): bool
    {
        // Avoid nullable factory return types by deriving from a known instance
        $monthStart = $this->from->setDate($year, $month, 1)->startOfDay();
        $monthEnd = $monthStart->endOfMonth();

        return $monthStart->betweenIncluded($this->from, $this->to)
            || $monthEnd->betweenIncluded($this->from, $this->to)
            || ($monthStart->lessThan($this->from) && $monthEnd->greaterThan($this->to));
    }
}
