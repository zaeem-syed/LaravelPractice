<?php

namespace App\Http\Controllers;
use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->latest()->take(50)->get()->reverse();
        return view('chat', compact('messages'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate(['message' => 'required']);

        $message = Message::create([
            'user_id' => auth()->id(),
            'message' => $request->message
        ]);

        broadcast(new MessageSent(auth()->user()->name, $message->message))->toOthers();

        return response()->json([
            'user_name' => auth()->user()->name,
            'message' => $message->message
        ]);
    }
}

