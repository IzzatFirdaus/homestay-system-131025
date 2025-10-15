@extends('layouts.app')

@section('title', __('Import Data'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Import Data') }}</li>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-upload me-2"></i>{{ __('Import Data') }}
                    </h5>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Upload Form -->
                    <form action="{{ route('web.imports.upload') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                        @csrf

                        <div class="row g-3">
                            <!-- Import Type -->
                            <div class="col-md-6">
                                <label for="type" class="form-label">{{ __('Jenis Import') }} <span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                                    <option value="">{{ __('Pilih jenis import') }}</option>
                                    <option value="homestays" {{ old('type') === 'homestays' ? 'selected' : '' }}>{{ __('Homestays') }}</option>
                                    <option value="performances" {{ old('type') === 'performances' ? 'selected' : '' }}>{{ __('Prestasi Bulanan') }}</option>
                                    <option value="cooperatives" {{ old('type') === 'cooperatives' ? 'selected' : '' }}>{{ __('Koperasi') }}</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">{{ __('Pilih jenis data yang ingin diimport') }}</div>
                            </div>

                            <!-- File Upload -->
                            <div class="col-md-6">
                                <label for="file" class="form-label">{{ __('Fail Excel/CSV') }} <span class="text-danger">*</span></label>
                                <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror"
                                       accept=".xlsx,.xls,.csv" required>
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">{{ __('Format: .xlsx, .xls, .csv (Max: 50MB)') }}</div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-cloud-upload me-2"></i>{{ __('Muat Naik & Proses') }}
                            </button>
                        </div>
                    </form>

                    <hr>

                    <!-- Recent Imports -->
                    <h6 class="mb-3">{{ __('Import Terkini') }}</h6>

                    @if ($imports->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('Fail') }}</th>
                                        <th>{{ __('Jenis') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Progress') }}</th>
                                        <th>{{ __('Tarikh') }}</th>
                                        <th>{{ __('Tindakan') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($imports as $import)
                                        <tr>
                                            <td>
                                                <i class="bi bi-file-earmark-spreadsheet me-2"></i>
                                                {{ $import->filename }}
                                            </td>
                                            <td>
                                                <span class="badge bg-info">{{ ucfirst($import->type) }}</span>
                                            </td>
                                            <td>
                                                @if ($import->status === 'completed')
                                                    <span class="badge bg-success">{{ __('Selesai') }}</span>
                                                @elseif ($import->status === 'failed')
                                                    <span class="badge bg-danger">{{ __('Gagal') }}</span>
                                                @elseif ($import->status === 'processing')
                                                    <span class="badge bg-warning">{{ __('Memproses') }}</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ __('Dalam Barisan') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="progress" style="height: 20px; width: 100px;">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ $import->progress_percentage }}%"
                                                         aria-valuenow="{{ $import->progress_percentage }}"
                                                         aria-valuemin="0" aria-valuemax="100">
                                                        {{ number_format($import->progress_percentage, 0) }}%
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $import->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('web.imports.show', $import) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye me-1"></i>{{ __('Lihat') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $imports->links() }}
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            {{ __('Tiada rekod import. Muat naik fail pertama anda menggunakan borang di atas.') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
