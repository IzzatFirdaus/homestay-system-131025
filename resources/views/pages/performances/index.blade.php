<?php

use App\Models\Homestay;
use App\Models\Performance;
use Livewire\WithPagination;
use function Livewire\Volt\layout;

layout('layouts.app');

new class extends \Livewire\Volt\Component {
    use WithPagination;

    public string $search = '';
    public string $homestayFilter = '';
    public string $tahunFilter = '';
    public string $bulanFilter = '';

    public function with(): array
    {
        $performances = Performance::query()
            ->with('homestay')
            ->when($this->search, function ($q) {
                $q->whereHas('homestay', function ($query) {
                    $query->where('nama', 'like', "%{$this->search}%");
                });
            })
            ->when($this->homestayFilter, fn($q) => $q->where('homestay_id', $this->homestayFilter))
            ->when($this->tahunFilter, fn($q) => $q->where('tahun', $this->tahunFilter))
            ->when($this->bulanFilter, fn($q) => $q->where('bulan', $this->bulanFilter))
            ->latest('tahun')
            ->latest('bulan')
            ->paginate(15);

        $homestays = Homestay::query()->orderBy('nama')->pluck('nama', 'id');
        $years = range((int) date('Y'), 2000);
        $months = range(1, 12);

        return [
            'performances' => $performances,
            'homestays' => $homestays,
            'years' => $years,
            'months' => $months,
        ];
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedHomestayFilter(): void
    {
        $this->resetPage();
    }

    public function updatedTahunFilter(): void
    {
        $this->resetPage();
    }

    public function updatedBulanFilter(): void
    {
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'homestayFilter', 'tahunFilter', 'bulanFilter']);
        $this->resetPage();
    }

    public function delete(int $id): void
    {
        $performance = Performance::findOrFail($id);
        $this->authorize('delete', $performance);
        $performance->delete();
        session()->flash('success', __('performances.index.alerts.deleted'));
    }
}

?>

<div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('common.general.close') }}"></button>
        </div>
    @endif

    <x-card>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title mb-0">{{ __('performances.index.title') }}</h5>
                @can('create', App\Models\Performance::class)
                    <a href="{{ route('performances.create') }}" class="btn btn-primary">
                        {{ __('performances.index.actions.create') }}
                    </a>
                @endcan
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <input
                        type="text"
                        class="form-control"
                        wire:model.live.debounce.300ms="search"
                        placeholder="{{ __('performances.index.search_placeholder') }}"
                    >
                </div>
                <div class="col-md-3">
                    <select class="form-select" wire:model.live="homestayFilter">
                        <option value="">{{ __('performances.index.homestay_all') }}</option>
                        @foreach($homestays as $id => $nama)
                            <option value="{{ $id }}">{{ $nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" wire:model.live="tahunFilter">
                        <option value="">{{ __('performances.index.year_all') }}</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" wire:model.live="bulanFilter">
                        <option value="">{{ __('performances.index.month_all') }}</option>
                        @foreach($months as $month)
                            <option value="{{ $month }}">{{ __('common.months.' . $month) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-secondary w-100" wire:click="clearFilters">
                        {{ __('common.buttons.reset') }}
                    </button>
                </div>
            </div>

            <div wire:loading class="text-center my-3" aria-live="polite">
                <div class="spinner-border text-primary" role="status" aria-hidden="true"></div>
                <span class="visually-hidden">{{ __('common.general.loading') }}</span>
            </div>

            <div class="table-responsive" wire:loading.class="opacity-50">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('performances.index.table.homestay') }}</th>
                            <th>{{ __('performances.index.table.period') }}</th>
                            <th class="text-end">{{ __('performances.index.table.domestic') }}</th>
                            <th class="text-end">{{ __('performances.index.table.international') }}</th>
                            <th class="text-end">{{ __('performances.index.table.revenue') }}</th>
                            <th class="text-end">{{ __('performances.index.table.other_income') }}</th>
                            <th class="text-end">{{ __('performances.index.table.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($performances as $performance)
                            <tr wire:key="performance-{{ $performance->id }}">
                                <td>{{ $performance->homestay->nama }}</td>
                                <td>{{ __('common.months.' . $performance->bulan) }} {{ $performance->tahun }}</td>
                                <td class="text-end">{{ number_format($performance->pelawat_domestik) }}</td>
                                <td class="text-end">{{ number_format($performance->pelawat_asing) }}</td>
                                <td class="text-end">{{ number_format($performance->pendapatan, 2) }}</td>
                                <td class="text-end">{{ number_format($performance->sumber_lain ?? 0, 2) }}</td>
                                <td class="text-end">
                                    @can('update', $performance)
                                        <a href="{{ route('performances.edit', $performance) }}" class="btn btn-sm btn-outline-primary">
                                            {{ __('performances.index.actions.edit') }}
                                        </a>
                                    @endcan
                                    @can('delete', $performance)
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-outline-danger"
                                            wire:click="delete({{ $performance->id }})"
                                            wire:confirm="{{ __('performances.index.actions.confirm_delete') }}"
                                        >
                                            {{ __('performances.index.actions.delete') }}
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <p class="text-muted">{{ __('performances.index.table.empty') }}</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $performances->links() }}
            </div>
        </div>
    </x-card>
</div>
