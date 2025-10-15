@extends('layouts.app')

@section('title', __('Tambah Prestasi'))

@section('content')
    <div class="container-fluid px-4">
        <x-card>
            <div class="card-header">
                <h5 class="mb-0">{{ __('Tambah Rekod Prestasi') }}</h5>
            </div>
            <div class="card-body">
                @if ($errors->has('general'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('general') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('performances.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="homestay_id" class="form-label">{{ __('Homestay') }}</label>
                                <select
                                    name="homestay_id"
                                    id="homestay_id"
                                    class="form-select @error('homestay_id') is-invalid @enderror"
                                    required
                                >
                                    <option value="">{{ __('Pilih Homestay') }}</option>
                                    @foreach($homestays as $id => $nama)
                                        <option value="{{ $id }}" {{ old('homestay_id') == $id ? 'selected' : '' }}>
                                            {{ $nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('homestay_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="bulan" class="form-label">{{ __('Bulan') }}</label>
                                <select
                                    name="bulan"
                                    id="bulan"
                                    class="form-select @error('bulan') is-invalid @enderror"
                                    required
                                >
                                    <option value="">{{ __('Pilih Bulan') }}</option>
                                    @foreach(['Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember'] as $index => $month)
                                        <option value="{{ $index + 1 }}" {{ old('bulan', date('n')) == ($index + 1) ? 'selected' : '' }}>
                                            {{ $month }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('bulan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="tahun" class="form-label">{{ __('Tahun') }}</label>
                                <select
                                    name="tahun"
                                    id="tahun"
                                    class="form-select @error('tahun') is-invalid @enderror"
                                    required
                                >
                                    @foreach($yearRange as $year)
                                        <option value="{{ $year }}" {{ old('tahun', $currentYear) == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tahun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pelawat_domestik" class="form-label">{{ __('Pelawat Domestik') }}</label>
                                <input
                                    type="number"
                                    name="pelawat_domestik"
                                    id="pelawat_domestik"
                                    class="form-control @error('pelawat_domestik') is-invalid @enderror"
                                    value="{{ old('pelawat_domestik', 0) }}"
                                    min="0"
                                    required
                                >
                                @error('pelawat_domestik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pelawat_asing" class="form-label">{{ __('Pelawat Asing') }}</label>
                                <input
                                    type="number"
                                    name="pelawat_asing"
                                    id="pelawat_asing"
                                    class="form-control @error('pelawat_asing') is-invalid @enderror"
                                    value="{{ old('pelawat_asing', 0) }}"
                                    min="0"
                                    required
                                >
                                @error('pelawat_asing')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pendapatan" class="form-label">{{ __('Pendapatan (RM)') }}</label>
                                <input
                                    type="number"
                                    name="pendapatan"
                                    id="pendapatan"
                                    class="form-control @error('pendapatan') is-invalid @enderror"
                                    value="{{ old('pendapatan', 0) }}"
                                    min="0"
                                    step="0.01"
                                    required
                                >
                                @error('pendapatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sumber_lain" class="form-label">{{ __('Sumber Lain (RM)') }}</label>
                                <input
                                    type="number"
                                    name="sumber_lain"
                                    id="sumber_lain"
                                    class="form-control @error('sumber_lain') is-invalid @enderror"
                                    value="{{ old('sumber_lain', 0) }}"
                                    min="0"
                                    step="0.01"
                                >
                                @error('sumber_lain')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('performances.index') }}" class="btn btn-secondary">
                            {{ __('Batal') }}
                        </a>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Simpan') }}
                        </button>
                    </div>
                </form>
            </div>
        </x-card>
    </div>
@endsection
