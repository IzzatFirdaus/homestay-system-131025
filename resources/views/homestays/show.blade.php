@extends('layouts.app')

@section('title', 'Homestay Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Homestay: {{ $homestay->nama }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('homestays.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                        <a href="{{ route('homestays.edit', $homestay) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">ID</th>
                                    <td>{{ $homestay->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $homestay->nama }}</td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>{{ $homestay->negeri }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $homestay->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Capacity</th>
                                    <td>{{ $homestay->kapasiti }} guests</td>
                                </tr>
                                <tr>
                                    <th>Management Model</th>
                                    <td>{{ $homestay->model_pengurusan }}</td>
                                </tr>
                                <tr>
                                    <th>Created</th>
                                    <td>{{ $homestay->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated</th>
                                    <td>{{ $homestay->updated_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
