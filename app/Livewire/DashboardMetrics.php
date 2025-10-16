<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Services\ReportService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;
use Livewire\Component;

class DashboardMetrics extends Component
{
    /**
     * @var array<string, int|float|string>
     */
    public array $metrics = [];

    public int $occupancyPercentage = 0;

    public int $activeHomestays = 0;

    public int $totalVisitors = 0;

    public float $averageRating = 0;

    /**
     * Initialize component and load metrics from cache.
     */
    public function mount(ReportService $reportService): void
    {
        $this->loadMetrics($reportService);
    }

    /**
     * Load metrics from cache or database.
     */
    private function loadMetrics(ReportService $reportService): void
    {
        $user = Auth::user();
        $cacheKey = 'dashboard.metrics.' . ($user ? $user->id : 'guest');

        // Build filters based on user role/scope
        $filters = [];
        if ($user && $user->hasRole('pemerhati') && ! empty($user->negeri)) {
            $filters['negeri'] = $user->negeri;
        }

        /** @var array<string, int|float|string> $metrics */
        $metrics = Cache::remember($cacheKey, now()->addMinutes(15), function () use ($reportService, $filters) {
            return $reportService->getDashboardStats($filters);
        });

        $this->metrics = $metrics;
        $this->occupancyPercentage = (int) ($metrics['occupancy_percentage'] ?? 0);
        $this->activeHomestays = (int) ($metrics['active_homestays'] ?? 0);
        $this->totalVisitors = (int) ($metrics['total_visitors'] ?? 0);
        $this->averageRating = (float) ($metrics['average_rating'] ?? 0.0);
    }

    /**
     * Refresh metrics when data is imported.
     * Listener for 'data-imported' event dispatched by ImportDataForm.
     */
    #[On('data-imported')]
    public function onDataImported(ReportService $reportService): void
    {
        // Invalidate cache
        $user = Auth::user();
        $cacheKey = 'dashboard.metrics.' . ($user ? $user->id : 'guest');
        Cache::forget($cacheKey);

        // Reload metrics
        $this->loadMetrics($reportService);

        // Dispatch browser event for accessibility announcement
        $this->dispatch('metrics-updated');
    }

    public function render(): View
    {
        return view('livewire.dashboard-metrics');
    }
}
