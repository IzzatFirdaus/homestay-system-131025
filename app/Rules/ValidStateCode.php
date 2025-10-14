<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Validates that a state code is a valid Malaysian state.
 *
 * This rule ensures state names or codes match the official list of Malaysian states.
 */
class ValidStateCode implements ValidationRule
{
    /**
     * Valid Malaysian states.
     */
    protected const VALID_STATES = [
        'Johor',
        'Kedah',
        'Kelantan',
        'Melaka',
        'Negeri Sembilan',
        'Pahang',
        'Perak',
        'Perlis',
        'Pulau Pinang',
        'Sabah',
        'Sarawak',
        'Selangor',
        'Terengganu',
        'Wilayah Persekutuan Kuala Lumpur',
        'Wilayah Persekutuan Labuan',
        'Wilayah Persekutuan Putrajaya',
    ];

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Note: $attribute parameter contains the field name being validated
        unset($attribute); // Suppressing unused parameter warning - validation logic doesn't need field name

        if (! is_string($value)) {
            $fail(__('validation.state.invalid_type'));

            return;
        }

        // Normalize the value for comparison
        $normalized = trim($value);

        // Check if it's in the valid states list (case-insensitive)
        $isValid = collect(self::VALID_STATES)
            ->map(fn ($state) => strtolower($state))
            ->contains(strtolower($normalized));

        if (! $isValid) {
            $fail(__('validation.state.invalid', [
                'value' => $value,
                'states' => implode(', ', self::VALID_STATES),
            ]));
        }
    }

    /**
     * Get the list of valid states.
     *
     * @return array<string>
     */
    public static function getValidStates(): array
    {
        return self::VALID_STATES;
    }
}
