@extends('layouts.app')

@section('title', __('Kemaskini Homestay'))

@section('content')
    @livewire('homestays.create-edit-form', ['homestay' => $homestay])
@endsection
