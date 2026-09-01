@extends('layouts.admin')

@section('title', 'Edit Shipment')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.shipments.update', $shipment) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.shipments._form')
        </form>
    </div>
@endsection
