@extends('public-layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <!-- Item Detail Card -->
    <div class="bg-white text-black p-6 rounded-lg shadow-lg hover:scale-105 transform transition max-w-2xl mx-auto">
    <div class="relative w-full h-64 overflow-hidden rounded-md mb-4" x-data="{ current: 0 }">
    <div class="flex transition-all duration-500" :style="'transform: translateX(-' + (current * 100) + '%)'">
        @foreach ($item->gallery as $gallery)
            <img 
                src="{{ asset('storage/' . str_replace('public/', '', $gallery->image)) }}" 
                alt="{{ $item->name }}" 
                class="w-full h-64 object-cover flex-shrink-0"
            >
        @endforeach
    </div>

    <!-- Prev Button -->
    <button 
        class="absolute top-1/2 left-2 -translate-y-1/2 bg-white p-2 rounded-full shadow" 
        @click="current = (current === 0) ? {{ $item->gallery->count() - 1 }} : current - 1"
    >
        ‹
    </button>

    <!-- Next Button -->
    <button 
        class="absolute top-1/2 right-2 -translate-y-1/2 bg-white p-2 rounded-full shadow" 
        @click="current = (current === {{ $item->gallery->count() - 1 }}) ? 0 : current + 1"
    >
        ›
    </button>
</div>


        <!-- Item Name -->
        <h1 class="text-3xl font-bold mb-4 text-[#4EB57C]">{{ $item->name }}</h1>

        <!-- Availability -->
        <p class="text-lg font-semibold text-[#4EB57C] mb-4">Location: {{ $item->location }}</p>

        <!-- Description -->
        <p class="text-gray-700 mb-6">
            <span class="font-semibold">Description:</span> {{ $item->description }}
        </p>

        <!-- Map Container -->
        <div id="map" class="w-full h-64 rounded-md mb-6 shadow-md"></div>

        <!-- Contact Button -->
        <a href="{{ route('chat.index', $item->user_id) }}" 
           class="mt-4 inline-block px-6 py-3 bg-[#4EB57C] text-white rounded-lg hover:bg-[#357a5c] transition">
           Contact Seller
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the map
        var map = L.map('map').setView([{{ $item->latitude }}, {{ $item->longitude }}], 13);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a marker to the map
        L.marker([{{ $item->latitude }}, {{ $item->longitude }}])
            .addTo(map)
            .bindPopup("<strong>{{ $item->name }}</strong><br>{{ $item->location }}")
            .openPopup();
    });
</script>
@endsection
