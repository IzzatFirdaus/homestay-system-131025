<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use App\Services\ReportService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class RevenueByStateChart extends Component
{
    /**
     * @var array<string, float>
     */
    public array $chartData = [];

    public function mount(ReportService $reportService): void
    {
        $this->chartData = $reportService->getRevenueByStateChartData();
        $this->dispatch('revenue-chart-updated', data: $this->chartData);
    }

    public function render(): View
    {
        return view('livewire.dashboard.revenue-by-state-chart');
    }
}
