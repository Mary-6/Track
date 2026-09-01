@extends('layouts.admin')

@section('title', 'Vehicle Details')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold">{{ $vehicle->registration }}</h2>
        <p class="mt-2 text-slate-600">{{ $vehicle->make }} {{ $vehicle->model }} ({{ $vehicle->type ?? 'No type' }})</p>
        <p class="mt-1 text-sm text-slate-500">Branch: {{ $vehicle->branch?->name ?? 'None' }} | Driver: {{ $vehicle->driver?->name ?? 'None' }}</p>
        <a href="{{ route('admin.vehicles.edit', $vehicle) }}" class="inline-block mt-4 bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Edit</a>
    </div>
@endsection
