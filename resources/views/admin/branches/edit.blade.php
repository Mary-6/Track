@extends('layouts.admin')

@section('title', 'Edit Branch')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.branches.update', $branch) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.branches._form')
        </form>
    </div>
@endsection
