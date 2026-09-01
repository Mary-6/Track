@extends('layouts.admin')

@section('title', 'Create Warehouse')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.warehouses.store') }}" method="POST">
            @include('admin.warehouses._form')
        </form>
    </div>
@endsection
