@extends('layouts.admin')

@section('title', 'Edit Support Ticket')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('admin.support-tickets.update', $supportTicket) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.support-tickets._form')
        </form>
    </div>
@endsection
