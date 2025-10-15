@props(['chartId', 'type' => 'line', 'data' => [], 'options' => [], 'title' => null, 'description' => null])

<figure {{ $attributes->merge(['class' => 'chart-container']) }}>
    @if($title)
        <figcaption id="{{ $chartId }}-caption" class="visually-hidden">{{ $title }}</figcaption>
    @endif
    <canvas
        id="{{ $chartId }}"
        role="img"
        aria-describedby="{{ $title ? $chartId.'-caption' : '' }} {{ $description ? $chartId.'-desc' : '' }}"
    ></canvas>
    @if($description)
        <div id="{{ $chartId }}-desc" class="visually-hidden" aria-live="polite">{{ $description }}</div>
    @endif
</figure>

@push('scripts')
<script type="module">
    import Chart from 'chart.js/auto';

    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('{{ $chartId }}').getContext('2d');

        const chartData = @json($data);
        const chartOptions = @json($options);

        new Chart(ctx, {
            type: '{{ $type }}',
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: true,
                ...chartOptions
            }
        });
    });
</script>
@endpush
