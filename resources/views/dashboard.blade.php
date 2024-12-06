@extends('public-layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-black">
    <!-- Dashboard Header -->
    <h1 class="text-3xl font-bold mb-6">Welcome to Your Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Profile Section -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
            <h2 class="text-xl font-semibold">Your Profile</h2>
            <p class="mt-2">Name: {{ Auth::user()->name }}</p>
            <p>Email: {{ Auth::user()->email }}</p>
            <a href="{{ route('profile.edit') }}" class="text-center mt-auto inline-block px-4 py-2 bg-blue-500 text-white rounded-md">Edit Profile</a>
        </div>

        <!-- Items Section -->
<div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
    <h2 class="text-xl font-semibold">Your Items</h2>
    <ul class="mt-4 h-48 overflow-y-auto"> <!-- Added fixed height and scroll behavior -->
        @foreach ($items as $item)
            <li class="mb-3">
                <a href="{{ route('item.show', $item->item_id) }}" class="text-blue-500">{{ $item->name }}</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('item.upload') }}" class="text-center mt-auto inline-block px-4 py-2 bg-green-500 text-white rounded-md">Add Item</a>
</div>


        <!-- Chats Section -->
        <div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold">Your Chats</h2>
    <ul class="mt-4 h-48 overflow-y-auto">  <!-- Added fixed height and scroll behavior -->
    @foreach ($chats as $receiverId => $chatGroup)
        <li class="mb-3">
            <a href="{{ route('chat.index', $receiverId) }}" class="text-blue-500">
                Chat with {{ $chatGroup->first()->receiver->name }}
            </a>
        </li>
        @endforeach
    </ul>
</div>

    </div>
</div>
@endsection