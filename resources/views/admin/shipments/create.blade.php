@extends('layouts.admin')

@section('title', 'Create Shipment')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.shipments.store') }}" method="POST">
            @include('admin.shipments._form')
        </form>
    </div>
@endsection
