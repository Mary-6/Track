@extends('layouts.admin')

@section('title', 'Edit Warehouse')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.warehouses.update', $warehouse) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.warehouses._form')
        </form>
    </div>
@endsection
