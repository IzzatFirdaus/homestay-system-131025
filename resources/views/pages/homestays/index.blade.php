<?php

use App\Models\Homestay;
use Livewire\WithPagination;
use function Livewire\Volt\{layout};

layout('layouts.app');

new class extends \Livewire\Volt\Component {
    use WithPagination;

    public string $search = '';
    public string $negeriFilter = '';
    public string $statusFilter = '';

    public function with(): array
    {
        $homestays = Homestay::query()
            ->with('cooperative')
            ->when($this->search, fn ($query) => $query->where('nama', 'like', "%{$this->search}%"))
            ->when($this->negeriFilter, fn ($query) => $query->where('negeri', $this->negeriFilter))
            ->when($this->statusFilter, fn ($query) => $query->where('status', $this->statusFilter))
            ->orderBy('nama')
            ->paginate(15)
            ->withQueryString();

        $negeriOptions = config('app.negeri', []);
        $statusOptions = ['Aktif', 'Tidak Aktif'];

        return [
            'homestays' => $homestays,
            'negeriOptions' => $negeriOptions,
            'statusOptions' => $statusOptions,
        ];
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedNegeriFilter(): void
    {
        $this->resetPage();
    }

    public function updatedStatusFilter(): void
    {
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'negeriFilter', 'statusFilter']);
        $this->resetPage();
    }
}

?>

<div>
    <x-card>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="card-title h5 mb-0">{{ __('homestays.index.title') }}</h1>
                @can('create', App\Models\Homestay::class)
                    <a href="{{ route('homestays.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1" aria-hidden="true"></i>
                        {{ __('homestays.index.actions.create') }}
                    </a>
                @endcan
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label visually-hidden" for="homestay-search">{{ __('homestays.index.search_placeholder') }}</label>
                    <input
                        id="homestay-search"
                        type="text"
                        class="form-control"
                        wire:model.live.debounce.300ms="search"
                        placeholder="{{ __('homestays.index.search_placeholder') }}"
                        aria-label="{{ __('homestays.index.search_placeholder') }}"
                    >
                </div>
                <div class="col-md-3">
                    <label class="form-label visually-hidden" for="homestay-negeri">{{ __('dashboard.filters.state') }}</label>
                    <select id="homestay-negeri" class="form-select" wire:model.live="negeriFilter" aria-label="{{ __('dashboard.filters.state') }}">
                        <option value="">{{ __('homestays.index.negeri_all') }}</option>
                        @foreach($negeriOptions as $code => $name)
                            <option value="{{ $code }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label visually-hidden" for="homestay-status">{{ __('homestays.index.table.status') }}</label>
                    <select id="homestay-status" class="form-select" wire:model.live="statusFilter" aria-label="{{ __('homestays.index.table.status') }}">
                        <option value="">{{ __('homestays.index.status_all') }}</option>
                        @foreach($statusOptions as $status)
                            <option value="{{ $status }}">{{ __('common.statuses.'.$status) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-secondary w-100" wire:click="clearFilters">
                        <i class="bi bi-arrow-counterclockwise me-1" aria-hidden="true"></i>
                        {{ __('common.buttons.reset') }}
                    </button>
                </div>
            </div>

            <div wire:loading class="text-center my-3">
                <div class="spinner-border text-primary"></div>
            </div>

            <div class="table-responsive" wire:loading.class="opacity-50">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">{{ __('homestays.index.table.name') }}</th>
                            <th scope="col">{{ __('homestays.index.table.state') }}</th>
                            <th scope="col">{{ __('homestays.index.table.status') }}</th>
                            <th scope="col" class="text-end">{{ __('homestays.index.table.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($homestays as $homestay)
                            <tr wire:key="homestay-{{ $homestay->id }}">
                                <td class="align-middle">{{ $homestay->nama }}</td>
                                <td class="align-middle">{{ config('app.negeri.'.$homestay->negeri, $homestay->negeri) }}</td>
                                <td class="align-middle">
                                    @php
                                        $statusClass = $homestay->status === 'Aktif' ? 'success' : 'danger';
                                    @endphp
                                    <span class="badge bg-{{ $statusClass }}">
                                        {{ __('common.statuses.'.$homestay->status) }}
                                    </span>
                                </td>
                                <td class="text-end align-middle">
                                    @can('update', $homestay)
                                        <a href="{{ route('homestays.edit', $homestay) }}" class="btn btn-sm btn-outline-primary">
                                            <span class="visually-hidden">{{ __('homestays.index.actions.edit') }}</span>
                                            <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-5">
                                    <x-empty-state>{{ __('homestays.index.table.empty') }}</x-empty-state>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center gap-2 mt-3">
                <p class="mb-0 text-muted small">
                    {{ trans('homestays.index.pagination_summary', [
                        'from' => $homestays->firstItem() ?? 0,
                        'to' => $homestays->lastItem() ?? 0,
                        'total' => $homestays->total(),
                    ]) }}
                </p>
                {{ $homestays->links() }}
            </div>
        </div>
    </x-card>
</div>
