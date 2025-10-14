@extends('layouts.app')

@section('title', 'Homestays')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Homestays</h3>
                    <div class="card-tools">
                        <a href="{{ route('homestays.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Homestay
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>State</th>
                                    <th>Address</th>
                                    <th>Capacity</th>
                                    <th>Management Model</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($homestays as $homestay)
                                <tr>
                                    <td>{{ $homestay->id }}</td>
                                    <td>{{ $homestay->nama }}</td>
                                    <td>{{ $homestay->negeri }}</td>
                                    <td>{{ $homestay->alamat }}</td>
                                    <td>{{ $homestay->kapasiti }}</td>
                                    <td>{{ $homestay->model_pengurusan }}</td>
                                    <td>
                                        <a href="{{ route('homestays.show', $homestay) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('homestays.edit', $homestay) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No homestays found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
