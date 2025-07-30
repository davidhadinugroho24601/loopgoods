@extends('public-layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <div class="bg-white text-black p-6 rounded-lg shadow-lg transform transition max-w-2xl mx-auto">

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Gallery -->
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

            <!-- Prev -->
            <button class="absolute top-1/2 left-2 -translate-y-1/2 bg-white p-2 rounded-full shadow"
                @click="current = (current === 0) ? {{ $item->gallery->count() - 1 }} : current - 1">‹
            </button>

            <!-- Next -->
            <button class="absolute top-1/2 right-2 -translate-y-1/2 bg-white p-2 rounded-full shadow"
                @click="current = (current === {{ $item->gallery->count() - 1 }}) ? 0 : current + 1">›
            </button>
        </div>

        <!-- Info -->
        <h1 class="text-3xl font-bold mb-4 text-[#4EB57C]">{{ $item->name }}</h1>
        <p class="text-lg font-semibold text-[#4EB57C] mb-2">Provider: {{ $item->user->name }}</p>
        <p class="text-lg font-semibold text-[#4EB57C] mb-2">Address: {{ $item->address }}</p>
        <p class="text-lg font-semibold text-[#4EB57C] mb-4">Available Stock: {{ $item->stock }}</p>
        <p class="text-gray-700 mb-6">
            <span class="font-semibold">Description:</span> {{ $item->description }}
        </p>

        <!-- Map -->
        <div id="map" class="w-full h-64 rounded-md mb-6 shadow-md"></div>

        <!-- Contact Owner -->
        <a href="{{ route('chat.new', ['receiverId' => $item->user_id, 'itemId' => $item->id]) }}" 
            class="mt-4 inline-block px-6 py-3 bg-[#4EB57C] text-white rounded-lg hover:bg-[#3A9E6F] transition">
            Contact Owner
        </a>

        <!-- Previous Requests by Auth User -->
        @php
            $pastRequests = \App\Models\Request::where('sender_id', auth()->id())
                            ->where('item_id', $item->id)
                            ->orderBy('created_at', 'desc')
                            ->get();
        @endphp

        @if ($pastRequests->count() > 0)
            <div class="mt-6 bg-green-50 border border-green-300 p-4 rounded-lg">
                <h2 class="text-green-700 font-semibold mb-2">Your Previous Requests:</h2>
                <ul class="list-disc pl-5 text-green-800 text-sm">
                    @foreach ($pastRequests as $req)
                        <li>
                            {{ $req->created_at->format('M d, Y H:i') }} — 
                            Quantity: <strong>{{ $req->quantity }}</strong>, 
                            Status: <strong>{{ ucfirst($req->status) }}</strong>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Make New Request -->
        <div class="mt-6" x-data="{ open: false }">
            <a href="javascript:void(0)" 
               @click="open = !open"
               class="inline-block px-6 py-3 bg-[#29B6F6] text-white rounded-lg hover:bg-[#199fd9] transition">
                Make a Request
            </a>

            <div x-show="open" x-transition class="mt-4 space-y-4 bg-white p-4 border rounded-lg shadow">
                <form action="{{ route('request.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <input type="hidden" name="sender_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="recipient_id" value="{{ $item->user_id }}">
                    <input type="hidden" name="item_id" value="{{ $item->id }}">

                    <div>
                        <label class="block text-gray-700 mb-1">Quantity</label>
                        <input type="number" name="quantity" min="1" required 
                               class="w-full border rounded-lg p-2" placeholder="Enter quantity">
                    </div>

                    <div>
                        <button type="submit" 
                                class="w-full px-6 py-2 !bg-[#4EB57C] text-white rounded-lg hover:!bg-[#3A9E6F] transition">
                            Submit Request
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Map Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([{{ $item->latitude }}, {{ $item->longitude }}], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        L.marker([{{ $item->latitude }}, {{ $item->longitude }}])
            .addTo(map)
            .bindPopup("<strong>{{ $item->name }}</strong><br>{{ $item->address }}")
            .openPopup();
    });
</script>
@endsection
