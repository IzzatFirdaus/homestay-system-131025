<?php

declare(strict_types=1);

namespace App\Livewire\Homestays;

use App\Models\Homestay;
use App\Models\Negeri;
use App\Services\HomestayService;
use Livewire\Component;
use Livewire\WithPagination;

class IndexTable extends Component
{
    use WithPagination;

    public $search = '';

    public $negeri = '';

    public $status = '';

    public $model_pengurusan = '';

    protected $homestayService;

    public function boot(HomestayService $homestayService)
    {
        $this->homestayService = $homestayService;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteHomestay($homestayId)
    {
        $homestay = Homestay::findOrFail($homestayId);
        $this->authorize('delete', $homestay);
        $this->homestayService->deleteHomestay($homestay);
        session()->flash('success', __('Homestay berjaya dipadam.'));
        $this->dispatch('$refresh');
    }

    public function render()
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
