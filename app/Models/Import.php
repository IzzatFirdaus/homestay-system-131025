<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Import Model
 *
 * Represents a data import session (Excel/CSV files) with tracking and metadata.
 * Used for importing homestays, performances, and other bulk data operations.
 *
 * @property int $id Primary key
 * @property int $user_id Foreign key to users table (who initiated the import)
 * @property string $type Import type (e.g., 'homestays', 'performances')
 * @property string|null $filename Original filename
 * @property string $status Import status ('queued', 'processing', 'completed', 'failed')
 * @property int $rows_total Total rows in import file
 * @property int $rows_processed Rows processed so far
 * @property int $rows_success Successfully imported rows
 * @property int $rows_failed Failed rows
 * @property array<string, mixed>|null $meta Metadata including errors, mapping, validation results
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @property-read float $progress_percentage Progress as percentage (0-100)
 * @property-read bool $is_completed Whether import is completed
 * @property-read bool $is_failed Whether import failed
 * @property-read bool $is_processing Whether import is currently processing
 */
class Import extends Model
{
    /** @use HasFactory<\Database\Factories\ImportFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'imports';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'type',
        'filename',
        'status',
        'rows_total',
        'rows_processed',
        'rows_success',
        'rows_failed',
        'meta',
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
            'rows_total' => 'integer',
            'rows_processed' => 'integer',
            'rows_success' => 'integer',
            'rows_failed' => 'integer',
            'meta' => 'array',
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
        'progress_percentage',
        'is_completed',
        'is_failed',
        'is_processing',
    ];

    // Relationships

    /**
     * Get the user who initiated this import.
     *
     * @return BelongsTo<\App\Models\User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Query Scopes

    /**
     * Scope query to filter by import type.
     *
     * @param  Builder<Import>  $query
     * @return Builder<Import>
     */
    public function scopeByType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * Scope query to filter by status.
     *
     * @param  Builder<Import>  $query
     * @return Builder<Import>
     */
    public function scopeByStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    /**
     * Scope query to include only completed imports.
     *
     * @param  Builder<Import>  $query
     * @return Builder<Import>
     */
    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope query to include only failed imports.
     *
     * @param  Builder<Import>  $query
     * @return Builder<Import>
     */
    public function scopeFailed(Builder $query): Builder
    {
        return $query->where('status', 'failed');
    }

    /**
     * Scope query to include only processing imports.
     *
     * @param  Builder<Import>  $query
     * @return Builder<Import>
     */
    public function scopeProcessing(Builder $query): Builder
    {
        return $query->where('status', 'processing');
    }

    /**
     * Scope query to include queued imports.
     *
     * @param  Builder<Import>  $query
     * @return Builder<Import>
     */
    public function scopeQueued(Builder $query): Builder
    {
        return $query->where('status', 'queued');
    }

    /**
     * Scope query to filter by user.
     *
     * @param  Builder<Import>  $query
     * @return Builder<Import>
     */
    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope query to order by newest first.
     *
     * @param  Builder<Import>  $query
     * @return Builder<Import>
     */
    public function scopeRecent(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }

    // Accessors

    /**
     * Get the import progress as percentage (0-100).
     */
    public function getProgressPercentageAttribute(): float
    {
        if ($this->rows_total === 0) {
            return 0.0;
        }

        return round($this->rows_processed / $this->rows_total * 100, 2);
    }

    /**
     * Check if the import is completed.
     */
    public function getIsCompletedAttribute(): bool
    {
        return $this->status === 'completed';
    }

    /**
     * Check if the import failed.
     */
    public function getIsFailedAttribute(): bool
    {
        return $this->status === 'failed';
    }

    /**
     * Check if the import is currently processing.
     */
    public function getIsProcessingAttribute(): bool
    {
        return $this->status === 'processing';
    }

    // Mutators

    /**
     * Set the type attribute to ensure lowercase format.
     */
    public function setTypeAttribute(string $value): void
    {
        $this->attributes['type'] = strtolower(trim($value));
    }

    /**
     * Set the filename attribute to ensure proper formatting.
     */
    public function setFilenameAttribute(?string $value): void
    {
        $this->attributes['filename'] = $value ? trim($value) : null;
    }

    // Helper Methods

    /**
     * Mark the import as processing.
     */
    public function markAsProcessing(): bool
    {
        return $this->update(['status' => 'processing']);
    }

    /**
     * Mark the import as completed.
     */
    public function markAsCompleted(): bool
    {
        return $this->update(['status' => 'completed']);
    }

    /**
     * Mark the import as failed.
     */
    public function markAsFailed(): bool
    {
        return $this->update(['status' => 'failed']);
    }

    /**
     * Update the progress counters.
     */
    public function updateProgress(int $processed, int $success, int $failed): bool
    {
        return $this->update([
            'rows_processed' => $processed,
            'rows_success' => $success,
            'rows_failed' => $failed,
        ]);
    }

    /**
     * Add error information to meta data.
     *
     * @param  array<string, mixed>|null  $context
     */
    public function addError(string $error, ?array $context = null): bool
    {
        $meta = $this->meta ?? [];
        $meta['errors'] = $meta['errors'] ?? [];
        $meta['errors'][] = [
            'message' => $error,
            'context' => $context,
            'timestamp' => now()->toISOString(),
        ];

        return $this->update(['meta' => $meta]);
    }

    /**
     * Get validation errors from meta data.
     *
     * @return array<array<string, mixed>>
     */
    public function getValidationErrors(): array
    {
        return $this->meta['validation_errors'] ?? [];
    }

    /**
     * Add validation errors to meta data (not a classic setter).
     *
     * @param  array<array<string, mixed>>  $errors
     */
    public function addValidationErrors(array $errors): bool
    {
        $meta = $this->meta ?? [];
        $meta['validation_errors'] = $errors;

        return $this->update(['meta' => $meta]);
    }
}
