@extends('layouts.admin')

@section('title', 'Create Driver')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.drivers.store') }}" method="POST">
            @include('admin.drivers._form')
        </form>
    </div>
@endsection
