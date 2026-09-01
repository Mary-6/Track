@extends('layouts.admin')

@section('title', 'Edit Role')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.roles._form')
        </form>
    </div>
@endsection
