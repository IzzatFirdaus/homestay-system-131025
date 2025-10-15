<?php

namespace App\Livewire\Reports;

use App\Data\ReportType;
use App\Jobs\GenerateReportJob;
use App\Models\Cooperative;
use App\Models\Negeri;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GenerateForm extends Component
{
    public $reportType;

    public $format = 'excel';

    public $startDate;

    public $endDate;

    public $negeriId;

    public $cooperativeId;

    public $performanceMetric;

    public $aggregationType = 'monthly';

    public $reportTypes = [];

    public $reportDescriptions = [];

    public $stateOptions = [];

    public $cooperatives = [];

    public $canFilterByState = false;

    public $canFilterByCooperative = false;

    public function mount()
    {
        $user = Auth::user();

        // Set default dates (current year)
        $this->startDate = now()->startOfYear()->format('Y-m-d');
        $this->endDate = now()->endOfYear()->format('Y-m-d');

        // Report types with translations
        $this->reportTypes = [
            ReportType::DashboardSummary->value => __('Ringkasan Dashboard'),
            ReportType::HomestayPerformance->value => __('Prestasi Homestay'),
            ReportType::NegeriPerformance->value => __('Prestasi Mengikut Negeri'),
        ];

        $this->reportDescriptions = [
            ReportType::DashboardSummary->value => __('Ringkasan keseluruhan prestasi homestay termasuk pelawat, pendapatan, dan kadar penghunian.'),
            ReportType::HomestayPerformance->value => __('Analisis terperinci prestasi homestay mengikut tempoh yang dipilih.'),
            ReportType::NegeriPerformance->value => __('Perbandingan prestasi homestay antara negeri-negeri.'),
        ];

        // State filter permission
        if ($user->hasAnyRole(['admin', 'penganalisis', 'pemerhati'])) {
            $this->canFilterByState = true;
            $this->stateOptions = Negeri::pluck('nama_negeri', 'id')->toArray();
        }

        // Cooperative filter (if koperasi admin)
        if ($user->hasRole('koperasi_admin')) {
            $this->canFilterByCooperative = true;
            $this->cooperatives = Cooperative::where('user_id', $user->id)
                ->pluck('nama_koperasi', 'id')
                ->toArray();
        }
    }

    public function generateReport()
    {
        $this->validate([
            'reportType' => 'required|in:'.implode(',', array_keys($this->reportTypes)),
            'format' => 'required|in:excel,pdf,csv',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'negeriId' => 'nullable|exists:negeris,id',
            'cooperativeId' => 'nullable|exists:cooperatives,id',
        ]);

        try {
            // Build filters
            $filters = [
                'from' => $this->startDate,
                'to' => $this->endDate,
            ];

            if ($this->negeriId) {
                $filters['negeri_id'] = $this->negeriId;
            }

            if ($this->cooperativeId) {
                $filters['cooperative_id'] = $this->cooperativeId;
            }

            if ($this->performanceMetric) {
                $filters['metric'] = $this->performanceMetric;
            }

            if ($this->aggregationType) {
                $filters['aggregation'] = $this->aggregationType;
            }

            // Convert format
            $formatMap = [
                'excel' => 'xlsx',
                'pdf' => 'pdf',
                'csv' => 'csv',
            ];
            $format = $formatMap[$this->format];

            // Get report type enum
            $reportTypeEnum = ReportType::from($this->reportType);

            // Dispatch background job
            GenerateReportJob::dispatch(
                $reportTypeEnum,
                $filters,
                $format,
                Auth::user()
            );

            session()->flash('success', __('Laporan sedang dijana. Anda akan dimaklumkan apabila ia sedia untuk dimuat turun.'));

            $this->dispatch('report-queued');
        } catch (\Exception $e) {
            session()->flash('error', __('Ralat semasa menjana laporan: '.$e->getMessage()));
        }
    }

    public function render()
    {
        return view('livewire.reports.generate-form');
    }
}
