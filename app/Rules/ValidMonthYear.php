<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Validates that month and year values are within reasonable ranges.
 *
 * This rule can be used for both bulan (month) and tahun (year) fields
 * to ensure they fall within acceptable ranges for the application.
 */
class ValidMonthYear implements ValidationRule
{
    /**
     * The type of validation to perform ('month' or 'year').
     */
    protected string $type;

    /**
     * Create a new rule instance.
     *
     * @param  string  $type  Either 'month' or 'year'
     */
    public function __construct(string $type = 'month')
    {
        $this->type = $type;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_numeric($value)) {
            $fail(__('validation.numeric'));

            return;
        }

        $numericValue = (int) $value;

        if ($this->type === 'month') {
            $this->validateMonth($numericValue, $fail);
        } elseif ($this->type === 'year') {
            $this->validateYear($numericValue, $fail);
        }
    }

    /**
     * Validate month value (1-12).
     */
    protected function validateMonth(int $value, Closure $fail): void
    {
        if ($value < 1 || $value > 12) {
            $fail(__('validation.between.numeric', [
                'min' => 1,
                'max' => 12,
            ]));
        }
    }

    /**
     * Validate year value (reasonable range for homestay data).
     */
    protected function validateYear(int $value, Closure $fail): void
    {
        $minYear = 2000; // Homestay program started around early 2000s
        $maxYear = (int) date('Y') + 1; // Allow next year for planning

        if ($value < $minYear || $value > $maxYear) {
            $fail(__('validation.between.numeric', [
                'min' => $minYear,
                'max' => $maxYear,
            ]));
        }
    }
}
