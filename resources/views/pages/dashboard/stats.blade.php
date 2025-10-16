<?php

use function Livewire\Volt\{state, computed, mount, layout};
use App\Services\ReportService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

layout('layouts.app');

// Define reactive state
state(['filters' => []]);

// Mount lifecycle hook
mount(function () {
    $user = Auth::user();

    if ($user && $user->hasRole('pemerhati') && !empty($user->negeri)) {
        $this->filters = ['negeri' => $user->negeri];
    }
});

// Computed property for stats
$stats = computed(function () {
    $user = Auth::user();
    $cacheKey = 'dashboard.stats.' . ($user ? $user->id : 'guest');

    return Cache::remember($cacheKey, now()->addMinutes(15), function () {
        $reportService = app(ReportService::class);
        return $reportService->getDashboardStats($this->filters);
    });
});

?>

<div>
    <div class="row g-4">
        <!-- Total Visitors -->
        <div class="col-md-3">
            <x-card>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="bi bi-people-fill text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">{{ __('Jumlah Pelawat') }}</h6>
                        <h3 class="mb-0">{{ number_format($stats()['total_visitors']) }}</h3>
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Total Revenue -->
        <div class="col-md-3">
            <x-card>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="bi bi-currency-dollar text-success" style="font-size: 2.5rem;"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">{{ __('Jumlah Pendapatan') }}</h6>
                        <h3 class="mb-0">RM {{ number_format($stats()['total_revenue'], 2) }}</h3>
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Total Homestays -->
        <div class="col-md-3">
            <x-card>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="bi bi-house-door-fill text-info" style="font-size: 2.5rem;"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">{{ __('Jumlah Homestay') }}</h6>
                        <h3 class="mb-0">{{ number_format($stats()['total_homestays']) }}</h3>
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Occupancy Rate -->
        <div class="col-md-3">
            <x-card>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="bi bi-graph-up text-warning" style="font-size: 2.5rem;"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">{{ __('Kadar Penghunian') }}</h6>
                        <h3 class="mb-0">{{ number_format($stats()['occupancy_rate'], 1) }}%</h3>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</div>
