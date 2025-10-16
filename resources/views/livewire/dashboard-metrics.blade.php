<div wire:poll.5000ms="onDataImported" wire:key="dashboard-metrics">
    {{-- Accessibility: Live region for metric updates
         WCAG Pattern: aria-live region for dynamic content changes
         - polite: Allows screen reader to finish current sentence before announcing
         - atomic="true": Announce entire region when content changes
         - visually-hidden: Only for screen reader users (invisible to sighted users)
         - role="status": Indicates this is a status message (optional but recommended)
    --}}
    <div id="metrics-status" aria-live="polite" aria-atomic="true" class="visually-hidden" role="status">
        {{ __('dashboard.metrics_updated') }}
    </div>

    <div class="row g-3">
        {{-- Occupancy Rate Card
             WCAG Pattern: Metric card with progress bar and aria labels
             - aria-label: Provides accessible description of numeric value
             - role="progressbar": Semantic role for progress visualization
             - aria-valuenow: Current progress percentage (0-100)
        --}}
        <div class="col-12 col-sm-6 col-lg-3">
            <x-card
                title="{{ __('dashboard.cards.occupancy') }}"
                elevated
            >
                <div class="text-center py-2">
                    <div
                        class="display-4 fw-bold text-primary"
                        aria-label="{{ __('dashboard.metrics.occupancy_rate', ['value' => $occupancyPercentage]) }}"
                    >
                        {{ $occupancyPercentage }}%
                    </div>

                    {{-- Progress Bar --}}
                    <div class="progress mt-3" role="progressbar" aria-valuenow="{{ intval($occupancyPercentage) }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ __('dashboard.cards.occupancy') }}">
                        <div
                            class="progress-bar bg-primary"
                            style="width: {{ $occupancyPercentage }}%"
                            aria-hidden="true"
                        ></div>
                    </div>

                    <small class="text-muted d-block mt-2">
                        {{ __('dashboard.metrics.last_updated') }}: {{ now()->format('H:i:s') }}
                    </small>
                </div>
            </x-card>
        </div>

        {{-- Active Homestays Card
             WCAG Pattern: Metric card with icon (marked as decorative)
             - icon with bi-house-heart: Bootstrap icon (decorative, aria-hidden)
             - aria-label: Accessible description of the metric value
        --}}
        <div class="col-12 col-sm-6 col-lg-3">
            <x-card
                title="{{ __('dashboard.cards.active_homestays') }}"
                elevated
            >
                <div class="text-center py-2">
                    <div
                        class="display-4 fw-bold text-success"
                        aria-label="{{ __('dashboard.metrics.active_homestays_count', ['count' => $activeHomestays]) }}"
                    >
                        {{ $activeHomestays }}
                    </div>

                    <p class="text-muted small mt-3">
                        <i class="bi bi-house-heart text-success me-1" aria-hidden="true"></i>
                        {{ __('dashboard.metrics.homestays') }}
                    </p>
                </div>
            </x-card>
        </div>

        {{-- Total Visitors Card
             WCAG Pattern: Metric card with formatted number
             - number_format: Improve readability for large numbers
             - aria-label: Screen reader announces formatted value descriptively
        --}}
        <div class="col-12 col-sm-6 col-lg-3">
            <x-card
                title="{{ __('dashboard.cards.total_visitors') }}"
                elevated
            >
                <div class="text-center py-2">
                    <div
                        class="display-4 fw-bold text-info"
                        aria-label="{{ __('dashboard.metrics.total_visitors_count', ['count' => $totalVisitors]) }}"
                    >
                        {{ number_format($totalVisitors) }}
                    </div>

                    <p class="text-muted small mt-3">
                        <i class="bi bi-people text-info me-1"></i>
                        {{ __('dashboard.metrics.guests') }}
                    </p>
                </div>
            </x-card>
        </div>

        {{-- Average Rating Card --}}
        <div class="col-12 col-sm-6 col-lg-3">
            <x-card
                title="{{ __('dashboard.cards.average_rating') }}"
                elevated
            >
                <div class="text-center py-2">
                    <div
                        class="display-4 fw-bold text-warning"
                        aria-label="{{ __('dashboard.metrics.average_rating_value', ['rating' => $averageRating]) }}"
                    >
                        {{ number_format($averageRating, 1) }}
                    </div>

                    <div class="mt-2">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < floor($averageRating))
                                <i class="bi bi-star-fill text-warning"></i>
                            @elseif ($i < ceil($averageRating))
                                <i class="bi bi-star-half text-warning"></i>
                            @else
                                <i class="bi bi-star text-muted"></i>
                            @endif
                        @endfor
                    </div>

                    <p class="text-muted small mt-3">
                        <i class="bi bi-hand-thumbs-up text-warning me-1"></i>
                        {{ __('dashboard.metrics.rating') }}
                    </p>
                </div>
            </x-card>
        </div>
    </div>

    {{-- Metrics Detail Table (Optional) --}}
    @if (! empty($metrics))
        <div class="card mt-4">
            <div class="card-header">
                <h6 class="card-title mb-0">{{ __('dashboard.sections.detailed_metrics') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">{{ __('dashboard.table.metric') }}</th>
                                <th scope="col" class="text-end">{{ __('dashboard.table.value') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($metrics as $key => $value)
                                <tr>
                                    <td>
                                        <strong>{{ __("dashboard.metrics.$key", ['default' => $key]) }}</strong>
                                    </td>
                                    <td class="text-end">
                                        @if (is_numeric($value))
                                            {{ number_format($value, is_float($value) ? 2 : 0) }}
                                        @else
                                            {{ $value }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
