<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-4">{{ __('Jana Laporan') }}</h5>

        <form wire:submit="generateReport">
            <div class="row g-3">
                <!-- Report Type -->
                <div class="col-md-6">
                    <x-select
                        name="reportType"
                        :label="__('Jenis Laporan')"
                        wire:model.live="reportType"
                        :options="$reportTypes"
                        :error="$errors->first('reportType')"
                        required
                    />
                </div>

                <!-- Format -->
                <div class="col-md-6">
                    <x-select
                        name="format"
                        :label="__('Format')"
                        wire:model="format"
                        :options="[
                            'excel' => __('Excel (XLSX)'),
                            'pdf' => __('PDF'),
                            'csv' => __('CSV')
                        ]"
                        :error="$errors->first('format')"
                        required
                    />
                </div>

                <!-- Start Date -->
                <div class="col-md-6">
                    <x-input
                        type="date"
                        name="startDate"
                        :label="__('Tarikh Mula')"
                        wire:model="startDate"
                        :error="$errors->first('startDate')"
                        required
                    />
                </div>

                <!-- End Date -->
                <div class="col-md-6">
                    <x-input
                        type="date"
                        name="endDate"
                        :label="__('Tarikh Akhir')"
                        wire:model="endDate"
                        :error="$errors->first('endDate')"
                        required
                    />
                </div>

                <!-- State Filter (if negeri admin/above) -->
                @if($canFilterByState)
                    <div class="col-md-6">
                        <x-select
                            name="negeriId"
                            :label="__('Negeri (Pilihan)')"
                            wire:model="negeriId"
                            :options="$stateOptions"
                            :error="$errors->first('negeriId')"
                            :placeholder="__('-- Semua Negeri --')"
                        />
                    </div>
                @endif

                <!-- Cooperative Filter (if applicable) -->
                @if($canFilterByCooperative && $cooperatives)
                    <div class="col-md-6">
                        <x-select
                            name="cooperativeId"
                            :label="__('Koperasi (Pilihan)')"
                            wire:model="cooperativeId"
                            :options="$cooperatives"
                            :error="$errors->first('cooperativeId')"
                            :placeholder="__('-- Semua Koperasi --')"
                        />
                    </div>
                @endif

                <!-- Additional Filters (based on report type) -->
                @if($reportType === 'homestay_performance')
                    <div class="col-md-6">
                        <x-select
                            name="performanceMetric"
                            :label="__('Metrik Prestasi')"
                            wire:model="performanceMetric"
                            :options="[
                                'occupancy' => __('Kadar Penghunian'),
                                'revenue' => __('Pendapatan'),
                                'visitors' => __('Bilangan Pelawat'),
                                'all' => __('Semua Metrik')
                            ]"
                            :error="$errors->first('performanceMetric')"
                        />
                    </div>
                @endif

                @if($reportType === 'revenue_analysis')
                    <div class="col-md-6">
                        <x-select
                            name="aggregationType"
                            :label="__('Agregasi')"
                            wire:model="aggregationType"
                            :options="[
                                'monthly' => __('Bulanan'),
                                'quarterly' => __('Suku Tahun'),
                                'yearly' => __('Tahunan')
                            ]"
                            :error="$errors->first('aggregationType')"
                        />
                    </div>
                @endif
            </div>

            <!-- Report Description -->
            @if($reportType)
                <div class="alert alert-info mt-4" role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    <strong>{{ __('Keterangan') }}:</strong> {{ $reportDescriptions[$reportType] ?? '' }}
                </div>
            @endif

            <!-- Submit Button -->
            <div class="mt-4 d-flex justify-content-between">
                <button
                    type="submit"
                    class="btn btn-primary"
                    wire:loading.attr="disabled"
                    wire:target="generateReport"
                >
                    <span wire:loading.remove wire:target="generateReport">
                        <i class="bi bi-file-earmark-arrow-down me-2"></i>{{ __('Jana Laporan') }}
                    </span>
                    <span wire:loading wire:target="generateReport">
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        {{ __('Sedang menjana...') }}
                    </span>
                </button>

                <a href="{{ route('reports.history') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-clock-history me-2"></i>{{ __('Sejarah Laporan') }}
                </a>
            </div>
        </form>

        <!-- Success Message -->
        @if (session()->has('success'))
            <x-alert type="success" class="mt-4" :dismissible="true">
                {{ session('success') }}
            </x-alert>
        @endif
    </div>
</div>
