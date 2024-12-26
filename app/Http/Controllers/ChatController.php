<?php

namespace App\Http\Controllers;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($receiverId)
    {
        // Fetch messages between the authenticated user and the receiver
        $messages = Chat::where(function($query) use ($receiverId) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $receiverId);
        })
        ->orWhere(function($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', Auth::id());
        })
        ->latest()
        ->get();

        return view('chat.index', compact('messages', 'receiverId'));
    }

    public function store(Request $request, $receiverId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // Store the new message
        Chat::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $receiverId,
            'message' => $request->message,
        ]);

        return redirect()->route('chat.index', ['receiverId' => $receiverId]);
    }

    public function chatList()
{
    // Get list of users that the authenticated user has chatted with
    $chats = Chat::where('sender_id', Auth::id())
        ->orWhere('receiver_id', Auth::id())
        ->distinct()
        ->get(['sender_id', 'receiver_id']);

    // Fetch user details for both sender and receiver
    $chatUsers = $chats->map(function($chat) {
        return User::whereIn('id', [$chat->sender_id, $chat->receiver_id])
            ->where('id', '!=', Auth::id()) // Exclude the current user
            ->first(); // Get only the first valid user
    });

    // Filter out null values
    $chatUsers = $chatUsers->filter(function($user) {
        return $user !== null;
    });

    return view('chat.list', compact('chatUsers'));
}

}
