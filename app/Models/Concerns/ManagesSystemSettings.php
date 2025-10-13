<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use App\Models\SystemSetting;

/**
 * Trait for handling SystemSetting scoped operations and value management.
 */
trait ManagesSystemSettings
{
    /**
     * Get a setting value by key with optional scope.
     *
     * @param  mixed  $default
     * @return mixed
     */
    public static function getValue(string $key, ?string $scope = null, $default = null)
    {
        $setting = static::where('key', $key)->where('scope', $scope)->first();

        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value by key with optional scope.
     *
     * @param  mixed  $value
     */
    public static function setValue(string $key, $value, ?string $scope = null): SystemSetting
    {
        /** @var SystemSetting */
        return static::updateOrCreate(
            ['key' => $key, 'scope' => $scope],
            ['value' => $value]
        );
    }

    /**
     * Get a global setting value.
     *
     * @param  mixed  $default
     * @return mixed
     */
    public static function getGlobal(string $key, $default = null)
    {
        return static::getValue($key, null, $default);
    }

    /**
     * Set a global setting value.
     *
     * @param  mixed  $value
     */
    public static function setGlobal(string $key, $value): SystemSetting
    {
        return static::setValue($key, $value, null);
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
     * @return array<string, mixed>
     */
    public static function getForScope(?string $scope = null): array
    {
        /** @var array<string, mixed> */
        return static::where('scope', $scope)
            ->pluck('value', 'key')
            ->toArray();
    }
}
