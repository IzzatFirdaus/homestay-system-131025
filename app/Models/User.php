<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * User Model
 *
 * Represents a system user with role-based access control and scoping.
 * Users can be scoped to specific negeri (states) and cooperatives.
 *
 * @property int $id Primary key
 * @property string $name User full name
 * @property string $email Email address (unique)
 * @property string|null $negeri State/negeri scope
 * @property int|null $cooperative_id Foreign key to cooperatives table
 * @property \Carbon\Carbon|null $email_verified_at
 * @property string $password Hashed password
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Cooperative|null $cooperative
 * @property-read \Illuminate\Database\Eloquent\Collection<int,\App\Models\Import> $imports
 * @property-read \Illuminate\Database\Eloquent\Collection<int,\App\Models\AuditLog> $auditLogs
 * @property-read \Illuminate\Database\Eloquent\Collection<int,\App\Models\LaporanTerjadual> $laporanTerjadual
 * @property-read bool $is_admin Whether user has admin role
 * @property-read bool $is_analyst Whether user has analyst role
 * @property-read string $role_display Human-readable role name
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'negeri',
        'cooperative_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'cooperative_id' => 'integer',
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
        'is_admin',
        'is_analyst',
        'role_display',
    ];

    // Relationships

    /**
     * Get the cooperative this user belongs to.
     *
     * @return BelongsTo<\App\Models\Cooperative, $this>
     */
    public function cooperative(): BelongsTo
    {
        return $this->belongsTo(Cooperative::class);
    }

    /**
     * Get all imports initiated by this user.
     *
     * @return HasMany<\App\Models\Import, $this>
     */
    public function imports(): HasMany
    {
        return $this->hasMany(Import::class);
    }

    /**
     * Get all audit logs created by this user.
     *
     * @return HasMany<\App\Models\AuditLog, $this>
     */
    public function auditLogs(): HasMany
    {
        return $this->hasMany(AuditLog::class);
    }

    /**
     * Get all scheduled reports created by this user.
     *
     * @return HasMany<\App\Models\LaporanTerjadual, $this>
     */
    public function laporanTerjadual(): HasMany
    {
        return $this->hasMany(LaporanTerjadual::class);
    }

    // Query Scopes

    /**
     * Scope query to filter by negeri (state).
     *
     * @param  Builder<User>  $query
     * @return Builder<User>
     */
    public function scopeByNegeri(Builder $query, string $negeri): Builder
    {
        return $query->where('negeri', $negeri);
    }

    /**
     * Scope query to filter by cooperative.
     *
     * @param  Builder<User>  $query
     * @return Builder<User>
     */
    public function scopeByCooperative(Builder $query, int $cooperativeId): Builder
    {
        return $query->where('cooperative_id', $cooperativeId);
    }

    /**
     * Scope query to include only admin users.
     *
     * @param  Builder<User>  $query
     * @return Builder<User>
     */
    public function scopeAdmins(Builder $query): Builder
    {
        return $query->role(['Admin', 'Super Admin']);
    }

    /**
     * Scope query to include only analyst users.
     *
     * @param  Builder<User>  $query
     * @return Builder<User>
     */
    public function scopeAnalysts(Builder $query): Builder
    {
        return $query->role(['Penganalisis', 'Admin', 'Super Admin']);
    }

    /**
     * Scope query to include users with negeri scope.
     *
     * @param  Builder<User>  $query
     * @return Builder<User>
     */
    public function scopeWithNegeri(Builder $query): Builder
    {
        return $query->whereNotNull('negeri');
    }

    /**
     * Scope query to include users with cooperative scope.
     *
     * @param  Builder<User>  $query
     * @return Builder<User>
     */
    public function scopeWithCooperative(Builder $query): Builder
    {
        return $query->whereNotNull('cooperative_id');
    }

    // Accessors

    /**
     * Check if user has admin role.
     */
    public function getIsAdminAttribute(): bool
    {
        return $this->hasAnyRole(['Admin', 'Super Admin']);
    }

    /**
     * Check if user has analyst role.
     */
    public function getIsAnalystAttribute(): bool
    {
        return $this->hasAnyRole(['Penganalisis', 'Admin', 'Super Admin']);
    }

    /**
     * Get human-readable role name.
     */
    public function getRoleDisplayAttribute(): string
    {
        $roles = $this->getRoleNames();

        return $roles->isEmpty() ? 'Pemerhati' : $roles->first();
    }

    // Authorization Helper Methods

    /**
     * Check if user can access data from a specific negeri.
     */
    public function canAccessNegeri(string $negeri): bool
    {
        // Super Admin can access all negeri
        if ($this->hasRole('Super Admin')) {
            return true;
        }

        // Admin without scope can access all negeri, but Admin with scope is restricted
        if ($this->hasRole('Admin') && $this->negeri === null && $this->cooperative_id === null) {
            return true;
        }

        // Users with negeri scope can only access their assigned negeri
        return $this->negeri === null || $this->negeri === $negeri;
    }

    /**
     * Check if user can access data from a specific cooperative.
     */
    public function canAccessCooperative(int $cooperativeId): bool
    {
        // Super Admin can access all cooperatives
        if ($this->hasRole('Super Admin')) {
            return true;
        }

        // Admin without scope can access all cooperatives, but Admin with scope is restricted
        if ($this->hasRole('Admin') && $this->negeri === null && $this->cooperative_id === null) {
            return true;
        }

        // Users with cooperative scope can only access their assigned cooperative
        return $this->cooperative_id === null || $this->cooperative_id === $cooperativeId;
    }

    /**
     * Check if user can perform data imports.
     */
    public function canImport(): bool
    {
        return $this->hasAnyRole(['Admin', 'Super Admin', 'Penganalisis']);
    }

    /**
     * Check if user can export data.
     */
    public function canExport(): bool
    {
        return $this->hasAnyRole(['Admin', 'Super Admin', 'Penganalisis', 'Pemerhati']);
    }

    /**
     * Check if user can manage system settings.
     */
    public function canManageSettings(): bool
    {
        return $this->hasRole('Super Admin');
    }

    /**
     * Check if user can manage users.
     */
    public function canManageUsers(): bool
    {
        return $this->hasAnyRole(['Super Admin', 'Admin']);
    }

    /**
     * Get the homestays this user can access based on their scope.
     *
     * @return Builder<Homestay>
     */
    public function getAccessibleHomestays(): Builder
    {
        $query = Homestay::query();

        // Apply negeri scope if user has one
        if ($this->negeri && ! $this->hasAnyRole(['Super Admin', 'Admin'])) {
            $query->where('negeri', $this->negeri);
        }

        // Apply cooperative scope if user has one
        if ($this->cooperative_id && ! $this->hasAnyRole(['Super Admin', 'Admin'])) {
            $query->where('id_koperasi', $this->cooperative_id);
        }

        return $query;
    }

    /**
     * Get the cooperatives this user can access based on their scope.
     *
     * @return Builder<Cooperative>
     */
    public function getAccessibleCooperatives(): Builder
    {
        $query = Cooperative::query();

        // Apply negeri scope if user has one
        if ($this->negeri && ! $this->hasAnyRole(['Super Admin', 'Admin'])) {
            $query->where('negeri', $this->negeri);
        }

        // Apply cooperative scope if user has one
        if ($this->cooperative_id && ! $this->hasAnyRole(['Super Admin', 'Admin'])) {
            $query->where('id', $this->cooperative_id);
        }

        return $query;
    }

    // Mutators

    /**
     * Set the negeri attribute to ensure consistent format.
     */
    public function setNegeriAttribute(?string $value): void
    {
        $this->attributes['negeri'] = $value ? ucwords(strtolower(trim($value))) : null;
    }

    /**
     * Set the name attribute to ensure proper formatting.
     */
    public function setNameAttribute(string $value): void
    {
        $this->attributes['name'] = trim($value);
    }

    /**
     * Set the email attribute to ensure lowercase.
     */
    public function setEmailAttribute(string $value): void
    {
        $this->attributes['email'] = strtolower(trim($value));
    }
}
