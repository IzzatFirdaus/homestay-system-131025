<?php

declare(strict_types=1);

namespace Tests\Unit\Rules;

use App\Rules\ValidMonthYear;
use Tests\TestCase;

/**
 * Test ValidMonthYear validation rule.
 */
final class ValidMonthYearTest extends TestCase
{
    public function test_month_validation_passes_for_valid_months(): void
    {
        $rule = new ValidMonthYear('month');

        foreach (range(1, 12) as $month) {
            $failed = false;
            $rule->validate('bulan', $month, function () use (&$failed) {
                $failed = true;
            });

            $this->assertFalse($failed, "Rule should pass for month {$month}");
        }
    }

    public function test_month_validation_fails_for_invalid_months(): void
    {
        $rule = new ValidMonthYear('month');

        $invalidMonths = [0, 13, -1, 15];
        foreach ($invalidMonths as $month) {
            $failed = false;
            $rule->validate('bulan', $month, function () use (&$failed) {
                $failed = true;
            });

            $this->assertTrue($failed, "Rule should fail for invalid month {$month}");
        }
    }

    public function test_year_validation_passes_for_valid_years(): void
    {
        $rule = new ValidMonthYear('year');
        $currentYear = (int) date('Y');

        $validYears = [2000, 2010, 2020, $currentYear, $currentYear + 1];
        foreach ($validYears as $year) {
            $failed = false;
            $rule->validate('tahun', $year, function () use (&$failed) {
                $failed = true;
            });

            $this->assertFalse($failed, "Rule should pass for year {$year}");
        }
    }

    public function test_year_validation_fails_for_invalid_years(): void
    {
        $rule = new ValidMonthYear('year');
        $currentYear = (int) date('Y');

        $invalidYears = [1999, $currentYear + 2, 1900];
        foreach ($invalidYears as $year) {
            $failed = false;
            $rule->validate('tahun', $year, function () use (&$failed) {
                $failed = true;
            });

            $this->assertTrue($failed, "Rule should fail for invalid year {$year}");
        }
    }

    public function test_fails_for_non_numeric_value(): void
    {
        $rule = new ValidMonthYear('month');

        $failed = false;
        $rule->validate('bulan', 'invalid', function () use (&$failed) {
            $failed = true;
        });

        $this->assertTrue($failed, 'Rule should fail for non-numeric value');
    }
}
