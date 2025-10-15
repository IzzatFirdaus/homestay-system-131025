<?php

namespace App\Livewire\Performances;

use App\Data\PerformanceData;
use App\Models\Homestay;
use App\Models\Performance;
use App\Services\PerformanceService;
use Livewire\Component;

class CreateEditForm extends Component
{
    public Homestay $homestay;

    public ?Performance $performance = null;

    public $bulan;

    public $tahun;

    public $pelawat_domestik = 0;

    public $pelawat_asing = 0;

    public $pendapatan = 0;

    public $sumber_lain = 0;

    public function mount(Homestay $homestay, ?Performance $performance = null)
    {
        $this->homestay = $homestay;
        $this->performance = $performance;

        if ($this->performance && $this->performance->exists) {
            $this->bulan = $this->performance->bulan;
            $this->tahun = $this->performance->tahun;
            $this->pelawat_domestik = $this->performance->pelawat_domestik;
            $this->pelawat_asing = $this->performance->pelawat_asing;
            $this->pendapatan = $this->performance->pendapatan;
            $this->sumber_lain = $this->performance->sumber_lain ?? 0;
        } else {
            $this->bulan = (int) date('n');
            $this->tahun = (int) date('Y');
        }
    }

    public function save(PerformanceService $performanceService)
    {
        $this->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000',
            'pelawat_domestik' => 'required|integer|min:0',
            'pelawat_asing' => 'required|integer|min:0',
            'pendapatan' => 'required|numeric|min:0',
            'sumber_lain' => 'nullable|numeric|min:0',
        ]);

        $performanceData = new PerformanceData(
            homestayId: $this->homestay->id,
            bulan: (int) $this->bulan,
            tahun: (int) $this->tahun,
            pelawatDomestik: (int) $this->pelawat_domestik,
            pelawatAsing: (int) $this->pelawat_asing,
            pendapatan: (float) $this->pendapatan,
            sumberLain: (float) ($this->sumber_lain ?? 0),
        );

        try {
            if ($this->performance && $this->performance->exists) {
                $this->authorize('update', $this->performance);
                $performanceService->updatePerformance($this->performance, $performanceData);
                session()->flash('success', __('Prestasi berjaya dikemaskini.'));
            } else {
                $this->authorize('create', Performance::class);
                $performanceService->recordPerformance($performanceData);
                session()->flash('success', __('Prestasi berjaya dicipta.'));
            }

            return redirect()->route('performances.index', ['homestay' => $this->homestay->id]);
        } catch (\App\Exceptions\BusinessRuleException $e) {
            $this->addError('general', $e->getMessage());
        } catch (\App\Exceptions\ValidationException $e) {
            $this->addError('general', $e->getMessage());
        }
    }

    public function render()
    {
        $tahuns = range(date('Y'), date('Y') - 10);
        $bulans = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Mac', 4 => 'April', 5 => 'Mei', 6 => 'Jun',
            7 => 'Julai', 8 => 'Ogos', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Disember',
        ];

        return view('livewire.performances.create-edit-form', compact('tahuns', 'bulans'));
    }
}
