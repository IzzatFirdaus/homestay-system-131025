@extends('layouts.app')

@section('title', 'Edit Homestay')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Homestay: {{ $homestay->nama }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('homestays.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                        <a href="{{ route('homestays.show', $homestay) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> View
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('homestays.update', $homestay) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Name</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                           id="nama" name="nama" value="{{ old('nama', $homestay->nama) }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="negeri">State</label>
                                    <select class="form-control @error('negeri') is-invalid @enderror"
                                            id="negeri" name="negeri" required>
                                        <option value="">Select State</option>
                                        <option value="Johor" {{ old('negeri', $homestay->negeri) == 'Johor' ? 'selected' : '' }}>Johor</option>
                                        <option value="Kedah" {{ old('negeri', $homestay->negeri) == 'Kedah' ? 'selected' : '' }}>Kedah</option>
                                        <option value="Kelantan" {{ old('negeri', $homestay->negeri) == 'Kelantan' ? 'selected' : '' }}>Kelantan</option>
                                        <!-- Add more states as needed -->
                                    </select>
                                    @error('negeri')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Address</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror"
                                              id="alamat" name="alamat" rows="3">{{ old('alamat', $homestay->alamat) }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kapasiti">Capacity</label>
                                    <input type="number" class="form-control @error('kapasiti') is-invalid @enderror"
                                           id="kapasiti" name="kapasiti" value="{{ old('kapasiti', $homestay->kapasiti) }}" min="1">
                                    @error('kapasiti')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="model_pengurusan">Management Model</label>
                                    <select class="form-control @error('model_pengurusan') is-invalid @enderror"
                                            id="model_pengurusan" name="model_pengurusan">
                                        <option value="">Select Model</option>
                                        <option value="Individual" {{ old('model_pengurusan', $homestay->model_pengurusan) == 'Individual' ? 'selected' : '' }}>Individual</option>
                                        <option value="Cooperative" {{ old('model_pengurusan', $homestay->model_pengurusan) == 'Cooperative' ? 'selected' : '' }}>Cooperative</option>
                                        <option value="Community" {{ old('model_pengurusan', $homestay->model_pengurusan) == 'Community' ? 'selected' : '' }}>Community</option>
                                    </select>
                                    @error('model_pengurusan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Homestay</button>
                            <a href="{{ route('homestays.show', $homestay) }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
