<?php

namespace App\Livewire\Dashboard;

use App\Models\Negeri;
use App\Services\ReportService;
use Livewire\Component;

class VisitorsChart extends Component
{
    public $negeri = '';

    public $tahun;

    public $chartData;

    protected $reportService;

    public function boot(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function mount()
    {
        $this->tahun = date('Y');
        $this->loadChartData();
    }

    public function updated()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $filters = [
            'negeri' => $this->negeri,
            'tahun' => $this->tahun,
        ];

        $this->chartData = $this->reportService->getVisitorsChartData($filters);

        $this->dispatch('chart-updated', data: $this->chartData);
    }

    public function render()
    {
        $negeris = Negeri::orderBy('name')->get();
        $tahuns = range(date('Y'), date('Y') - 10);

        return view('livewire.dashboard.visitors-chart', compact('negeris', 'tahuns'));
    }
}
