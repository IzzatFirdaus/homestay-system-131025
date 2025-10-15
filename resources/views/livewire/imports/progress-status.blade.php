<div wire:poll.5s="refreshStatus" class="card">
    <div class="card-body">
        <h5 class="card-title mb-4">
            {{ __('Status Import') }}
        </h5>

        @if($import)
            <div class="mb-3">
                <div class="d-flex justify-content-between mb-2">
                    <span class="fw-semibold">{{ __('Jenis Import') }}:</span>
                    <span class="badge bg-secondary">{{ ucfirst($import->jenis_import) }}</span>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="fw-semibold">{{ __('Status') }}:</span>
                    <span class="badge
                        @if($import->status === 'completed') bg-success
                        @elseif($import->status === 'processing') bg-primary
                        @elseif($import->status === 'failed') bg-danger
                        @elseif($import->status === 'pending') bg-warning
                        @else bg-secondary
                        @endif
                    ">
                        {{ __(ucfirst($import->status)) }}
                    </span>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="fw-semibold">{{ __('Fail Asal') }}:</span>
                    <span class="text-muted">{{ $import->original_filename }}</span>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="fw-semibold">{{ __('Dimuat Naik Oleh') }}:</span>
                    <span class="text-muted">{{ $import->user->name ?? __('Tidak diketahui') }}</span>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="fw-semibold">{{ __('Tarikh Muat Naik') }}:</span>
                    <span class="text-muted">{{ $import->created_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            @if($import->total_rows > 0)
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-semibold">{{ __('Progress') }}:</span>
                        <span class="text-muted">{{ $import->processed_rows }} / {{ $import->total_rows }}</span>
                    </div>

                    <div class="progress" style="height: 25px;">
                        <div
                            class="progress-bar progress-bar-striped
                                @if($import->status === 'processing') progress-bar-animated @endif
                                @if($import->status === 'completed') bg-success
                                @elseif($import->status === 'failed') bg-danger
                                @else bg-primary
                                @endif
                            "
                            role="progressbar"
                            style="width: {{ $progressPercentage }}%;"
                            aria-valuenow="{{ $progressPercentage }}"
                            aria-valuemin="0"
                            aria-valuemax="100"
                        >
                            {{ number_format($progressPercentage, 1) }}%
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-4">
                        <div class="text-center p-3 bg-light rounded">
                            <div class="fs-4 fw-bold text-primary">{{ $import->total_rows }}</div>
                            <div class="small text-muted">{{ __('Jumlah Baris') }}</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center p-3 bg-light rounded">
                            <div class="fs-4 fw-bold text-success">{{ $import->processed_rows }}</div>
                            <div class="small text-muted">{{ __('Berjaya') }}</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center p-3 bg-light rounded">
                            <div class="fs-4 fw-bold text-danger">{{ $import->failed_rows }}</div>
                            <div class="small text-muted">{{ __('Gagal') }}</div>
                        </div>
                    </div>
                </div>
            @endif

            @if($import->error_message)
                <x-alert type="danger" :dismissible="false">
                    <strong>{{ __('Ralat') }}:</strong> {{ $import->error_message }}
                </x-alert>
            @endif

            @if($import->error_log_path && $import->failed_rows > 0)
                <div class="alert alert-warning" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    {{ __('Terdapat :count baris gagal diimport.', ['count' => $import->failed_rows]) }}
                    <a href="{{ route('imports.download-errors', $import) }}" class="alert-link">
                        {{ __('Muat turun laporan ralat') }}
                    </a>
                </div>
            @endif

            <div class="d-flex justify-content-between mt-4">
                @if($import->status === 'completed')
                    <a href="{{ route('imports.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left me-2"></i>{{ __('Kembali ke Senarai Import') }}
                    </a>
                @elseif($import->status === 'processing')
                    <button type="button" class="btn btn-secondary" disabled>
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        {{ __('Sedang diproses...') }}
                    </button>
                @else
                    <a href="{{ route('imports.preview', $import) }}" class="btn btn-outline-secondary">
                        <i class="bi bi-eye me-2"></i>{{ __('Lihat Pratonton') }}
                    </a>
                @endif

                @if($import->status !== 'processing')
                    <button
                        wire:click="cancelImport"
                        wire:confirm="{{ __('Adakah anda pasti untuk membatalkan import ini?') }}"
                        class="btn btn-outline-danger"
                    >
                        <i class="bi bi-x-circle me-2"></i>{{ __('Batal Import') }}
                    </button>
                @endif
            </div>
        @else
            <x-empty-state
                icon="file-earmark-x"
                :message="__('Import tidak dijumpai.')"
            />
        @endif

        <div wire:loading class="text-center mt-3">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">{{ __('Memuatkan...') }}</span>
            </div>
        </div>
    </div>
</div>
