<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use App\Services\ReportService;
use Livewire\Component;

class RevenueByStateChart extends Component
{
    public $chartData;

    public function mount(ReportService $reportService)
    {
        $this->chartData = $reportService->getRevenueByStateChartData();
        $this->dispatch('revenue-chart-updated', data: $this->chartData);
    }

    public function render()
    {
        return view('livewire.dashboard.revenue-by-state-chart');
    }
}
