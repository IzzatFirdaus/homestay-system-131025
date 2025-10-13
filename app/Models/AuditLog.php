<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * AuditLog Model
 *
 * Represents audit trail entries tracking CRUD operations and
 * important system events for compliance and security purposes.
 *
 * @property int $id Primary key
 * @property int|null $user_id Foreign key to users table (who performed the action)
 * @property string $action Action performed (created, updated, deleted, imported, etc.)
 * @property string|null $model Model class name that was affected
 * @property int|null $model_id Primary key of the affected model
 * @property array|null $before Data before the change (JSON)
 * @property array|null $after Data after the change (JSON)
 *
 * @phpstan-property array<string,scalar|null>|null $before
 * @phpstan-property array<string,scalar|null>|null $after
 *
 * @property string|null $ip_address IP address of the user
 * @property string|null $user_agent User agent string
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User|null $user
 * @property-read string $summary Human-readable summary of the action
 * @property-read array $changes Array of changed
 *
 * @phpstan-property-read array<string,array{
 *     before: array|bool|int|float|string|null,
 *     after: array|bool|int|float|string|null
 * }> $changes Array of changed
 *             fields with before/after values
 */
/**
 * @phpstan-use \Illuminate\Database\Eloquent\Factories\HasFactory<\App\Models\AuditLog>
 */
class AuditLog extends Model
{
    /** @phpstan-ignore-next-line */
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'audit_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'action',
        'model',
        'model_id',
        'before',
        'after',
        'ip_address',
        'user_agent',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var list<string>
     */
    protected $appends = [
        'summary',
        'changes',
    ];

    // Relationships

    /**
     * Get the user who performed this action.
     *
     * @return BelongsTo<User, AuditLog>
     */
    /**
     * @phpstan-ignore-next-line
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Query Scopes

    /**
     * Scope query to filter by action.
     */
    /**
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeByAction(Builder $query, string $action): Builder
    {
        return $query->where('action', $action);
    }

    /**
     * Scope query to filter by model type.
     */
    /**
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeByModel(Builder $query, string $model): Builder
    {
        return $query->where('model', $model);
    }

    /**
     * Scope query to filter by model type and ID.
     */
    /**
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeByModelInstance(Builder $query, string $model, int $modelId): Builder
    {
        return $query->where('model', $model)->where('model_id', $modelId);
    }

    /**
     * Scope query to filter by user.
     */
    /**
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope query to filter by date range.
     */
    /**
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeBetweenDates(Builder $query, \Carbon\Carbon $from, \Carbon\Carbon $to): Builder
    {
        return $query->whereBetween('created_at', [$from, $to]);
    }

    /**
     * Scope query to filter by today's activities.
     */
    /**
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('created_at', now()->toDateString());
    }

    /**
     * Scope query to order by newest first.
     */
    /**
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeRecent(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Scope query to include only CRUD operations.
     */
    /**
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeCrudOperations(Builder $query): Builder
    {
        return $query->whereIn('action', ['created', 'updated', 'deleted']);
    }

    /**
     * Scope query to include only import operations.
     */
    /**
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeImportOperations(Builder $query): Builder
    {
        return $query->where('action', 'like', '%import%');
    }

    // Accessors

    /**
     * Get a human-readable summary of the audit log entry.
     */
    public function getSummaryAttribute(): string
    {
        $userName = 'System';
        if ($this->user instanceof \App\Models\User && is_string($this->user->name)) {
            $userName = $this->user->name;
        }
        $modelName = $this->model ? class_basename($this->model) : 'Unknown';

        $action = match ($this->action) {
            'created' => 'created',
            'updated' => 'updated',
            'deleted' => 'deleted',
            'imported' => 'imported',
            default => $this->action
        };

        if ($this->model_id) {
            return sprintf('%s %s %s #%s', (string) $userName, $action, $modelName, $this->model_id);
        }

        return sprintf('%s performed %s action', (string) $userName, $action);
    }

    /**
     * Get an array of changed fields with before/after values.
     *
     * @return array<string, array<string, mixed>>
     */
    public function getChangesAttribute(): array
    {
        if (! $this->before || ! $this->after) {
            return [];
        }

        $changes = [];
        /** @var array<string,mixed> $before */
        $before = $this->before;
        /** @var array<string,mixed> $after */
        $after = $this->after;

        foreach ($after as $field => $newValue) {
            $oldValue = $before[$field] ?? null;

            if ($oldValue !== $newValue) {
                $changes[$field] = [
                    'before' => $oldValue,
                    'after' => $newValue,
                ];
            }
        }

        return $changes;
    }

    // Static Helper Methods

    /**
     * Log a model creation event.
     */
    public static function logCreated(Model $model, ?User $user = null): void
    {
        static::create([
            'user_id' => $user ? $user->id : Auth::id(),
            'action' => 'created',
            'model' => $model::class,
            'model_id' => $model->getKey(),
            'after' => $model->toArray(),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * Log a model update event.
     */
    /**
     * @phpstan-param array<string,scalar|null>  $original
     */
    public static function logUpdated(Model $model, array $original, ?User $user = null): void
    {
        static::create([
            'user_id' => $user ? $user->id : Auth::id(),
            'action' => 'updated',
            'model' => $model::class,
            'model_id' => $model->getKey(),
            'before' => $original,
            'after' => $model->toArray(),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * Log a model deletion event.
     */
    public static function logDeleted(Model $model, ?User $user = null): void
    {
        static::create([
            'user_id' => $user ? $user->id : Auth::id(),
            'action' => 'deleted',
            'model' => $model::class,
            'model_id' => $model->getKey(),
            'before' => $model->toArray(),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * Log an import operation.
     */
    /**
     * @phpstan-param array<string,scalar|null>|null  $meta
     */
    public static function logImport(string $type, int $recordsCount, ?User $user = null, ?array $meta = null): void
    {
        static::create([
            'user_id' => $user ? $user->id : Auth::id(),
            'action' => 'imported',
            'model' => $type,
            'after' => array_merge([
                'records_count' => $recordsCount,
                'import_type' => $type,
            ], $meta ?? []),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * Log a custom system event.
     */
    /**
     * @phpstan-param array<string,scalar|null>|null  $data
     */
    public static function logEvent(string $action, ?array $data = null, ?User $user = null): void
    {
        static::create([
            'user_id' => $user ? $user->id : Auth::id(),
            'action' => $action,
            'after' => $data,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'model_id' => 'integer',
            'before' => 'array',
            'after' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
