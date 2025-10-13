<?php

declare(strict_types=1);

namespace App\Models\Concerns;

/**
 * Performance Data Validation Trait
 *
 * Handles validation logic for performance data attributes
 * to reduce complexity in the main Performance model.
 */
trait ValidatesPerformanceData
{
    /**
     * Ensure bulan is within valid range (1-12).
     */
    public function setBulanAttribute(int|string $value): void
    {
        $this->attributes['bulan'] = $this->validateMonth((int) $value);
    }

    /**
     * Ensure tahun is within reasonable range.
     */
    public function setTahunAttribute(int|string $value): void
    {
        $this->attributes['tahun'] = $this->validateYear((int) $value);
    }

    /**
     * Ensure pelawat_domestik is not negative.
     */
    public function setPelawatDomestikAttribute(int|string $value): void
    {
        $this->attributes['pelawat_domestik'] = $this->validateVisitorCount((int) $value, 'Pelawat domestik');
    }

    /**
     * Ensure pelawat_asing is not negative.
     */
    public function setPelawatAsingAttribute(int|string $value): void
    {
        $this->attributes['pelawat_asing'] = $this->validateVisitorCount((int) $value, 'Pelawat asing');
    }

    /**
     * Ensure pendapatan is not negative.
     */
    public function setPendapatanAttribute(float|int|string $value): void
    {
        $this->attributes['pendapatan'] = $this->validateAmount($value, 'Pendapatan');
    }

    /**
     * Ensure sumber_lain is not negative.
     */
    public function setSumberLainAttribute(float|int|string $value): void
    {
        $this->attributes['sumber_lain'] = $this->validateAmount($value, 'Sumber lain');
    }

    /**
     * Validate month is within range 1-12.
     */
    protected function validateMonth(int $month): int
    {
        if ($month < 1 || $month > 12) {
            throw new \InvalidArgumentException('Bulan must be between 1 and 12');
        }

        return $month;
    }

    /**
     * Validate year is within reasonable range.
     */
    protected function validateYear(int $year): int
    {
        $currentYear = now()->year;
        if ($year < 2000 || $year > $currentYear + 1) {
            throw new \InvalidArgumentException("Tahun must be between 2000 and {$currentYear}");
        }

        return $year;
    }

    /**
     * Validate visitor count is not negative.
     */
    protected function validateVisitorCount(int $count, string $fieldName): int
    {
        if ($count < 0) {
            throw new \InvalidArgumentException("{$fieldName} cannot be negative");
        }

        return $count;
    }

    /**
     * Validate amount is numeric and not negative.
     */
    protected function validateAmount(float|int|string $value, string $fieldName): float
    {
        if (! is_numeric($value)) {
            throw new \InvalidArgumentException("{$fieldName} must be numeric");
        }

        $numericValue = (float) $value;
        if ($numericValue < 0) {
            throw new \InvalidArgumentException("{$fieldName} cannot be negative");
        }

        return round($numericValue, 2);
    }
}
