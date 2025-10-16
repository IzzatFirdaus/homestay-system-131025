<?php

declare(strict_types=1);

namespace App\Livewire\Performances;

use App\Models\Homestay;
use App\Models\Performance;
use Livewire\Component;
use Livewire\WithPagination;

class IndexTable extends Component
{
    use WithPagination;

    public Homestay $homestay;

    public string $tahun = '';

    public string $bulan = '';

    public function mount(Homestay $homestay): void
    {
        $this->homestay = $homestay;
        $this->tahun = date('Y');
    }

    public function deletePerformance(int $performanceId): void
    {
        $performance = Performance::findOrFail($performanceId);
        $this->authorize('delete', $performance);
        $performance->delete();
        session()->flash('success', __('Rekod prestasi berjaya dipadam.'));
        $this->dispatch('$refresh');
    }

    public function render()
    {
        $performances = Performance::where('homestay_id', $this->homestay->id)
            ->when($this->tahun, fn ($query) => $query->where('tahun', $this->tahun))
            ->when($this->bulan, fn ($query) => $query->where('bulan', $this->bulan))
            ->paginate(10);

        $tahuns = range(date('Y'), date('Y') - 10);
        $bulans = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Mac', 4 => 'April', 5 => 'Mei', 6 => 'Jun',
            7 => 'Julai', 8 => 'Ogos', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Disember',
        ];

        /** @phpstan-ignore-next-line */
        return view('livewire.performances.index-table', [
            'performances' => $performances,
            'tahuns' => $tahuns,
            'bulans' => $bulans,
        ]);
    }
}
