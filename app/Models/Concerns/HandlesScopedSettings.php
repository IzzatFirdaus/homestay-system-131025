<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use App\Models\SystemSetting;

/**
 * Trait for handling scoped setting operations (negeri and koperasi).
 */
trait HandlesScopedSettings
{
    /**
     * Get a negeri-scoped setting value.
     *
     * @param  mixed  $default
     * @return mixed
     */
    public static function getNegeri(string $key, string $negeri, $default = null)
    {
        return static::getScopedValue($key, "negeri:{$negeri}", $default);
    }

    /**
     * Set a negeri-scoped setting value.
     *
     * @param  mixed  $value
     */
    public static function setNegeri(string $key, $value, string $negeri): SystemSetting
    {
        return static::setValue($key, $value, "negeri:{$negeri}");
    }

    /**
     * Get a koperasi-scoped setting value.
     *
     * @param  mixed  $default
     * @return mixed
     */
    public static function getKoperasi(string $key, int $koperasiId, $default = null)
    {
        return static::getScopedValue($key, "koperasi:{$koperasiId}", $default);
    }

    /**
     * Set a koperasi-scoped setting value.
     *
     * @param  mixed  $value
     */
    public static function setKoperasi(string $key, $value, int $koperasiId): SystemSetting
    {
        return static::setValue($key, $value, "koperasi:{$koperasiId}");
    }

    /**
     * Get scoped value with fallback to global.
     *
     * @param  mixed  $default
     * @return mixed
     */
    protected static function getScopedValue(string $key, string $scope, $default = null)
    {
        // Try scoped value first, then fall back to global
        $value = static::getValue($key, $scope);

        return $value !== null ? $value : static::getGlobal($key, $default);
    }
}
