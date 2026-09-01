@extends('layouts.admin')

@section('title', 'Warehouse Details')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold">{{ $warehouse->name }} ({{ $warehouse->code }})</h2>
        <p class="mt-2 text-slate-600">Branch: {{ $warehouse->branch?->name ?? 'None' }}</p>
        <p class="mt-1 text-sm text-slate-500">{{ $warehouse->address }}<br>{{ $warehouse->city }}, {{ $warehouse->country }}</p>
        <a href="{{ route('admin.warehouses.edit', $warehouse) }}" class="inline-block mt-4 bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Edit</a>
    </div>
@endsection
