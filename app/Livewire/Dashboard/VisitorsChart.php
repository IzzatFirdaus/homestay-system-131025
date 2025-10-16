<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use App\Models\Negeri;
use App\Services\ReportService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class VisitorsChart extends Component
{
    public string $negeri = '';

    public ?int $tahun = null;

    /**
     * @var array<string, mixed>
     */
    public array $chartData = [];

    protected ?ReportService $reportService = null;

    public function boot(ReportService $reportService): void
    {
        $this->reportService = $reportService;
    }

    public function mount(): void
    {
        $this->tahun = (int) date('Y');
        $this->loadChartData();
    }

    public function updated(): void
    {
        $this->loadChartData();
    }

    public function loadChartData(): void
    {
        $filters = [
            'negeri' => $this->negeri,
            'tahun' => $this->tahun,
        ];

        if ($this->reportService) {
            $this->chartData = $this->reportService->getVisitorsChartData($filters);
            $this->dispatch('chart-updated', data: $this->chartData);
        }
    }

    public function render(): View
    {
        $negeris = Negeri::orderBy('name')->get();
        $tahuns = range((int) date('Y'), (int) date('Y') - 10);

        return view('livewire.dashboard.visitors-chart', compact('negeris', 'tahuns'));
    }
}
