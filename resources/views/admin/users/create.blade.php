@extends('layouts.admin')

@section('title', 'Create User')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @include('admin.users._form')
        </form>
    </div>
@endsection
