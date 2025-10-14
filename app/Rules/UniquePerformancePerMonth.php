<?php

declare(strict_types=1);

namespace App\Rules;

use App\Models\Performance;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * Validates that a performance record for a given homestay, month, and year doesn't already exist.
 *
 * This enforces the unique constraint on (homestay_id, bulan, tahun) at the validation layer.
 * When updating, it ignores the current record being updated.
 */
class UniquePerformancePerMonth implements DataAwareRule, ValidationRule
{
    /**
     * All of the data under validation.
     *
     * @var array<string, mixed>
     */
    protected array $data = [];

    /**
     * The ID of the performance record being updated (null for new records).
     */
    protected ?int $ignoreId = null;

    /**
     * Create a new rule instance.
     *
     * @param  int|null  $ignoreId  The ID of the performance record to ignore (for updates)
     */
    public function __construct(?int $ignoreId = null)
    {
        $this->ignoreId = $ignoreId;
    }

    /**
     * Set the data under validation.
     *
     * @param  array<string, mixed>  $data
     */
    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $homestayId = $this->data['homestay_id'] ?? null;
        $bulan = $this->data['bulan'] ?? null;
        $tahun = $this->data['tahun'] ?? null;

        // If any required fields are missing, let other validators handle it
        if (! $homestayId || ! $bulan || ! $tahun) {
            return;
        }

        $query = Performance::query()
            ->where('homestay_id', $homestayId)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun);

        // Ignore the current record when updating
        if ($this->ignoreId !== null) {
            $query->where('id', '!=', $this->ignoreId);
        }

        if ($query->exists()) {
            $fail(__('validation.performance.unique_monthly', [
                'homestay_id' => $homestayId,
                'bulan' => $bulan,
                'tahun' => $tahun,
            ]));
        }
    }
}
