<?php

declare(strict_types=1);

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 * Simple export wrapper for array-based datasets.
 */
final class GenericArrayExport implements FromArray, WithHeadings
{
    /** @var array<int, array<string, bool|float|int|string|null>> */
    private readonly array $rows;

    /**
     * @param  array<int, string>  $headings
     * @param  array<int, array<string, bool|float|int|string|null>>  $rows
     */
    public function __construct(
        private readonly array $headings,
        array $rows,
    ) {
        $this->rows = array_values($rows);
    }

    /**
     * @return array<int, array<string, bool|float|int|string|null>>
     */
    public function array(): array
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
