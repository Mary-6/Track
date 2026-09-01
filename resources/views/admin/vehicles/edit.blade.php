@extends('layouts.admin')

@section('title', 'Edit Vehicle')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.vehicles.update', $vehicle) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.vehicles._form')
        </form>
    </div>
@endsection
