<?php

declare(strict_types=1);

namespace App\Livewire\Homestays;

use App\Models\Homestay;
use App\Models\Negeri;
use App\Services\HomestayService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class IndexTable extends Component
{
    use WithPagination;

    public string $search = '';

    public string $negeri = '';

    public string $status = '';

    public string $model_pengurusan = '';

    public bool $showDeleteModal = false;

    public ?int $homestayToDelete = null;

    protected ?HomestayService $homestayService = null;

    public function boot(HomestayService $homestayService): void
    {
        $this->homestayService = $homestayService;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function confirmDeleteHomestay(int $homestayId): void
    {
        $this->homestayToDelete = $homestayId;
        $this->showDeleteModal = true;
    }

    public function deleteHomestay(): void
    {
        if (! $this->homestayToDelete) {
            return;
        }

        $homestay = Homestay::findOrFail($this->homestayToDelete);
        $this->authorize('delete', $homestay);
        if ($this->homestayService) {
            $this->homestayService->deleteHomestay($homestay);
        }
        session()->flash('success', __('Homestay berjaya dipadam.'));
        $this->showDeleteModal = false;
        $this->homestayToDelete = null;
        $this->dispatch('$refresh');
    }

    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
        $this->homestayToDelete = null;
    }

    public function render(): View
    {
        // The service returns a collection, but for pagination with Livewire,
        // we will paginate the query builder directly here.
        // A more robust solution might involve the service returning a query builder.
        $homestays = Homestay::query()
            ->when($this->search, fn ($query) => $query->where('nama', 'like', '%' . $this->search . '%'))
            ->when($this->negeri, fn ($query) => $query->where('negeri', $this->negeri))
            ->when($this->status, fn ($query) => $query->where('status', $this->status))
            ->when($this->model_pengurusan, fn ($query) => $query->where('model_pengurusan', $this->model_pengurusan))
            ->with('cooperative')
            ->paginate(10);

        $negeris = Negeri::orderBy('name')->get();

        return view('livewire.homestays.index-table', [
            'homestays' => $homestays,
            'negeris' => $negeris,
        ]);
    }
}
