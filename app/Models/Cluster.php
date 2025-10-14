<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Cluster Model
 *
 * Represents a themed cluster or grouping of homestays (e.g., Eco-Tourism, Cultural Heritage).
 * Clusters are organized by state and can contain multiple homestays.
 *
 * @property int $id Primary key
 * @property string $nama Cluster name
 * @property string $negeri State code (e.g., 'Selangor', 'Johor')
 * @property string|null $keterangan Cluster description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int,\App\Models\Homestay> $homestays
 * @property-read int $jumlah_homestay Number of homestays in cluster
 * @property-read int $jumlah_homestay_aktif Number of active homestays in cluster
 *
 * @method static \Database\Factories\ClusterFactory factory(...$parameters)
 */
class Cluster extends Model
{
    /** @phpstan-ignore-next-line */
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     */
    protected $table = 'clusters';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'id_negeri',
        'keterangan',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var list<string>
     */
    protected $appends = [
        'jumlah_homestay',
        'jumlah_homestay_aktif',
    ];

    // Relationships

    /**
     * Get the state this cluster belongs to.
     *
     * @return BelongsTo<\App\Models\State, \App\Models\Cluster>
     */
    public function state(): BelongsTo
    {
        /** @phpstan-ignore-next-line */
        return $this->belongsTo(State::class, 'id_negeri');
    }

    /**
     * Get all homestays in this cluster.
     *
     * @return HasMany<\App\Models\Homestay, \App\Models\Cluster>
     */
    public function homestays(): HasMany
    {
        /** @phpstan-ignore-next-line */
        return $this->hasMany(Homestay::class, 'id_kluster');
    }

    // Query Scopes

    /**
     * Scope query to filter by negeri (state) ID.
     *
     * @param  Builder<\App\Models\Cluster>  $query
     * @return Builder<\App\Models\Cluster>
     */
    public function scopeByNegeri(Builder $query, int $id_negeri): Builder
    {
        return $query->where('id_negeri', $id_negeri);
    }

    /**
     * Scope query to include clusters with active homestays.
     *
     * @param  Builder<\App\Models\Cluster>  $query
     * @return Builder<\App\Models\Cluster>
     */
    public function scopeWithActiveHomestays(Builder $query): Builder
    {
        return $query->whereHas('homestays', function ($homestayQuery): void {
            /** @var Builder<\App\Models\Homestay> $homestayQuery */
            $homestayQuery->where('status', 'Aktif');
        });
    }

    // Accessors

    /**
     * Get the total number of homestays in this cluster.
     */
    public function getJumlahHomestayAttribute(): int
    {
        return $this->homestays()->count();
    }

    /**
     * Get the number of active homestays in this cluster.
     */
    public function getJumlahHomestayAktifAttribute(): int
    {
        return $this->homestays()->where('status', 'Aktif')->count();
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }
}
