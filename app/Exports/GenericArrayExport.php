<?php

declare(strict_types=1);

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 * Simple export wrapper for array-based datasets.
 */
final class GenericArrayExport implements FromCollection, WithHeadings
{
    /**
     * @param  array<int, string>  $headings
     * @param  Collection<int, array<string, scalar|null>>  $rows
     */
    public function __construct(
        private readonly array $headings,
        private readonly Collection $rows,
    ) {}

    /**
     * @return Collection<int, array<string, scalar|null>>
     */
    public function collection(): Collection
    {
        return $this->rows;
    }

    /**
     * @return array<int, string>
     */
    public function headings(): array
    {
        return $this->headings;
    }
}
