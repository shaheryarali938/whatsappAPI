<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send(Request $request, $chatroomId)
    {
        $request->validate([
            'content' => 'nullable|string',
            'attachment' => 'nullable|file',
        ]);

        $path = $request->file('attachment') ? $request->file('attachment')->store('attachments') : null;

        Message::create([
            'chatroom_id' => $chatroomId,
            'user_id' => $request->user()->id,
            'content' => $request->input('content'),
            'attachment' => $path,
        ]);

        return response()->json(['message' => 'Message sent']);
    }

    public function index($chatroomId)
    {
        return Message::where('chatroom_id', $chatroomId)->paginate(10);
    }
}
