@extends('layouts.admin')

@section('title', 'Create Support Ticket')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.support-tickets.store') }}" method="POST">
            @include('admin.support-tickets._form')
        </form>
    </div>
@endsection
