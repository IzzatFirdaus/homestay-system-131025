<?php

declare(strict_types=1);

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 * Export object for rendering import failure details as an Excel worksheet.
 */
final class ImportErrorExport implements FromCollection, WithHeadings
{
    /**
     * @param  Collection<int, array{Row:int,Message:string,Context:string}>  $rows
     */
    public function __construct(private readonly Collection $rows) {}

    /**
     * @return Collection<int, array{Row:int,Message:string,Context:string}>
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
        return ['Row', 'Message', 'Context'];
    }
}
