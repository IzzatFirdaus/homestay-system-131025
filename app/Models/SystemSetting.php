<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * SystemSetting Model
 *
 * Represents application-wide configuration settings with optional scoping.
 * Supports JSON values and hierarchical scoping (global, negeri, koperasi).
 *
 * @property int $id Primary key
 * @property string $key Setting key identifier
 * @property mixed $value Setting value (JSON decoded)
 * @property string|null $scope Setting scope (global, negeri:Selangor, koperasi:123)
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read bool $is_global Whether setting is global scope
 * @property-read string|null $scope_type Scope type (null, 'negeri', 'koperasi')
 * @property-read string|null $scope_value Scope value (state name, cooperative ID)
 *
 * @method static \Database\Factories\SystemSettingFactory factory(...$parameters)
 */
class SystemSetting extends Model
{
    /** @phpstan-ignore-next-line */
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'system_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'key',
        'value',
        'scope',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'value' => 'json',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var list<string>
     */
    protected $appends = [
        'is_global',
        'scope_type',
        'scope_value',
    ];

    // Query Scopes

    /**
     * Scope query to filter by key.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeByKey(Builder $query, string $key): Builder
    {
        return $query->where('key', $key);
    }

    /**
     * Scope query to filter by scope.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeByScope(Builder $query, ?string $scope): Builder
    {
        return $query->where('scope', $scope);
    }

    /**
     * Scope query to include only global settings.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeGlobal(Builder $query): Builder
    {
        return $query->whereNull('scope');
    }

    /**
     * Scope query to filter by negeri scope.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeByNegeri(Builder $query, string $negeri): Builder
    {
        return $query->where('scope', "negeri:{$negeri}");
    }

    /**
     * Scope query to filter by koperasi scope.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeByKoperasi(Builder $query, int $koperasiId): Builder
    {
        return $query->where('scope', "koperasi:{$koperasiId}");
    }

    // Accessors

    /**
     * Check if this setting has global scope.
     */
    public function getIsGlobalAttribute(): bool
    {
        return $this->scope === null;
    }

    /**
     * Get the scope type (null, 'negeri', 'koperasi').
     */
    public function getScopeTypeAttribute(): ?string
    {
        if (! $this->scope) {
            return null;
        }

        $parts = explode(':', $this->scope);

        return $parts[0] ?? null;
    }

    /**
     * Get the scope value (state name, cooperative ID).
     */
    public function getScopeValueAttribute(): ?string
    {
        if (! $this->scope) {
            return null;
        }

        $parts = explode(':', $this->scope);

        return $parts[1] ?? null;
    }

    // Static Helper Methods

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
     * Get a negeri-scoped setting value.
     *
     * @param  mixed  $default
     * @return mixed
     */
    public static function getNegeri(string $key, string $negeri, $default = null)
    {
        // Try negeri-specific first, then fall back to global
        $value = static::getValue($key, "negeri:{$negeri}");

        return $value !== null ? $value : static::getGlobal($key, $default);
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
        // Try koperasi-specific first, then fall back to global
        $value = static::getValue($key, "koperasi:{$koperasiId}");

        return $value !== null ? $value : static::getGlobal($key, $default);
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
