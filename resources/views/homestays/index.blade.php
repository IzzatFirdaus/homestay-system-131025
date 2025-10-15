@extends('layouts.app')

@section('title', __('Senarai Homestay'))

@section('content')
    @livewire('homestays.index-table')
@endsection
