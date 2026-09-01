<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupportTicketController extends Controller
{
    public function index()
    {
        $tickets = SupportTicket::with('assignee')->latest()->paginate(20);

        return view('admin.support-tickets.index', compact('tickets'));
    }

    public function create()
    {
        $users = User::where('is_active', true)->get();

        return view('admin.support-tickets.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $data['ticket_number'] = 'TKT-' . strtoupper(Str::random(8));
        $data['status'] = 'OPEN';

        SupportTicket::create($data);

        return redirect()->route('admin.support-tickets.index')->with('success', 'Ticket created.');
    }

    public function show(SupportTicket $supportTicket)
    {
        $supportTicket->load('assignee');

        return view('admin.support-tickets.show', compact('supportTicket'));
    }

    public function edit(SupportTicket $supportTicket)
    {
        $users = User::where('is_active', true)->get();

        return view('admin.support-tickets.edit', compact('supportTicket', 'users'));
    }

    public function update(Request $request, SupportTicket $supportTicket)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'status' => 'required|string|max:50',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        if ($data['status'] === 'RESOLVED' && is_null($supportTicket->resolved_at)) {
            $data['resolved_at'] = now();
        }

        $supportTicket->update($data);

        return redirect()->route('admin.support-tickets.index')->with('success', 'Ticket updated.');
    }

    public function destroy(SupportTicket $supportTicket)
    {
        $supportTicket->delete();

        return back()->with('success', 'Ticket deleted.');
    }
}
