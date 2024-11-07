<?php

namespace App\Http\Controllers;

use App\Models\Chatroom;
use Illuminate\Http\Request;

class ChatroomController extends Controller
{
    public function create(Request $request)
    {
        $request->validate(['name' => 'required|string', 'max_members' => 'required|integer']);
        return Chatroom::create($request->only('name', 'max_members'));
    }

    public function index(Request $request)
    {
        return Chatroom::paginate(10);
    }

    public function enter(Request $request, $id)
    {
        $chatroom = Chatroom::findOrFail($id);
        if ($chatroom->members()->count() >= $chatroom->max_members) {
            return response()->json(['error' => 'Chatroom full'], 403);
        }
        $chatroom->members()->attach($request->user()->id);
        return response()->json(['message' => 'Joined chatroom']);
    }

    public function leave(Request $request, $id)
    {
        $chatroom = Chatroom::findOrFail($id);
        $chatroom->members()->detach($request->user()->id);
        return response()->json(['message' => 'Left chatroom']);
    }
}
