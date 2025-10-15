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
            ->when($this->search, fn($q) => $q->where('nama', 'like', "%{$this->search}%"))
            ->when($this->negeriFilter, fn($q) => $q->where('negeri_id', $this->negeriFilter))
            ->when($this->statusFilter, fn($q) => $q->where('status', $this->statusFilter))
            ->latest()
            ->paginate(15);

        return ['homestays' => $homestays];
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
                <h5 class="card-title mb-0">Senarai Homestay</h5>
                @can('create', App\Models\Homestay::class)
                    <button class="btn btn-primary">Tambah Homestay</button>
                @endcan
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <input
                        type="text"
                        class="form-control"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Cari..."
                    >
                </div>
                <div class="col-md-3">
                    <select class="form-select" wire:model.live="negeriFilter">
                        <option value="">Semua Negeri</option>
                        <option value="1">Johor</option>
                        <option value="2">Kedah</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" wire:model.live="statusFilter">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak_aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-secondary w-100" wire:click="clearFilters">
                        Reset
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
                            <th>Nama</th>
                            <th>Negeri</th>
                            <th>Status</th>
                            <th class="text-end">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($homestays as $homestay)
                            <tr wire:key="homestay-{{ $homestay->id }}">
                                <td>{{ $homestay->nama }}</td>
                                <td>{{ config('app.negeri.'.$homestay->negeri, $homestay->negeri) }}</td>
                                <td>
                                    <span class="badge bg-{{ $homestay->status === 'Aktif' ? 'success' : 'danger' }}">
                                        {{ $homestay->status }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    @can('update', $homestay)
                                        <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <p class="text-muted">Tiada rekod dijumpai</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $homestays->links() }}
            </div>
        </div>
    </x-card>
</div>
