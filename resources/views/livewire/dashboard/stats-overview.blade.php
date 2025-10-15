<div class="row">
    <div class="col-md-3">
        <x-card>
            <h5>{{ __('dashboard.kpi.total_visitors') }}</h5>
            <h2>{{ number_format($stats['total_visitors']) }}</h2>
        </x-card>
    </div>
    <div class="col-md-3">
        <x-card>
            <h5>{{ __('dashboard.kpi.total_revenue') }}</h5>
            <h2>RM {{ number_format($stats['total_revenue'], 2) }}</h2>
        </x-card>
    </div>
    <div class="col-md-3">
        <x-card>
            <h5>{{ __('dashboard.kpi.total_homestays') }}</h5>
            <h2>{{ number_format($stats['total_homestays']) }}</h2>
        </x-card>
    </div>
    <div class="col-md-3">
        <x-card>
            <h5>{{ __('dashboard.kpi.occupancy_rate') }}</h5>
            <h2>{{ $stats['occupancy_rate'] }}%</h2>
        </x-card>
    </div>
</div>
