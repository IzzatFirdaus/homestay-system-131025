<?php

declare(strict_types=1);

namespace App\Models\Concerns;

/**
 * Trait for handling scoped setting operations (negeri and koperasi).
 */
trait HandlesScopedSettings
{
    /**
     * Get a negeri-scoped setting value.
     */
    public static function getNegeri(
        string $key,
        string $negeri,
        array|bool|int|float|string|null $default = null
    ): array|bool|int|float|string|null {
        return static::getScopedValue($key, "negeri:{$negeri}", $default);
    }

    /**
     * Save a negeri-scoped setting value.
     */
    public static function saveNegeri(
        string $key,
        array|bool|int|float|string|null $value,
        string $negeri
    ): SystemSetting {
        return static::saveValue($key, $value, "negeri:{$negeri}");
    }

    /**
     * Get a koperasi-scoped setting value.
     */
    public static function getKoperasi(
        string $key,
        int $koperasiId,
        array|bool|int|float|string|null $default = null
    ): array|bool|int|float|string|null {
        return static::getScopedValue($key, "koperasi:{$koperasiId}", $default);
    }

    /**
     * Save a koperasi-scoped setting value.
     */
    public static function saveKoperasi(
        string $key,
        array|bool|int|float|string|null $value,
        int $koperasiId
    ): SystemSetting {
        return static::saveValue($key, $value, "koperasi:{$koperasiId}");
    }

    /**
     * Get scoped value with fallback to global.
     */
    protected static function getScopedValue(
        string $key,
        string $scope,
        array|bool|int|float|string|null $default = null
    ): array|bool|int|float|string|null {
        // Try scoped value first, then fall back to global
        $value = static::getValue($key, $scope);

        return $value !== null ? $value : static::getGlobal($key, $default);
    }
}
