<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\ValidatesPerformanceData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Performance Model
 *
 * Represents monthly performance data for a homestay.
 * This is the fact table in the star schema design containing visitor and revenue metrics.
 *
 * @property int $id Primary key
 * @property int $homestay_id Foreign key to homestays table
 * @property int $bulan Month (1-12)
 * @property int $tahun Year
 * @property int $pelawat_domestik Domestic visitors count
 * @property int $pelawat_asing Foreign visitors count
 * @property float $pendapatan Primary income (MYR)
 * @property float $sumber_lain Other income sources (MYR)
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Homestay $homestay
 * @property-read int $total_pelawat Total visitors (domestic + foreign)
 * @property-read float $total_pendapatan Total income (pendapatan + sumber_lain)
 * @property-read string $bulan_tahun Formatted month-year (e.g., "October 2025")
 * @property array<string, mixed>|null $_original_for_audit Temporary property for audit observer
 * @property array<string, mixed>|null $_data_for_audit Temporary property for audit observer
 *
 * @method static \Database\Factories\PerformanceFactory factory(...$parameters)
 */
class Performance extends Model
{
    /** @phpstan-use \Illuminate\Database\Eloquent\Factories\HasFactory<\Database\Factories\PerformanceFactory> */
    use HasFactory, ValidatesPerformanceData;

    /**
     * The table associated with the model.
     */
    protected $table = 'performances';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'homestay_id',
        'bulan',
        'tahun',
        'pelawat_domestik',
        'pelawat_asing',
        'pendapatan',
        'sumber_lain',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var list<string>
     */
    protected $appends = [
        'total_pelawat',
        'total_pendapatan',
        'bulan_tahun',
    ];

    // Relationships

    /**
     * Get the homestay that this performance record belongs to.
     *
     * @return BelongsTo<Homestay, self>
     */
    public function homestay(): BelongsTo
    {
        return $this->belongsTo(Homestay::class);
    }

    // Query Scopes

    /**
     * Scope query to filter by year.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeByTahun(Builder $query, int $tahun): Builder
    {
        return $query->where('tahun', $tahun);
    }

    /**
     * Scope query to filter by month.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeByBulan(Builder $query, int $bulan): Builder
    {
        return $query->where('bulan', $bulan);
    }

    /**
     * Scope query to filter by year and month.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeByPeriod(Builder $query, int $tahun, int $bulan): Builder
    {
        return $query->where('tahun', $tahun)->where('bulan', $bulan);
    }

    /**
     * Scope query to filter by current year.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeCurrentYear(Builder $query): Builder
    {
        return $query->where('tahun', now()->year);
    }

    /**
     * Scope query to filter by previous year.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopePreviousYear(Builder $query): Builder
    {
        return $query->where('tahun', now()->year - 1);
    }

    /**
     * Scope query to filter by date range.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeBetweenPeriods(
        Builder $query,
        int $fromYear,
        int $fromMonth,
        int $toYear,
        int $toMonth
    ): Builder {
        return $query->where(function (Builder $query) use ($fromYear, $fromMonth): void {
            $query->where('tahun', '>', $fromYear)
                ->orWhere(function (Builder $query) use ($fromYear, $fromMonth): void {
                    $query->where('tahun', $fromYear)->where('bulan', '>=', $fromMonth);
                });
        })->where(function (Builder $query) use ($toYear, $toMonth): void {
            $query->where('tahun', '<', $toYear)
                ->orWhere(function (Builder $query) use ($toYear, $toMonth): void {
                    $query->where('tahun', $toYear)->where('bulan', '<=', $toMonth);
                });
        });
    }

    /**
     * Scope query to include homestay relationship data.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeWithHomestay(Builder $query): Builder
    {
        return $query->with('homestay');
    }

    /**
     * Scope query to filter by negeri through homestay relationship.
     *
     * @param  Builder<self>  $query
     * @return Builder<self>
     */
    public function scopeByNegeri(Builder $query, string $negeri): Builder
    {
        return $query->whereHas('homestay', function ($homestayQuery) use ($negeri): void {
            /** @var Builder<\App\Models\Homestay> $homestayQuery */
            $homestayQuery->where('negeri', $negeri);
        });
    }

    // Accessors

    /**
     * Get the total number of visitors (domestic + foreign).
     */
    public function getTotalPelawatAttribute(): int
    {
        return (int) $this->pelawat_domestik + (int) $this->pelawat_asing;
    }

    /**
     * Get the total income (pendapatan + sumber_lain).
     */
    public function getTotalPendapatanAttribute(): float
    {
        return round((float) $this->pendapatan + (float) $this->sumber_lain, 2);
    }

    /**
     * Get formatted month-year string.
     */
    public function getBulanTahunAttribute(): string
    {
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Mac', 4 => 'April',
            5 => 'Mei', 6 => 'Jun', 7 => 'Julai', 8 => 'Ogos',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Disember',
        ];

        $monthName = $months[$this->bulan] ?? 'Tidak Diketahui';

        return $monthName.' '.$this->tahun;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'homestay_id' => 'integer',
            'bulan' => 'integer',
            'tahun' => 'integer',
            'pelawat_domestik' => 'integer',
            'pelawat_asing' => 'integer',
            'pendapatan' => 'float',
            'sumber_lain' => 'float',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    // Mutators (validation logic implemented in ValidatesPerformanceData trait)
}
