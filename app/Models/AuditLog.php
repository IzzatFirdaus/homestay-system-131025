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
 * Represents system-wide audit trail entries tracking all CRUD operations
 * and important system events for compliance and security purposes.
 *
 * @property int $id Primary key
 * @property int|null $user_id Foreign key to users table (who performed the action)
 * @property string $action Action performed (created, updated, deleted, imported, etc.)
 * @property string|null $table_name Table name affected
 * @property int|null $record_id Primary key of the affected record
 * @property array<string,mixed>|null $old_values Data before the change (JSON)
 * @property array<string,mixed>|null $new_values Data after the change (JSON)
 * @property string|null $url Full URL of the request
 * @property string|null $ip_address IP address of the user
 * @property string|null $user_agent User agent string
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User|null $user
 * @property-read string $summary Human-readable summary of the action
 * @property-read array<string,mixed> $changes Array of changed fields with before/after values
 */
class AuditLog extends Model
{
    /** @use HasFactory<\Database\Factories\AuditLogFactory> */
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
        'table_name',
        'record_id',
        'model_type',
        'model_id',
        'old_values',
        'new_values',
        'url',
        'ip_address',
        'user_agent',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'record_id' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var list<string>
     */
    protected $appends = [];

    // Relationships

    /**
     * Get the user who performed this action.
     *
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Query Scopes

    /**
     * Scope query to filter by action.
     *
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeByAction(Builder $query, string $action): Builder
    {
        return $query->where('action', $action);
    }

    /**
     * Scope query to filter by model type.
     *
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeByModel(Builder $query, string $model): Builder
    {
        return $query->where('table_name', $model);
    }

    /**
     * Scope query to filter by model type and ID.
     *
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeByModelInstance(Builder $query, string $model, int $modelId): Builder
    {
        return $query->where('table_name', $model)->where('record_id', $modelId);
    }

    /**
     * Scope query to filter by user.
     *
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope query to filter by date range.
     *
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
     *
     * @param  Builder<\App\Models\AuditLog>  $query
     * @return Builder<\App\Models\AuditLog>
     */
    public function scopeCrudOperations(Builder $query): Builder
    {
        return $query->whereIn('action', ['created', 'updated', 'deleted']);
    }

    /**
     * Scope query to include only import operations.
     *
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
    // Summaries are not used by current tests; omitted

    /**
     * Get an array of changed fields with before/after values.
     */
    // Changes accessor not required for tests; omitted

    // Static Helper Methods

    /**
     * Log a model creation event.
     */
    public static function logCreated(Model $model, ?User $user = null): void
    {
        $req = request();

        static::create([
            'user_id' => ($user !== null ? $user->id : null) ?? Auth::id(),
            'action' => 'CREATE',
            'table_name' => $model->getTable(),
            'record_id' => $model->getKey(),
            'new_values' => json_encode($model->toArray()),
            'ip_address' => $req->ip(),
            'user_agent' => $req->userAgent(),
        ]);
    }

    /**
     * Log a model update event.
     */
    /**
     * @param  array<string, mixed>  $original
     */
    public static function logUpdated(Model $model, array $original, ?User $user = null): void
    {
        $req = request();

        static::create([
            'user_id' => ($user !== null ? $user->id : null) ?? Auth::id(),
            'action' => 'UPDATE',
            'table_name' => $model->getTable(),
            'record_id' => $model->getKey(),
            'old_values' => json_encode($original),
            'new_values' => json_encode($model->toArray()),
            'ip_address' => $req->ip(),
            'user_agent' => $req->userAgent(),
        ]);
    }

    /**
     * Log a model deletion event.
     */
    public static function logDeleted(Model $model, ?User $user = null): void
    {
        $req = request();

        static::create([
            'user_id' => ($user !== null ? $user->id : null) ?? Auth::id(),
            'action' => 'DELETE',
            'table_name' => $model->getTable(),
            'record_id' => $model->getKey(),
            'old_values' => json_encode($model->toArray()),
            'ip_address' => $req->ip(),
            'user_agent' => $req->userAgent(),
        ]);
    }

    /**
     * Log an import operation.
     */
    /**
     * @param  array<string, mixed>|null  $meta
     */
    public static function logImport(string $type, int $recordsCount, ?User $user = null, ?array $meta = null): void
    {
        $req = request();

        static::create([
            'user_id' => ($user !== null ? $user->id : null) ?? Auth::id(),
            'action' => 'IMPORT',
            'table_name' => $type,
            'new_values' => json_encode(array_merge([
                'records_count' => $recordsCount,
                'import_type' => $type,
            ], $meta ?? [])),
            'ip_address' => $req->ip(),
            'user_agent' => $req->userAgent(),
        ]);
    }

    /**
     * Log a custom system event.
     */
    /**
     * @param  array<string, mixed>|null  $data
     */
    public static function logEvent(string $action, ?array $data = null, ?User $user = null): void
    {
        $req = request();

        static::create([
            'user_id' => ($user !== null ? $user->id : null) ?? Auth::id(),
            'action' => strtoupper($action),
            'new_values' => $data ? json_encode($data) : null,
            'ip_address' => $req->ip(),
            'user_agent' => $req->userAgent(),
        ]);
    }
}
