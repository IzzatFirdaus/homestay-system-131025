<?php

declare(strict_types=1);

namespace Tests\Unit\Rules;

use App\Rules\ValidStateCode;
use Tests\TestCase;

/**
 * Test ValidStateCode validation rule.
 */
final class ValidStateCodeTest extends TestCase
{
    public function test_passes_with_valid_state_name(): void
    {
        $rule = new ValidStateCode;

        $failed = false;
        $rule->validate('negeri', 'Selangor', function () use (&$failed) {
            $failed = true;
        });

        $this->assertFalse($failed, 'Rule should pass for valid state name');
    }

    public function test_passes_with_case_insensitive_match(): void
    {
        $rule = new ValidStateCode;

        $failed = false;
        $rule->validate('negeri', 'selangor', function () use (&$failed) {
            $failed = true;
        });

        $this->assertFalse($failed, 'Rule should pass for case-insensitive state name');
    }

    public function test_fails_with_invalid_state_name(): void
    {
        $rule = new ValidStateCode;

        $failed = false;
        $rule->validate('negeri', 'InvalidState', function () use (&$failed) {
            $failed = true;
        });

        $this->assertTrue($failed, 'Rule should fail for invalid state name');
    }

    public function test_fails_with_non_string_value(): void
    {
        $rule = new ValidStateCode;

        $failed = false;
        $rule->validate('negeri', 123, function () use (&$failed) {
            $failed = true;
        });

        $this->assertTrue($failed, 'Rule should fail for non-string value');
    }

    public function test_passes_with_federal_territory(): void
    {
        $rule = new ValidStateCode;

        $failed = false;
        $rule->validate('negeri', 'Wilayah Persekutuan Kuala Lumpur', function () use (&$failed) {
            $failed = true;
        });

        $this->assertFalse($failed, 'Rule should pass for federal territories');
    }

    public function test_get_valid_states_returns_array(): void
    {
        $states = ValidStateCode::getValidStates();

        $this->assertIsArray($states);
        $this->assertNotEmpty($states);
        $this->assertContains('Selangor', $states);
        $this->assertContains('Johor', $states);
    }
}
