<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use App\Models\Homestay;
use App\Models\Performance;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

/**
 * MainDashboard component displays key metrics and filters.
 *
 * @property array{total_homestays: int, total_visitors: int, total_revenue: float, avg_occupancy: float} $metrics
 */
class MainDashboard extends Component
{
    public string $selectedState = 'all';

    public int $selectedMonth;

    public int $selectedYear;

    public function mount(): void
    {
        $this->selectedMonth = (int) now()->month;
        $this->selectedYear = (int) now()->year;
    }

    public function updatedSelectedState(): void
    {
        // clear cache when state filters change
        Cache::flush();
    }

    public function getMetricsProperty(): array
    {
        $query = Homestay::query()->where('status', 'Aktif');

        if ($this->selectedState !== 'all') {
            $query->where('negeri', $this->selectedState);
        }

        $homestays = $query->count();

        $performances = Performance::query()
            ->where('bulan', $this->selectedMonth)
            ->where('tahun', $this->selectedYear);

        if ($this->selectedState !== 'all') {
            $performances->whereHas('homestay', fn ($q) => $q->where('negeri', $this->selectedState));
        }

        $totalVisitors = (int) $performances->sum('pelawat_domestik') + (int) $performances->sum('pelawat_asing');
        $totalRevenue = (float) $performances->sum('pendapatan');

        // occupancy: if capacity data exists, compute percentage
        $capacity = (int) $performances->sum('kapasiti_total');
        $avgOccupancy = $capacity > 0 ? round($totalVisitors / $capacity * 100, 1) : 0;

        return [
            'total_homestays' => $homestays,
            'total_visitors' => $totalVisitors,
            'total_revenue' => $totalRevenue,
            'avg_occupancy' => $avgOccupancy,
        ];
    }

    public function render()
    {
        $states = Homestay::query()->distinct()->pluck('negeri')->filter()->values();

        return view('livewire.dashboard.main-dashboard', [
            'metrics' => $this->metrics,
            'states' => $states,
        ]);
    }
}
