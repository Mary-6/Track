<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    public function index()
    {
        $rooms = ChatRoom::with('lastMessage')
            ->orderByDesc('last_message_at')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.chat.index', compact('rooms'));
    }

    public function count()
    {
        $count = ChatRoom::where('status', 'open')
            ->where(function ($query) {
                $query->whereHas('lastMessage', fn ($q) => $q->where('is_admin', false))
                      ->orWhereDoesntHave('lastMessage');
            })
            ->count();

        return response()->json(['count' => $count]);
    }

    public function show(ChatRoom $room)
    {
        $room->load(['messages.user']);

        if (! $room->assigned_to) {
            $room->assigned_to = auth()->id();
            $room->save();
        }

        return view('admin.chat.show', compact('room'));
    }

    public function reply(Request $request, ChatRoom $room)
    {
        $data = $request->validate([
            'content' => 'required|string|max:2000',
        ]);

        $message = $room->messages()->create([
            'content' => $data['content'],
            'user_id' => auth()->id(),
            'is_admin' => true,
            'sender_name' => auth()->user()->name,
        ]);

        $room->last_message_at = now();
        if (! $room->assigned_to) {
            $room->assigned_to = auth()->id();
        }
        $room->save();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'id' => $message->id,
                'content' => $message->content,
                'is_admin' => true,
                'sender_name' => $message->sender_name,
                'created_at' => $message->created_at->toDateTimeString(),
            ]);
        }

        return back()->with('success', 'Reply sent.');
    }
}
