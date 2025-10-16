<?php

declare(strict_types=1);

namespace App\Services\Import;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Normalizes spreadsheet rows into sanitized associative arrays.
 */
final class RowNormalizer
{
    /**
     * Normalize spreadsheet rows into sanitized associative arrays.
     *
     * @param  Collection<array-key, Collection<int, mixed>|array<int, mixed>>  $rows
     * @return array<int, array<string, bool|float|int|string|null>>
     *
     * @phpstan-return array<int, array<string, bool|float|int|string|null>>
     */
    public function normalize(Collection $rows): array
    {
        $rowsArray = $this->convertRowsToArray($rows);
        if ($rowsArray === []) {
            return [];
        }

        $headings = $this->prepareHeadings(array_shift($rowsArray));
        if ($headings->isEmpty()) {
            return [];
        }

        return collect(array_values($rowsArray))
            ->map(fn (array $row): array => $this->normalizeRow($row, $headings))
            ->filter(fn (array $row): bool => $this->rowHasValues($row))
            ->values()
            ->toArray();
    }

    /**
     * Convert a collection of rows to a plain array.
     *
     * @param  Collection<array-key, Collection<int, mixed>|array<int, mixed>>  $rows
     * @return array<int, array<int, bool|float|int|string|null>>
     */
    private function convertRowsToArray(Collection $rows): array
    {
        return $rows
            ->map(static fn ($row) => $row instanceof Collection ? $row->toArray() : (array) $row)
            ->toArray();
    }

    /**
     * Prepare headings from the first row.
     *
     * @param  array<int, bool|float|int|string|null>|null  $headingsRow
     * @return Collection<int, string>
     */
    private function prepareHeadings(?array $headingsRow): Collection
    {
        return collect($headingsRow ?? [])
            ->map(static fn ($heading): string => Str::snake(
                Str::lower(is_scalar($heading) ? trim((string) $heading) : '')
            ));
    }

    /**
     * Normalize a single row using headings.
     *
     * @param  array<int, bool|float|int|string|null>  $row
     * @param  Collection<int, string>  $headings
     * @return array<string, bool|float|int|string|null>
     */
    private function normalizeRow(array $row, Collection $headings): array
    {
        $assoc = $this->associateHeadings($row, $headings);
        $assoc = $this->canonicalizeRowKeys($assoc);

        return $this->trimScalarValues($assoc);
    }

    /**
     * Associate headings with row values.
     *
     * @param  array<int, bool|float|int|string|null>  $row
     * @param  Collection<int, string>  $headings
     * @return array<string, bool|float|int|string|null>
     */
    private function associateHeadings(array $row, Collection $headings): array
    {
        $values = array_pad(array_values($row), $headings->count(), null);

        return $headings
            ->values()
            ->mapWithKeys(fn (string $heading, int $index): array => [
                $heading => $this->normalizeValue($values[$index] ?? null),
            ])
            ->toArray();
    }

    /**
     * Normalize a value to a scalar or JSON string.
     *
     * @param  bool|float|int|string|array<int, mixed>|null  $value
     */
    private function normalizeValue(bool|float|int|string|array|null $value): bool|float|int|string|null
    {
        if (is_scalar($value) || $value === null) {
            return $value;
        }
        // Remaining types are arrays; encode as JSON string
        $encoded = json_encode($value);

        return $encoded !== false ? $encoded : null;
    }

    /**
     * Canonicalize row keys using aliases.
     *
     * @param  array<string, bool|float|int|string|null>  $row
     * @return array<string, bool|float|int|string|null>
     */
    private function canonicalizeRowKeys(array $row): array
    {
        $supplemental = collect($this->aliases())
            ->filter(function (string $canonical, string $alias) use ($row): bool {
                return array_key_exists($alias, $row) && ! array_key_exists($canonical, $row);
            })
            ->mapWithKeys(function (string $canonical, string $alias) use ($row): array {
                return [$canonical => $row[$alias]];
            });

        return array_merge($row, $supplemental->all());
    }

    /**
     * Trim all string values in a row.
     *
     * @param  array<string, bool|float|int|string|null>  $row
     * @return array<string, bool|float|int|string|null>
     */
    private function trimScalarValues(array $row): array
    {
        return array_map(static fn ($value) => is_string($value) ? trim($value) : $value, $row);
    }

    /**
     * Determine if a row has any non-empty values.
     *
     * @param  array<string, bool|float|int|string|null>  $row
     */
    private function rowHasValues(array $row): bool
    {
        return array_filter($row, fn (bool|float|int|string|null $value): bool => ! $this->valueIsEmpty($value)) !== [];
    }

    /**
     * Check if a value is empty (null or empty string).
     */
    private function valueIsEmpty(bool|float|int|string|null $value): bool
    {
        return $value === null || (is_string($value) && $value === '');
    }

    /**
     * Get aliases for canonicalizing row keys.
     *
     * @return array<string, string>
     */
    private function aliases(): array
    {
        return [
            'cooperative_id' => 'id_koperasi',
            'koperasi_id' => 'id_koperasi',
            'cluster' => 'cluster_id',
            'model' => 'model_pengurusan',
            'pengurusan' => 'model_pengurusan',
            'status_operasi' => 'status',
        ];
    }
}
