<div wire:ignore>
    <canvas id="revenueByStateChart"></canvas>
</div>

@script
<script>
    const revenueChartCtx = document.getElementById('revenueByStateChart').getContext('2d');
    let revenueChart = new Chart(revenueChartCtx, {
        type: 'pie',
        data: @json($chartData),
        options: {
            responsive: true,
        }
    });

    document.addEventListener('livewire:initialized', () => {
        @this.on('revenue-chart-updated', ({ data }) => {
            revenueChart.data = data;
            revenueChart.update();
        });
    });
</script>
@endscript
