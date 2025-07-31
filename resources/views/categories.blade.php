@extends('public-layouts.app')

@section('title', 'Home Page')

@section('content')

<!-- Hero Banner Section -->
<!-- <section class="relative">
    <img src="{{ asset('images/hero-banner.jpeg') }}" alt="Hero Banner" class="w-full h-[500px] object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center text-white text-center">
        <h1 class="text-5xl font-bold mb-4 text-[#4EB57C]">Discover Affordable Pre-Loved Goods for Students</h1>
        <p class="text-xl mb-6 text-green-400">Empowering students to find quality items while promoting eco-friendly practices.</p>
        <a href="#" class="bg-[#4EB57C] text-white px-8 py-4 rounded-lg hover:bg-[#357a5c] transition">Learn More</a>
    </div>
</section> -->

<!-- Categories Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-6 text-[#4EB57C]">Browse Categories</h2>
        <div class="mt-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            @foreach ($categories as $category)
                <a href="{{ route('category.show', ['id' => $category->id]) }}" class="block bg-[#EAF8EF] p-6 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transition">
                    <h3 class="text-xl font-semibold text-[#4EB57C]">{{ $category->name }}</h3>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Product Display Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-6 text-[#4EB57C]">All Items</h2>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('categories') }}" class="mb-8 flex justify-center">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search items..." class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-[#4EB57C]">
            <button type="submit" class="!bg-[#4EB57C] text-white px-4 py-2 rounded-r-md hover:bg-[#357a5c]">Search</button>
        </form>

        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            @forelse ($items as $item)
                <div class="bg-white text-black p-6 rounded-lg shadow-lg hover:scale-105 transform transition">
                    <img src="{{ asset('storage/' . str_replace('public/', '', $item->gallery->first()?->image))}}" alt="Product" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold text-[#4EB57C]">{{ $item->name }}</h3>
                    <p class="text-lg font-bold text-[#4EB57C]">{{ $item->location }}</p>
                    <a href="{{ route('item.show', $item->id) }}" class="mt-4 inline-block px-6 py-2 bg-[#FF2D20] text-white rounded-full">Details</a>
                </div>
            @empty
                <p class="text-gray-500 col-span-4">No items found for "{{ request('search') }}"</p>
            @endforelse
        </div>
        <br>
        <br>
        <div class="mt-10 flex justify-center">
    {{ $items->withQueryString()->links('vendor.pagination.tailwind') }}
        </div>

    </div>
</section>

@endsection
