<?php

declare(strict_types=1);

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;

/**
 * Lightweight import class that exposes spreadsheet rows as a raw collection.
 */
final class GenericArrayImport implements ToCollection
{
    use Importable;

    /**
     * @param  Collection<int, Collection<int, mixed>>  $collection
     * @return Collection<int, Collection<int, mixed>>
     */
    public function collection(Collection $collection): Collection
    {
        return $collection;
    }
}
