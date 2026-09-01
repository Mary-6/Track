@extends('layouts.admin')

@section('title', 'Create Branch')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.branches.store') }}" method="POST">
            @include('admin.branches._form')
        </form>
    </div>
@endsection
