<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * State Model
 *
 * Represents a Malaysian state (for now primarily Sarawak).
 *
 * @property int $id Primary key
 * @property string $name State name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class State extends Model
{
    /** @phpstan-ignore-next-line */
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'states';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    // Relationships

    /**
     * Get all clusters in this state.
     *
     * @return HasMany<\App\Models\Cluster, \App\Models\State>
     */
    public function clusters(): HasMany
    {
        /** @phpstan-ignore-next-line */
        return $this->hasMany(Cluster::class, 'id_negeri');
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
        ];
    }
}
