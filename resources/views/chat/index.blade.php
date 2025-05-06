@extends('public-layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow p-6 rounded-lg text-black">
    <h1 class="text-2xl font-bold mb-4">
        Chat with {{ Auth::id() === $chat->sender_id ? $chat->receiver->name : $chat->sender->name }}
    </h1>

    <!-- Display all messages -->
    <div class="h-96 overflow-y-auto mb-4 flex flex-col space-y-4">
        @forelse ($chat->messages as $message)
            <div class="p-3 rounded-lg max-w-[75%]
                {{ $message->sender_id === Auth::id() ? 'bg-blue-100 ml-auto text-right' : 'bg-gray-100 mr-auto text-left' }}">
                <div class="font-semibold text-sm text-gray-800">
                    {{ $message->sender_id === Auth::id() ? 'You' : $chat->sender->name }}
                </div>
                <p class="text-base">{{ $message->message }}</p>
                <small class="text-xs text-gray-500">
                    {{ $message->created_at ? $message->created_at->diffForHumans() : '' }}
                </small>
            </div>
        @empty
            <p class="text-gray-500">No messages yet.</p>
        @endforelse
    </div>

    <!-- Send new message form -->
    <form action="{{ route('chat.store', $chat->id) }}" method="POST">
        @csrf
        <textarea name="message" rows="4" class="w-full border rounded-lg p-2 mb-4" placeholder="Type your message..."></textarea>
        <button type="submit" style="background-color: #FF2D20" class="text-white py-2 px-4 rounded-lg">
            Send
        </button>
    </form>
</div>
@endsection
