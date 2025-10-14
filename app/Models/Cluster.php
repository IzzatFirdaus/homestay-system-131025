<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Homestay[] $homestays
 * @property-read int $jumlah_homestay Number of homestays in cluster
 * @property-read int $jumlah_homestay_aktif Number of active homestays in cluster
 */
class Cluster extends Model
{
    /** @use HasFactory<\Database\Factories\ClusterFactory> */
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
        'negeri',
        'keterangan',
    ];

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
     * Get all homestays in this cluster.
     *
     * @return HasMany<\App\Models\Homestay, $this>
     */
    public function homestays(): HasMany
    {
        return $this->hasMany(Homestay::class);
    }

    // Query Scopes

    /**
     * Scope query to filter by negeri (state).
     *
     * @param  Builder<\App\Models\Cluster>  $query
     * @return Builder<\App\Models\Cluster>
     */
    public function scopeByNegeri(Builder $query, string $negeri): Builder
    {
        return $query->where('negeri', $negeri);
    }

    /**
     * Scope query to include clusters with active homestays.
     *
     * @param  Builder<\App\Models\Cluster>  $query
     * @return Builder<\App\Models\Cluster>
     */
    public function scopeWithActiveHomestays(Builder $query): Builder
    {
        return $query->whereHas('homestays', function (Builder $query): void {
            $query->where('status', 'Aktif');
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
}
