<?php

use App\Services\ReportService;
use Illuminate\Support\Facades\Cache;
use function Livewire\Volt\{state, computed, layout};

layout('layouts.app');

state([
    'tahun' => date('Y'),
]);

$chartData = computed(function (ReportService $reportService) {
    $cacheKey = 'revenue_by_state_chart_' . $this->tahun;

    return Cache::remember($cacheKey, 900, function () use ($reportService) {
        $data = $reportService->getRevenueByState((int)$this->tahun);

        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'label' => __('Pendapatan (RM)'),
                    'data' => array_values($data),
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(199, 199, 199, 0.2)',
                        'rgba(83, 102, 255, 0.2)',
                        'rgba(255, 99, 83, 0.2)',
                        'rgba(83, 255, 102, 0.2)',
                        'rgba(102, 83, 255, 0.2)',
                        'rgba(255, 83, 102, 0.2)',
                        'rgba(102, 255, 83, 0.2)',
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(199, 199, 199, 1)',
                        'rgba(83, 102, 255, 1)',
                        'rgba(255, 99, 83, 1)',
                        'rgba(83, 255, 102, 1)',
                        'rgba(102, 83, 255, 1)',
                        'rgba(255, 83, 102, 1)',
                        'rgba(102, 255, 83, 1)',
                    ],
                    'borderWidth' => 1,
                ],
            ],
        ];
    });
});

$tahunOptions = computed(function() {
    return range(date('Y'), date('Y') - 10);
});

?>

<div>
    <x-card title="{{ __('Pendapatan Mengikut Negeri') }}">
        <div class="row mb-3">
            <div class="col-md-4">
                <x-select wire:model.live="tahun" id="tahun_filter_revenue">
                    @foreach($this->tahunOptions as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </x-select>
            </div>
        </div>

        <div wire:loading.flex class="justify-content-center align-items-center" style="min-height: 300px;">
            <x-loading text="{{ __('Mengemaskini carta...') }}" />
        </div>

        <div wire:loading.remove>
            <x-chart
                chart-id="revenueByStateChart"
                type="pie"
                :data="$this->chartData"
                :options="[
                    'plugins' => [
                        'legend' => [
                            'position' => 'right',
                        ],
                    ],
                ]"
                :title="__('Pendapatan Mengikut Negeri')"
                :description="__('Carta pai memaparkan agihan pendapatan (RM) mengikut negeri bagi tahun terpilih.')"
            />
        </div>
    </x-card>
</div>
