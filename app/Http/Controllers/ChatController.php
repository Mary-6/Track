<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function messages(Request $request)
    {
        $roomId = $request->input('room_id');
        if (! $roomId) {
            return response()->json(['room' => null, 'messages' => []]);
        }

        $room = ChatRoom::where('room_id', $roomId)->first();
        if (! $room) {
            return response()->json(['room' => null, 'messages' => []]);
        }

        return response()->json([
            'room' => [
                'room_id' => $room->room_id,
                'guest_name' => $room->guest_name,
                'guest_email' => $room->guest_email,
            ],
            'messages' => $room->messages->map(fn ($m) => [
                'id' => $m->id,
                'content' => $m->content,
                'is_admin' => (bool) $m->is_admin,
                'sender_name' => $m->sender_name,
                'created_at' => $m->created_at->toDateTimeString(),
            ]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'room_id' => 'required|string|max:100',
            'guest_name' => 'nullable|string|max:255',
            'guest_email' => 'nullable|email|max:255',
            'content' => 'required|string|max:2000',
        ]);

        $room = ChatRoom::firstOrCreate(
            ['room_id' => $data['room_id']],
            [
                'guest_name' => $data['guest_name'] ?? 'Guest',
                'guest_email' => $data['guest_email'],
                'status' => 'open',
            ]
        );

        if ($data['guest_name'] && $room->guest_name !== $data['guest_name']) {
            $room->guest_name = $data['guest_name'];
        }
        if ($data['guest_email'] && ! $room->guest_email) {
            $room->guest_email = $data['guest_email'];
        }
        $room->last_message_at = now();
        $room->save();

        $message = $room->messages()->create([
            'content' => $data['content'],
            'is_admin' => false,
            'sender_name' => $room->guest_name,
        ]);

        return response()->json([
            'id' => $message->id,
            'content' => $message->content,
            'is_admin' => false,
            'sender_name' => $message->sender_name,
            'created_at' => $message->created_at->toDateTimeString(),
        ]);
    }
}
