<?php

namespace App\Http\Controllers;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ChatController extends Controller
{

    
    public function index($chatId)
    {
        // Find the chat or fail if not found
        $chat = Chat::with(['messages', 'sender', 'receiver'])->findOrFail($chatId);
    
        // Alternatively, you can paginate messages if there are too many
        $messages = Message::where('chat_id', $chatId);
    // dd($chat->messages);
        return view('chat.index', compact('chat', 'messages'));
    }
    

    
    public function store(Request $request, $chatId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);
    
        $chat = Chat::findOrFail($chatId);
    
        // Ensure the authenticated user is either the sender or receiver
        if (!in_array(Auth::id(), [$chat->sender_id, $chat->receiver_id])) {
            abort(403); // Unauthorized
        }
    
        // Create the message
        Message::create([
            'chat_id' => $chat->id,
            'message' => $request->message,
            'sender_id' => Auth::id(),
        ]);
    
        return redirect()->route('chat.index', ['chatId' => $chatId]);
    }
    

    public function newChat($receiverId, $itemId)
    {
        // Check if a chat already exists between the authenticated user and the receiver
        $existingChat = Chat::where(function ($query) use ($receiverId, $itemId) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $receiverId)
                  ->where('item_id', $itemId);
        })
        ->orWhere(function ($query) use ($receiverId, $itemId) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', Auth::id())
                  ->where('item_id', $itemId);
        })
        ->first();
    
        // If a chat already exists, return to the existing chat
        if ($existingChat) {
            return redirect()->route('chat.index', ['chatId' => $existingChat->id]);
        }
    
        // Otherwise, create a new chat
        $chat = Chat::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $receiverId,
            'item_id' => $itemId,
        ]);
    
        return redirect()->route('chat.index', ['chatId' => $chat->id]);
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
