@extends('public-layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-black">
    <!-- Dashboard Header -->
    <h1 class="text-4xl font-bold mb-10 text-[#4EB57C]">Welcome to Your Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Profile Section -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
            <h2 class="text-2xl font-semibold text-[#4EB57C] mb-4">Your Profile</h2>
            <p class="text-gray-700">Name: {{ Auth::user()->name }}</p>
            <p class="text-gray-700 mb-6">Email: {{ Auth::user()->email }}</p>
            <a href="{{ route('profile.edit') }}" class="text-center mt-auto inline-block px-6 py-3 bg-[#4EB57C] text-white rounded-lg hover:bg-[#357a5c] transition">Edit Profile</a>
        </div>

        <!-- Items Section -->
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
        <h2 class="text-2xl font-semibold text-[#4EB57C] mb-4">Your Items</h2>
        <ul class="mt-4 h-48 overflow-y-auto"> <!-- Added fixed height and scroll behavior -->
            @foreach ($items as $item)
                <li class="mb-3 flex items-center justify-between">
                    <a href="{{ route('item.show', $item->item_id) }}" class="text-blue-500">{{ $item->name }}</a>
                    <div>
                        <!-- Edit Button -->
                        <a href="{{ route('item.edit', $item->item_id) }}" 
                        class="text-center inline-block px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Edit</a>

                        <!-- Delete Form -->
                        <form action="{{ route('item.destroy', $item->item_id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-center inline-block px-3 py-1 !bg-red-500 text-white rounded-md hover:bg-red-600"
                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                Delete
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('item.upload') }}" class="text-center mt-auto inline-block px-6 py-3 bg-[#4EB57C] text-white rounded-lg hover:bg-[#357a5c] transition">Add Item</a>
    </div>


        <!-- Chats Section -->
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
            <h2 class="text-2xl font-semibold text-[#4EB57C] mb-4">Your Chats</h2>
            <ul class="mt-2 h-48 overflow-y-auto text-gray-700">
                @foreach ($chats as $receiverId => $chatGroup)
                    <li class="mb-3">
                        <a href="{{ route('chat.index', $receiverId) }}" class="text-[#4EB57C] hover:underline">
                            Chat with {{ $chatGroup->first()->receiver->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
