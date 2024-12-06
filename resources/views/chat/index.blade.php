@extends('public-layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow p-6 rounded-lg text-black">
    <h1 class="text-2xl font-bold mb-4">Chat with {{ $receiverId }}</h1>

    <!-- Display all messages -->
    <div class="h-96 overflow-y-auto mb-4">
        @foreach ($messages as $message)
            <div class="mb-4">
                <strong>{{ $message->sender->name }}:</strong>
                <p>{{ $message->message }}</p>
                <small class="text-gray-500">{{ $message->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    </div>

    <!-- Send new message form -->
    <form action="{{ route('chat.store', $receiverId) }}" method="POST">
        @csrf
        <textarea name="message" rows="4" class="w-full border rounded-lg p-2 mb-4" placeholder="Type your message..."></textarea>
        <button type="submit" style="background-color: #FF2D20" class="bg-blue-500 text-white py-2 px-4 rounded-lg !important">Send</button>
        <!-- <button type="submit" class="mt-4 inline-block px-4 py-2 bg-[#FF2D20] text-white rounded-full">Send</button> -->

    </form>
</div>
@endsection