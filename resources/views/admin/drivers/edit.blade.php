@extends('layouts.admin')

@section('title', 'Edit Driver')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.drivers.update', $driver) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.drivers._form')
        </form>
    </div>
@endsection
