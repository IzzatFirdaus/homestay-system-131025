@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0"><i class="bi bi-file-earmark-text me-2"></i>{{ __('reports.title') }}</h4>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('common.general.close') }}"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-circle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('common.general.close') }}"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('web.reports.generate') }}" id="reportForm">
                        @csrf

                        <!-- Report Type -->
                        <div class="mb-3">
                            <label for="type" class="form-label">{{ __('reports.type') }} <span class="text-danger">*</span></label>
                            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                                <option value="">{{ __('reports.type_placeholder') }}</option>
                                <option value="dashboard_summary" {{ old('type') === 'dashboard_summary' ? 'selected' : '' }}>
                                    {{ __('reports.types.dashboard_summary') }}
                                </option>
                                <option value="homestay_performance" {{ old('type') === 'homestay_performance' ? 'selected' : '' }}>
                                    {{ __('reports.types.homestay_performance') }}
                                </option>
                                <option value="negeri_performance" {{ old('type') === 'negeri_performance' ? 'selected' : '' }}>
                                    {{ __('reports.types.negeri_performance') }}
                                </option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">{{ __('reports.hint_choose_type') }}</div>
                        </div>

                        <!-- Date Range -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">{{ __('reports.start_date') }}</label>
                                <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}">
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="end_date" class="form-label">{{ __('reports.end_date') }}</label>
                                <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Negeri Filter (Only for Admin) -->
                        @if(!Auth::user()->hasRole('Pemerhati'))
                        <div class="mb-3" id="negeriFilter">
                            <label for="negeri" class="form-label">{{ __('reports.negeri') }}</label>
                            <select name="negeri" id="negeri" class="form-select @error('negeri') is-invalid @enderror">
                                <option value="">{{ __('reports.negeri_all') }}</option>
                                @foreach(['Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan', 'Pahang', 'Perak', 'Perlis', 'Pulau Pinang', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu', 'WP Kuala Lumpur', 'WP Labuan', 'WP Putrajaya'] as $state)
                                    <option value="{{ $state }}" {{ old('negeri') === $state ? 'selected' : '' }}>{{ $state }}</option>
                                @endforeach
                            </select>
                            @error('negeri')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif

                        <!-- Homestay Filter (For Homestay Performance Report) -->
                        <div class="mb-3" id="homestayFilter" style="display: none;">
                            <label for="homestay_id" class="form-label">{{ __('reports.homestay') }}</label>
                            <select name="homestay_id" id="homestay_id" class="form-select @error('homestay_id') is-invalid @enderror">
                                <option value="">{{ __('reports.homestay_all') }}</option>
                                <!-- Homestays will be loaded dynamically via AJAX based on selected negeri -->
                            </select>
                            @error('homestay_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Format Selection -->
                        <div class="mb-3">
                            <label for="format" class="form-label">{{ __('reports.format') }}</label>
                            <select name="format" id="format" class="form-select @error('format') is-invalid @enderror">
                                <option value="xlsx" {{ old('format', 'xlsx') === 'xlsx' ? 'selected' : '' }}>{{ __('reports.formats.xlsx') }}</option>
                                <option value="csv" {{ old('format') === 'csv' ? 'selected' : '' }}>{{ __('reports.formats.csv') }}</option>
                                <option value="pdf" {{ old('format') === 'pdf' ? 'selected' : '' }}>{{ __('reports.formats.pdf') }}</option>
                            </select>
                            @error('format')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-file-earmark-arrow-down me-2"></i>{{ __('reports.generate') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Report Information Card -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>{{ __('reports.info_title') }}</h5>
                </div>
                <div class="card-body">
                    <h6>{{ __('reports.available_types') }}</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <strong>{{ __('reports.types.dashboard_summary') }}:</strong> {{ __('reports.desc_dashboard') }}
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('reports.types.homestay_performance') }}:</strong> {{ __('reports.desc_homestay') }}
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('reports.types.negeri_performance') }}:</strong> {{ __('reports.desc_negeri') }}
                        </li>
                    </ul>

                    <div class="alert alert-info mt-3">
                        <i class="bi bi-clock me-2"></i>
                        {{ __('reports.large_report_notice') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const reportTypeSelect = document.getElementById('type');
    const homestayFilter = document.getElementById('homestayFilter');

    // Show/hide homestay filter based on report type
    reportTypeSelect.addEventListener('change', function() {
        if (this.value === 'homestay_performance') {
            homestayFilter.style.display = 'block';
        } else {
            homestayFilter.style.display = 'none';
        }
    });

    // Trigger on page load if type is already selected
    if (reportTypeSelect.value === 'homestay_performance') {
        homestayFilter.style.display = 'block';
    }
});
</script>
@endsection
