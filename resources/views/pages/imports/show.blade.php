@extends('layouts.app')

@section('title', __('Status Import'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('web.imports.index') }}">{{ __('Import Data') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Status Import') }}</li>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-info-circle me-2"></i>{{ __('Status Import') }}
                    </h5>
                    <a href="{{ route('web.imports.index') }}" class="btn btn-sm btn-light">
                        <i class="bi bi-arrow-left me-1"></i>{{ __('Kembali') }}
                    </a>
                </div>

                <div class="card-body">
                    <!-- Import Information -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">{{ __('Maklumat Fail') }}</h6>
                            <dl class="row">
                                <dt class="col-sm-4">{{ __('Nama Fail') }}:</dt>
                                <dd class="col-sm-8">{{ $import->filename }}</dd>

                                <dt class="col-sm-4">{{ __('Jenis') }}:</dt>
                                <dd class="col-sm-8"><span class="badge bg-info">{{ ucfirst($import->type) }}</span></dd>

                                <dt class="col-sm-4">{{ __('Dimuat naik oleh') }}:</dt>
                                <dd class="col-sm-8">{{ $import->user->name }}</dd>

                                <dt class="col-sm-4">{{ __('Tarikh') }}:</dt>
                                <dd class="col-sm-8">{{ $import->created_at->format('d/m/Y H:i:s') }}</dd>
                            </dl>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">{{ __('Status') }}</h6>
                            <div id="import-status-container">
                                <!-- Status Badge -->
                                <div class="mb-3">
                                    @if ($import->status === 'completed')
                                        <span class="badge bg-success fs-6">
                                            <i class="bi bi-check-circle me-2"></i>{{ __('Selesai') }}
                                        </span>
                                    @elseif ($import->status === 'failed')
                                        <span class="badge bg-danger fs-6">
                                            <i class="bi bi-x-circle me-2"></i>{{ __('Gagal') }}
                                        </span>
                                    @elseif ($import->status === 'processing')
                                        <span class="badge bg-warning fs-6">
                                            <i class="bi bi-hourglass-split me-2"></i>{{ __('Memproses') }}
                                        </span>
                                    @else
                                        <span class="badge bg-secondary fs-6">
                                            <i class="bi bi-clock me-2"></i>{{ __('Dalam Barisan') }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Progress Bar -->
                                <div class="mb-3">
                                    <div class="progress" style="height: 30px;">
                                        <div class="progress-bar progress-bar-striped {{ $import->status === 'processing' ? 'progress-bar-animated' : '' }}"
                                             role="progressbar"
                                             style="width: {{ $import->progress_percentage }}%"
                                             aria-valuenow="{{ $import->progress_percentage }}"
                                             aria-valuemin="0"
                                             aria-valuemax="100"
                                             id="progress-bar">
                                            {{ number_format($import->progress_percentage, 1) }}%
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Import Statistics -->
                    <h6 class="text-muted mb-3">{{ __('Statistik') }}</h6>
                    <div class="row text-center mb-4" id="statistics-container">
                        <div class="col-md-3">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h3 class="mb-0" id="rows-total">{{ number_format($import->rows_total) }}</h3>
                                    <small class="text-muted">{{ __('Jumlah Baris') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h3 class="mb-0" id="rows-processed">{{ number_format($import->rows_processed) }}</h3>
                                    <small class="text-muted">{{ __('Diproses') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h3 class="mb-0" id="rows-success">{{ number_format($import->rows_success) }}</h3>
                                    <small>{{ __('Berjaya') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <h3 class="mb-0" id="rows-failed">{{ number_format($import->rows_failed) }}</h3>
                                    <small>{{ __('Gagal') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Error Report Download -->
                    @if ($import->status === 'completed' && $import->rows_failed > 0)
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            {{ __('Terdapat :count baris yang gagal diimport.', ['count' => $import->rows_failed]) }}
                            <a href="{{ route('web.imports.download-errors', $import) }}" class="btn btn-sm btn-warning ms-3">
                                <i class="bi bi-download me-1"></i>{{ __('Muat Turun Laporan Ralat') }}
                            </a>
                        </div>
                    @endif

                    @if ($import->status === 'failed')
                        <div class="alert alert-danger">
                            <i class="bi bi-x-circle me-2"></i>
                            {{ __('Import gagal: :message', ['message' => $import->meta['error'] ?? 'Unknown error']) }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if (in_array($import->status, ['queued', 'processing']))
    @push('scripts')
    <script>
        // Auto-refresh every 3 seconds while processing
        let refreshInterval = setInterval(function() {
            fetch('{{ route('web.imports.show', $import) }}')
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    // Update statistics
                    document.getElementById('rows-total').textContent = doc.getElementById('rows-total').textContent;
                    document.getElementById('rows-processed').textContent = doc.getElementById('rows-processed').textContent;
                    document.getElementById('rows-success').textContent = doc.getElementById('rows-success').textContent;
                    document.getElementById('rows-failed').textContent = doc.getElementById('rows-failed').textContent;

                    // Update progress bar
                    const progressBar = doc.getElementById('progress-bar');
                    const currentProgressBar = document.getElementById('progress-bar');
                    currentProgressBar.style.width = progressBar.style.width;
                    currentProgressBar.textContent = progressBar.textContent;
                    currentProgressBar.setAttribute('aria-valuenow', progressBar.getAttribute('aria-valuenow'));

                    // Update status
                    const statusContainer = doc.getElementById('import-status-container');
                    document.getElementById('import-status-container').innerHTML = statusContainer.innerHTML;

                    // Check if completed or failed
                    const status = '{{ $import->status }}';
                    if (!html.includes('processing') && !html.includes('queued')) {
                        clearInterval(refreshInterval);
                        location.reload(); // Reload to show final state
                    }
                })
                .catch(error => console.error('Error refreshing import status:', error));
        }, 3000);
    </script>
    @endpush
@endif
@endsection
