<div>
    <div class="row mb-3">
        <div class="col-md-4">
            <x-select for="negeri" wire:model.live="negeri">
                <x-slot name="options">
                    <option value="">-- {{ __('Semua Negeri') }} --</option>
                    @foreach($negeris as $n)
                        <option value="{{ $n->id }}">{{ $n->name }}</option>
                    @endforeach
                </x-slot>
                {{ __('Negeri') }}
            </x-select>
        </div>
        <div class="col-md-4">
            <x-select for="tahun" wire:model.live="tahun">
                <x-slot name="options">
                    @foreach($tahuns as $t)
                        <option value="{{ $t }}">{{ $t }}</option>
                    @endforeach
                </x-slot>
                {{ __('Tahun') }}
            </x-select>
        </div>
    </div>
    <div wire:ignore>
        <canvas id="visitorsChart"></canvas>
    </div>
</div>

@script
<script>
    const visitorsChartCtx = document.getElementById('visitorsChart').getContext('2d');
    let visitorsChart = new Chart(visitorsChartCtx, {
        type: 'bar',
        data: @json($chartData),
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    document.addEventListener('livewire:initialized', () => {
        @this.on('chart-updated', ({ data }) => {
            visitorsChart.data = data;
            visitorsChart.update();
        });
    });
</script>
@endscript
