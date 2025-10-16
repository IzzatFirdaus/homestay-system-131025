<div class="container py-4" role="region" aria-labelledby="dashboard-heading">
    <h1 id="dashboard-heading" class="h3 mb-3">{{ __('dashboard.title') ?? 'Dashboard' }}</h1>

    <!-- Filter Panel -->
    <div class="card mb-4" role="region" aria-label="{{ __('dashboard.filters.label') }}">
        <div class="card-body">
            <form class="row g-3" role="form" aria-describedby="filter-help">
                <div class="col-12 col-md-4">
                    <label for="state-select" class="form-label">{{ __('dashboard.filters.state') ?? 'State' }}</label>
                    <select id="state-select" class="form-select" wire:model.live="selectedState" aria-required="false">
                        <option value="all">{{ __('common.all') ?? 'All' }}</option>
                        @foreach($states as $state)
                            <option value="{{ $state }}">{{ $state }}</option>
                        @endforeach
                    </select>
                    <div id="filter-help" class="form-text">{{ __('dashboard.filters.help') ?? 'Filter metrics by state' }}</div>
                </div>

                <div class="col-6 col-md-4">
                    <label for="month-select" class="form-label">{{ __('dashboard.filters.month') ?? 'Month' }}</label>
                    <select id="month-select" class="form-select" wire:model.live="selectedMonth">
                        @foreach(range(1,12) as $m)
                            <option value="{{ $m }}">{{ \Illuminate\Support\Carbon::create(now()->year, $m)->format('F') }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 col-md-4">
                    <label for="year-select" class="form-label">{{ __('dashboard.filters.year') ?? 'Year' }}</label>
                    <select id="year-select" class="form-select" wire:model.live="selectedYear">
                        @foreach(range(now()->year - 5, now()->year) as $y)
                            <option value="{{ $y }}">{{ $y }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>

    <!-- Metrics Grid -->
    <div class="row g-3 mb-4" aria-live="polite">
        <div class="col-12 col-sm-6 col-lg-3">
            <livewire:dashboard.metrics-card title="{{ __('dashboard.cards.total_homestays') ?? 'Total Homestays' }}" :value="(string) $metrics['total_homestays']" unit="units" icon="bi-house-fill" status="good" />
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <livewire:dashboard.metrics-card title="{{ __('dashboard.cards.total_visitors') ?? 'Total Visitors' }}" :value="number_format($metrics['total_visitors'])" unit="persons" icon="bi-people-fill" status="good" />
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <livewire:dashboard.metrics-card title="{{ __('dashboard.cards.total_revenue') ?? 'Total Revenue' }}" :value="'RM ' . number_format($metrics['total_revenue'], 2)" unit="MYR" icon="bi-cash-stack" status="good" />
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <livewire:dashboard.metrics-card title="{{ __('dashboard.cards.avg_occupancy') ?? 'Avg Occupancy' }}" :value="(string) $metrics['avg_occupancy'] . '%'" unit="percent" icon="bi-speedometer2" status="neutral" />
        </div>
    </div>

    <!-- Charts -->
    <div class="row g-4">
        <div class="col-12 col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                    <h2 class="h6 mb-0">{{ __('dashboard.charts.visitors_by_state') ?? 'Visitors by State' }}</h2>
                </div>
                <div class="card-body">
                    <canvas id="visitorsByStateChart" role="img" aria-label="{{ __('dashboard.charts.visitors_by_state_aria') }}"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                    <h2 class="h6 mb-0">{{ __('dashboard.charts.revenue_by_state') ?? 'Revenue by State' }}</h2>
                </div>
                <div class="card-body">
                    <canvas id="revenueByStateChart" role="img" aria-label="{{ __('dashboard.charts.revenue_by_state_aria') }}"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        (function () {
            // Placeholder chart initializers — Livewire can update data via events if needed
            const ctx1 = document.getElementById('visitorsByStateChart');
            if (ctx1) {
                new Chart(ctx1.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: [],
                        datasets: [{ label: 'Visitors', data: [], backgroundColor: '#0ea5e9' }]
                    },
                    options: { responsive: true, plugins: { legend: { display: false } } }
                });
            }

            const ctx2 = document.getElementById('revenueByStateChart');
            if (ctx2) {
                new Chart(ctx2.getContext('2d'), {
                    type: 'bar',
                    data: { labels: [], datasets: [{ label: 'Revenue', data: [], backgroundColor: '#10B981' }] },
                    options: { responsive: true, plugins: { legend: { display: false } } }
                });
            }
        })();
    </script>
@endpush
