@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.users._form')
        </form>
    </div>
@endsection
