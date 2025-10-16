<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

/**
 * LaporanTerjadual Model
 *
 * Represents scheduled reports that are automatically generated and sent
 * to specified recipients based on configured frequency and filters.
 *
 * @property int $id Primary key
 * @property int $user_id Foreign key to users table (who created the schedule)
 * @property string $nama Report name
 * @property string $format Output format ('pdf', 'xlsx', 'csv')
 * @property string $frekuensi Frequency ('daily', 'weekly', 'monthly', 'cron')
 * @property string|null $cron_expression Cron expression for custom frequency
 * @property array<string,mixed>|null $filters Report filters (negeri, koperasi, date range)
 * @property list<string>|null $recipients List of email recipients
 * @property string $status Status ('aktif', 'nyahaktif')
 * @property \Carbon\Carbon|null $last_run_at Last execution timestamp
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @property-read bool $is_active Whether the schedule is active
 * @property-read \Carbon\Carbon|null $next_run_at Next scheduled execution time
 * @property-read bool $is_due Whether the report is due to run
 *
 * @method static \Database\Factories\LaporanTerjadualFactory factory(...$parameters)
 */
class LaporanTerjadual extends Model
{
    /** @phpstan-ignore-next-line */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laporan_terjadual';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'format',
        'frekuensi',
        'cron_expression',
        'filters',
        'recipients',
        'status',
        'last_run_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var list<string>
     */
    protected $appends = [
        'is_active',
        'next_run_at',
        'is_due',
    ];

    // Relationships

    /**
     * Get the user who created this scheduled report.
     *
     * @return BelongsTo<\App\Models\User, \App\Models\LaporanTerjadual>
     */
    public function user(): BelongsTo
    {
        /** @phpstan-ignore-next-line */
        return $this->belongsTo(User::class);
    }

    // Query Scopes

    /**
     * Scope query to include only active reports.
     *
     * @param  Builder<\App\Models\LaporanTerjadual>  $query
     * @return Builder<\App\Models\LaporanTerjadual>
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'aktif');
    }

    /**
     * Scope query to include only inactive reports.
     */
    /**
     * Scope query to include only inactive reports.
     *
     * @param  Builder<\App\Models\LaporanTerjadual>  $query
     * @return Builder<\App\Models\LaporanTerjadual>
     */
    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('status', 'nyahaktif');
    }

    /**
     * Scope query to filter by format.
     */
    /**
     * Scope query to filter by format.
     *
     * @param  Builder<\App\Models\LaporanTerjadual>  $query
     * @return Builder<\App\Models\LaporanTerjadual>
     */
    public function scopeByFormat(Builder $query, string $format): Builder
    {
        return $query->where('format', $format);
    }

    /**
     * Scope query to filter by frequency.
     */
    /**
     * Scope query to filter by frequency.
     *
     * @param  Builder<\App\Models\LaporanTerjadual>  $query
     * @return Builder<\App\Models\LaporanTerjadual>
     */
    public function scopeByFrekuensi(Builder $query, string $frekuensi): Builder
    {
        return $query->where('frekuensi', $frekuensi);
    }

    /**
     * Scope query to filter by user.
     */
    /**
     * Scope query to filter by user.
     *
     * @param  Builder<\App\Models\LaporanTerjadual>  $query
     * @return Builder<\App\Models\LaporanTerjadual>
     */
    public function scopeByUser(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope query to include reports that are due to run.
     */
    /**
     * Scope query to include reports that are due to run.
     *
     * @param  Builder<\App\Models\LaporanTerjadual>  $query
     * @return Builder<\App\Models\LaporanTerjadual>
     */
    public function scopeDue(Builder $query): Builder
    {
        return $query->where('status', 'aktif')->where(function (Builder $query): void {
            $now = now();
            $this->applyDailyDueFilter($query, $now);
            $this->applyWeeklyDueFilter($query, $now);
            $this->applyMonthlyDueFilter($query, $now);
        });
    }

    /**
     * @param  Builder<\App\Models\LaporanTerjadual>  $query
     */
    private function applyDailyDueFilter(Builder $query, \Carbon\Carbon $now): void
    {
        $query->where(function (Builder $query) use ($now): void {
            $query->where('frekuensi', 'daily')
                ->where(function (Builder $query) use ($now): void {
                    $query->whereNull('last_run_at')
                        ->orWhere('last_run_at', '<', $now->copy()->startOfDay());
                });
        })
            ->orWhere(function (Builder $query) use ($now): void {
                $this->applyWeeklyDueFilter($query, $now);
            })
            ->orWhere(function (Builder $query) use ($now): void {
                $this->applyMonthlyDueFilter($query, $now);
            });
    }

    /**
     * @param  Builder<\App\Models\LaporanTerjadual>  $query
     */
    private function applyWeeklyDueFilter(Builder $query, \Carbon\Carbon $now): void
    {
        $query->where('frekuensi', 'weekly')
            ->where(function (Builder $query) use ($now): void {
                $query->whereNull('last_run_at')
                    ->orWhere('last_run_at', '<', $now->copy()->startOfWeek());
            });
    }

    /**
     * @param  Builder<\App\Models\LaporanTerjadual>  $query
     */
    private function applyMonthlyDueFilter(Builder $query, \Carbon\Carbon $now): void
    {
        $query->where('frekuensi', 'monthly')
            ->where(function (Builder $query) use ($now): void {
                $query->whereNull('last_run_at')
                    ->orWhere('last_run_at', '<', $now->copy()->startOfMonth());
            });
    }

    // Accessors

    /**
     * Check if the scheduled report is active.
     */
    public function getIsActiveAttribute(): bool
    {
        return $this->status === 'aktif';
    }

    /**
     * Get the next scheduled run time.
     */
    public function getNextRunAtAttribute(): ?Carbon
    {
        if (! $this->is_active) {
            return null;
        }

        $lastRun = $this->last_run_at ?? $this->created_at;

        return match ($this->frekuensi) {
            'daily' => $lastRun->copy()->addDay()->startOfDay(),
            'weekly' => $lastRun->copy()->addWeek()->startOfWeek(),
            'monthly' => $lastRun->copy()->addMonth()->startOfMonth(),
            'cron' => $this->calculateNextCronRun(),
            default => null
        };
    }

    /**
     * Check if the report is due to run.
     */
    public function getIsDueAttribute(): bool
    {
        if (! $this->is_active) {
            return false;
        }

        $nextRun = $this->next_run_at;

        return $nextRun ? $nextRun->isPast() : false;
    }

    // Helper Methods

    /**
     * Calculate next run time for cron expression.
     */
    private function calculateNextCronRun(): ?Carbon
    {
        if (! $this->cron_expression) {
            return null;
        }

        if (class_exists(\Cron\CronExpression::class)) {
            try {
                $expression = \Cron\CronExpression::factory($this->cron_expression);
                $nextRun = $expression->getNextRunDate();

                return Carbon::instance($nextRun);
            } catch (\Throwable $e) {
                // Ignore invalid expression and fall back to null
                Log::debug("Invalid cron expression: {$this->cron_expression}", ['error' => $e->getMessage()]);
            }
        }

        return null;
    }

    /**
     * Mark the report as executed.
     */
    public function markAsExecuted(): bool
    {
        return $this->update(['last_run_at' => now()]);
    }

    /**
     * Activate the scheduled report.
     */
    public function activate(): bool
    {
        return $this->update(['status' => 'aktif']);
    }

    /**
     * Deactivate the scheduled report.
     */
    public function deactivate(): bool
    {
        return $this->update(['status' => 'nyahaktif']);
    }

    /**
     * Get the email recipients as an array.
     *
     * @return array<string>
     */
    public function getEmailRecipients(): array
    {
        $recipients = $this->recipients ?? [];
        if (! is_array($recipients)) {
            return [];
        }

        $normalized = [];
        foreach ($recipients as $recipient) {
            if (is_string($recipient) && $recipient !== '') {
                $normalized[] = $recipient;
            }
        }

        return $normalized;
    }

    /**
     * Add an email recipient.
     */
    public function addRecipient(string $email): bool
    {
        $recipients = $this->getEmailRecipients();

        if (! in_array($email, $recipients, true)) {
            $recipients[] = $email;

            return $this->update(['recipients' => $recipients]);
        }

        return true;
    }

    /**
     * Remove an email recipient.
     */
    public function removeRecipient(string $email): bool
    {
        $recipients = $this->getEmailRecipients();
        $filtered = array_values(array_filter(
            $recipients,
            static fn (string $recipient): bool => $recipient !== $email
        ));

        return $this->update(['recipients' => $filtered]);
    }

    /**
     * Get the report filters.
     *
     * @return array<string,mixed>
     */
    public function getReportFilters(): array
    {
        $filters = $this->filters ?? [];
        if (! is_array($filters)) {
            return [];
        }

        return $filters;
    }

    /**
     * Update report filters.
     *
     * @param  array<string,mixed>  $filters
     */
    public function updateFilters(array $filters): bool
    {
        return $this->update(['filters' => $filters]);
    }

    // Mutators

    /**
     * Set the nama attribute to ensure proper formatting.
     */
    public function setNamaAttribute(string $value): void
    {
        $this->attributes['nama'] = trim($value);
    }

    /**
     * Set the format attribute to ensure lowercase.
     */
    public function setFormatAttribute(string $value): void
    {
        $allowedFormats = ['pdf', 'xlsx', 'csv'];
        $format = strtolower(trim($value));

        if (! in_array($format, $allowedFormats)) {
            throw new \InvalidArgumentException('Format must be one of: ' . implode(', ', $allowedFormats));
        }

        $this->attributes['format'] = $format;
    }

    /**
     * Set the frekuensi attribute to ensure valid value.
     */
    public function setFrekuensiAttribute(string $value): void
    {
        $allowedFrequencies = ['daily', 'weekly', 'monthly', 'cron'];
        $frekuensi = strtolower(trim($value));

        if (! in_array($frekuensi, $allowedFrequencies)) {
            throw new \InvalidArgumentException('Frekuensi must be one of: ' . implode(', ', $allowedFrequencies));
        }

        $this->attributes['frekuensi'] = $frekuensi;
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
            'filters' => 'array',
            'recipients' => 'array',
            'last_run_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
