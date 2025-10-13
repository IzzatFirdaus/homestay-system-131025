<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Cooperative Model
 *
 * Represents a cooperative organization that manages homestays.
 * Cooperatives are organized by state and can manage multiple homestays.
 *
 * @property int $id Primary key
 * @property string $nama Cooperative name
 * @property string $negeri State code (e.g., 'Selangor', 'Johor')
 * @property string|null $alamat Cooperative address
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int,\App\Models\Homestay> $homestays
 * @property-read int $jumlah_homestay Number of homestays managed
 * @property-read int $jumlah_homestay_aktif Number of active homestays
 *
 * @method static \Database\Factories\CooperativeFactory factory(...$parameters)
 */
class Cooperative extends Model
{
    /** @phpstan-ignore-next-line */
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
    /**
     * The accessors to append to the model's array form.
        'negeri',
        'alamat',
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
     * Get all homestays managed by this cooperative.
     *
     * @return HasMany<\App\Models\Homestay, \App\Models\Cooperative>
     */
    public function homestays(): HasMany
    {
        /** @phpstan-ignore-next-line */
        return $this->hasMany(Homestay::class, 'id_koperasi');
    }

    // Query Scopes

    /**
     * Scope query to filter by negeri (state).
     *
     * @param  Builder<\App\Models\Cooperative>  $query
     * @return Builder<\App\Models\Cooperative>
     */
    public function scopeByNegeri(Builder $query, string $negeri): Builder
    {
        return $query->where('negeri', $negeri);
    }

    /**
     * Scope query to include cooperatives with active homestays.
     *
     * @param  Builder<\App\Models\Cooperative>  $query
     * @return Builder<\App\Models\Cooperative>
     */
    public function scopeWithActiveHomestays(Builder $query): Builder
    {
        return $query->whereHas('homestays', function (Builder $query): void {
            /** @phpstan-ignore-next-line */
            $query->where('status', 'Aktif');
        });
    }

    // Accessors

    /**
     * Get the total number of homestays managed by this cooperative.
     */
    public function getJumlahHomestayAttribute(): int
    {
        return $this->homestays()->count();
    }

    /**
     * Get the number of active homestays managed by this cooperative.
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
