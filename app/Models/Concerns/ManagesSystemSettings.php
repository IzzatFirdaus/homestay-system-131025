<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use App\Models\SystemSetting;

/**
 * Trait for handling SystemSetting scoped operations and value management.
 */
/** @phpstan-ignore-next-line */
trait ManagesSystemSettings
{
    /**
     * Get a setting value by key with optional scope.
     */
    public static function getValue(
        string $key,
        ?string $scope = null,
        array|bool|int|float|string|null $default = null
    ): array|bool|int|float|string|null {
        $setting = static::where('key', $key)->where('scope', $scope)->first();

        return $setting ? $setting->value : $default;
    }

    /**
     * Save a setting value by key with optional scope.
     */
    public static function saveValue(
        string $key,
        array|bool|int|float|string|null $value,
        ?string $scope = null
    ): SystemSetting {
        return static::updateOrCreate(
            ['key' => $key, 'scope' => $scope],
            ['value' => $value]
        );
    }

    /**
     * Get a global setting value.
     */
    public static function getGlobal(
        string $key,
        array|bool|int|float|string|null $default = null
    ): array|bool|int|float|string|null {
        return static::getValue($key, null, $default);
    }

    /**
     * Save a global setting value.
     */
    public static function saveGlobal(
        string $key,
        array|bool|int|float|string|null $value
    ): SystemSetting {
        return static::saveValue($key, $value, null);
    }

    /**
     * Delete a setting by key and scope.
     */
    public static function deleteSetting(string $key, ?string $scope = null): bool
    {
        return static::where('key', $key)->where('scope', $scope)->delete() > 0;
    }

    /**
     * Get all settings for a specific scope.
     *
     * @return array<string, array|bool|int|float|string|null>
     */
    public static function getForScope(?string $scope = null): array
    {
        return static::where('scope', $scope)
            ->pluck('value', 'key')
            ->toArray();
    }
}
