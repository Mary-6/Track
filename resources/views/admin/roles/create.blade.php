@extends('layouts.admin')

@section('title', 'Create Role')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @include('admin.roles._form')
        </form>
    </div>
@endsection
