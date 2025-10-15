<?php

use App\Services\ReportService;
use Illuminate\Support\Facades\Cache;
use function Livewire\Volt\{state, computed, layout};

layout('layouts.app');

state([
    'negeri' => '',
    'tahun' => date('Y'),
]);

$chartData = computed(function (ReportService $reportService) {
    $cacheKey = 'visitors_chart_' . $this->negeri . '_' . $this->tahun;

    return Cache::remember($cacheKey, 900, function () use ($reportService) {
        $data = $reportService->getVisitorTrends($this->negeri, (int)$this->tahun);

        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'label' => __('Jumlah Pelawat'),
                    'data' => array_values($data),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                    'tension' => 0.4,
                ],
            ],
        ];
    });
});

$negeriOptions = computed(function() {
    // In a real app, this would come from a database table
    return [
        'JHR' => 'Johor',
        'KDH' => 'Kedah',
        'KTN' => 'Kelantan',
        'MLK' => 'Melaka',
        'NSN' => 'Negeri Sembilan',
        'PHG' => 'Pahang',
        'PRK' => 'Perak',
        'PLS' => 'Perlis',
        'PNG' => 'Pulau Pinang',
        'SBH' => 'Sabah',
        'SWK' => 'Sarawak',
        'SGR' => 'Selangor',
        'TRG' => 'Terengganu',
    ];
});

$tahunOptions = computed(function() {
    return range(date('Y'), date('Y') - 10);
});

?>

<div>
    <x-card title="{{ __('Trend Pelawat Bulanan') }}">
        <div class="row mb-3">
            <div class="col-md-4">
                <x-select wire:model.live="negeri" id="negeri_filter">
                    <option value="">{{ __('Semua Negeri') }}</option>
                    @foreach($this->negeriOptions as $code => $name)
                        <option value="{{ $code }}">{{ $name }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="col-md-4">
                <x-select wire:model.live="tahun" id="tahun_filter">
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
                chart-id="visitorsChart"
                type="line"
                :data="$this->chartData"
                :options="[
                    'scales' => [
                        'y' => [
                            'beginAtZero' => true
                        ]
                    ]
                ]"
                :title="__('Trend Pelawat Bulanan')"
                :description="__('Carta garisan memaparkan jumlah pelawat bulanan bagi negeri dan tahun terpilih.')"
            />
        </div>
    </x-card>
</div>
