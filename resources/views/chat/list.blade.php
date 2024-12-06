@extends('public-layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Chats</h1>

        <!-- Chat list -->
        <div class="space-y-4">
            @foreach($chatUsers as $user)
            <div class="flex items-center justify-between p-4 bg-gray-100 rounded-lg shadow-md hover:bg-gray-200 mb-6">
                <div class="flex items-center space-x-4">
                    <div>
                        <h2 class="text-xl text-black font-semibold">{{ $user->name }}</h2>
                        <p class="text-gray-600 text-sm">Last message...</p>
                    </div>
                </div>
                <a href="{{ route('chat.index', $user->id) }}" class="text-blue-500">Open Chat</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection