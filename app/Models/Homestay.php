<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * Homestay Model
 *
 * Represents a homestay accommodation unit in the Malaysian homestay system.
 * Each homestay can be managed by a cooperative or individually.
 *
 * @property int $id Primary key
 * @property string $nama Homestay name
 * @property string $negeri State code (e.g., 'Selangor', 'Johor')
 * @property string|null $alamat Full address
 * @property int $kapasiti Maximum guest capacity
 * @property string|null $fasiliti Facilities description (JSON/Text)
 * @property string $model_pengurusan Management model ('koperasi', 'individu')
 * @property int|null $id_koperasi Foreign key to cooperatives table
 * @property string $status Operation status ('Aktif', 'Tidak Aktif')
 * @property int|null $cluster_id Foreign key to clusters table
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \App\Models\Cooperative|null $cooperative
 * @property-read \App\Models\Cluster|null $cluster
 * @property-read \Illuminate\Database\Eloquent\Collection<int,\App\Models\Performance> $performances
 * @property-read string $alamat_penuh Computed full address
 * @property-read int $total_pelawat_tahun_ini Total visitors this year
 * @property-read float $purata_pendapatan_bulanan Average monthly income
 *
 * @method static \Database\Factories\HomestayFactory factory(...$parameters)
 */
class Homestay extends Model
{
    /** @phpstan-ignore-next-line */
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'homestays';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'negeri',
        'alamat',
        'kapasiti',
        'fasiliti',
        'model_pengurusan',
        'id_koperasi',
        'status',
        'cluster_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var list<string>
     */
    protected $appends = [
        'alamat_penuh',
        'total_pelawat_tahun_ini',
        'purata_pendapatan_bulanan',
    ];

    // Relationships

    /**
     * Get the cooperative that manages this homestay.
     *
     * @return BelongsTo<\App\Models\Cooperative, \App\Models\Homestay>
     */
    public function cooperative(): BelongsTo
    {
        /** @phpstan-ignore-next-line */
        return $this->belongsTo(Cooperative::class, 'id_koperasi');
    }

    /**
     * Get the cluster this homestay belongs to.
     *
     * @return BelongsTo<\App\Models\Cluster, \App\Models\Homestay>
     */
    public function cluster(): BelongsTo
    {
        /** @phpstan-ignore-next-line */
        return $this->belongsTo(Cluster::class);
    }

    /**
     * Get all performance records for this homestay.
     *
     * @return HasMany<\App\Models\Performance, \App\Models\Homestay>
     */
    public function performances(): HasMany
    {
        /** @phpstan-ignore-next-line */
        return $this->hasMany(Performance::class);
    }

    // Query Scopes

    /**
     * Scope query to only include active homestays.
     *
     * @param  Builder<\App\Models\Homestay>  $query
     * @return Builder<\App\Models\Homestay>
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'Aktif');
    }

    /**
     * Scope query to filter by negeri (state).
     *
     * @param  Builder<\App\Models\Homestay>  $query
     * @return Builder<\App\Models\Homestay>
     */
    public function scopeByNegeri(Builder $query, string $negeri): Builder
    {
        return $query->where('negeri', $negeri);
    }

    /**
     * Scope query to filter by cooperative.
     *
     * @param  Builder<\App\Models\Homestay>  $query
     * @return Builder<\App\Models\Homestay>
     */
    public function scopeByKoperasi(Builder $query, int $koperasiId): Builder
    {
        return $query->where('id_koperasi', $koperasiId);
    }

    /**
     * Scope query to filter by management model.
     *
     * @param  Builder<\App\Models\Homestay>  $query
     * @return Builder<\App\Models\Homestay>
     */
    public function scopeByModelPengurusan(Builder $query, string $model): Builder
    {
        return $query->where('model_pengurusan', $model);
    }

    /**
     * Scope query to include cooperative-managed homestays only.
     *
     * @param  Builder<\App\Models\Homestay>  $query
     * @return Builder<\App\Models\Homestay>
     */
    public function scopeKoperasi(Builder $query): Builder
    {
        return $query->where('model_pengurusan', 'koperasi');
    }

    /**
     * Scope query to include individually-managed homestays only.
     *
     * @param  Builder<\App\Models\Homestay>  $query
     * @return Builder<\App\Models\Homestay>
     */
    public function scopeIndividu(Builder $query): Builder
    {
        return $query->where('model_pengurusan', 'individu');
    }

    /**
     * Scope query to filter by cluster.
     *
     * @param  Builder<\App\Models\Homestay>  $query
     * @return Builder<\App\Models\Homestay>
     */
    public function scopeByCluster(Builder $query, int $clusterId): Builder
    {
        return $query->where('cluster_id', $clusterId);
    }

    // Accessors

    /**
     * Get the formatted full address.
     */
    public function getAlamatPenuhAttribute(): string
    {
        $parts = array_filter([
            $this->alamat,
            $this->negeri,
            'Malaysia',
        ]);

        return implode(', ', $parts);
    }

    /**
     * Get total visitors for current year.
     */
    public function getTotalPelawatTahunIniAttribute(): int
    {
        $total = $this->performances()
            ->whereYear('created_at', now()->year)
            ->sum(DB::raw('pelawat_domestik + pelawat_asing'));

        return (int) $total;
    }

    /**
     * Get average monthly income (last 12 months).
     */
    public function getPurataPendapatanBulananAttribute(): float
    {
        $average = $this->performances()
            ->where('created_at', '>=', now()->subMonths(12))
            ->avg(DB::raw('pendapatan + sumber_lain'));

        return round((float) $average, 2);
    }

    // Mutators

    /**
     * Set the negeri attribute to ensure consistent format.
     */
    public function setNegeriAttribute(string $value): void
    {
        $this->attributes['negeri'] = ucwords(strtolower(trim($value)));
    }

    /**
     * Set the nama attribute to ensure proper formatting.
     */
    public function setNamaAttribute(string $value): void
    {
        $this->attributes['nama'] = trim($value);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'kapasiti' => 'integer',
            'id_koperasi' => 'integer',
            'cluster_id' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }
}
