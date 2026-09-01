@extends('layouts.admin')

@section('title', 'Create Vehicle')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.vehicles.store') }}" method="POST">
            @include('admin.vehicles._form')
        </form>
    </div>
@endsection
