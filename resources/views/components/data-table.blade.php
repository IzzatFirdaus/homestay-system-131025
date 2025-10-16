{{--
    Accessible Data Table Component

    Props:
    - columns: array of column definitions (required)
        Format: [
            ['key' => 'name', 'label' => 'Name', 'sortable' => true],
            ['key' => 'email', 'label' => 'Email'],
        ]
    - rows: array of data rows (required)
    - striped: boolean (default: false) - Zebra striping
    - hover: boolean (default: true) - Row hover effect
    - bordered: boolean (default: false) - Table borders
    - small: boolean (default: false) - Compact table
    - responsive: boolean (default: true) - Responsive wrapper
    - sortable: boolean (default: false) - Enable sorting
    - emptyText: text to show when no rows (default: 'No data available')

    Slots:
    - actions: custom actions column content (receives $row)

    Usage:
    @php
        $columns = [
            ['key' => 'name', 'label' => 'Name', 'sortable' => true],
            ['key' => 'email', 'label' => 'Email', 'sortable' => true],
            ['key' => 'role', 'label' => 'Role'],
        ];
        $rows = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'User'],
        ];
    @endphp

    <x-data-table :columns="$columns" :rows="$rows" striped hover>
        <x-slot:actions="{ $row }">
            <x-button size="sm" variant="primary">Edit</x-button>
        </x-slot:actions>
    </x-data-table>
--}}

@props([
    'columns' => [],
    'rows' => [],
    'striped' => false,
    'hover' => true,
    'bordered' => false,
    'small' => false,
    'responsive' => true,
    'sortable' => false,
    'emptyText' => null,
])

@php
    if (empty($columns)) {
        throw new \Exception('Data table component requires "columns" prop');
    }

    $tableClasses = 'table align-middle';
    if ($striped) $tableClasses .= ' table-striped';
    if ($hover) $tableClasses .= ' table-hover';
    if ($bordered) $tableClasses .= ' table-bordered';
    if ($small) $tableClasses .= ' table-sm';

    $emptyMessage = $emptyText ?? __('common.table.empty');

    // Check if actions slot is provided
    $hasActions = isset($actions);
@endphp

@if($responsive)
    <div class="table-responsive">
@endif

<table {{ $attributes->merge(['class' => $tableClasses]) }} aria-label="Data table">
    <thead>
        <tr>
            @foreach($columns as $column)
                @php
                    $columnKey = $column['key'] ?? '';
                    $columnLabel = $column['label'] ?? ucfirst($columnKey);
                    $isSortable = ($sortable && ($column['sortable'] ?? false));
                @endphp

                <th scope="col" @if($isSortable) role="button" tabindex="0" aria-sort="none" @endif>
                    @if($isSortable)
                        <div class="d-flex align-items-center justify-content-between">
                            {{ $columnLabel }}
                            <i class="bi bi-arrow-down-up text-muted ms-2" aria-hidden="true"></i>
                        </div>
                    @else
                        {{ $columnLabel }}
                    @endif
                </th>
            @endforeach

            @if($hasActions)
                <th scope="col">{{ __('common.table.actions') }}</th>
            @endif
        </tr>
    </thead>

    <tbody>
        @forelse($rows as $index => $row)
            <tr>
                @foreach($columns as $column)
                    @php
                        $columnKey = $column['key'] ?? '';
                        $cellValue = data_get($row, $columnKey, '—');
                    @endphp

                    <td>{{ $cellValue }}</td>
                @endforeach

                @if($hasActions)
                    <td>
                        {{ $actions(['row' => $row, 'index' => $index]) }}
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="{{ count($columns) + ($hasActions ? 1 : 0) }}" class="text-center text-muted py-4">
                    <i class="bi bi-inbox d-block mb-2" style="font-size: 2rem;" aria-hidden="true"></i>
                    {{ $emptyMessage }}
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@if($responsive)
    </div>
@endif
