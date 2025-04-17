@extends('public-layouts.app')

@section('title', 'Home Page')

@section('content')

<!-- Hero Banner Section -->
<section class="relative">
    <img src="{{ asset('images/hero-banner.jpeg') }}" alt="Hero Banner" class="w-full h-[500px] object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center text-white text-center">
        <h1 class="text-5xl font-bold mb-4 text-[#4EB57C]">Discover Affordable Pre-Loved Goods for Students</h1>
        <p class="text-xl mb-6 text-green-400">Empowering students to find quality items while promoting eco-friendly practices.</p>
        <a href="#" class="bg-[#4EB57C] text-white px-8 py-4 rounded-lg hover:bg-[#357a5c] transition">Learn More</a>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-[#EAF8EF]">
    <div class="container mx-auto text-center">
    <img src="/images/logo.png" alt="LoopGoods Logo" class="mx-auto mb-6 w-20 min-h-[150px] min-w-[150px]">

        <h2 class="text-3xl font-bold mb-4 text-[#4EB57C]">Find Items, Connect, and Save Sustainably!</h2>
        <p class="text-lg text-gray-700">Your go-to platform for affordable, eco-friendly goods.</p>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-2 text-[#4EB57C]">Find Items Near You</h3>
                <p class="text-gray-600">Easily browse for items in your area.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-2 text-[#4EB57C]">Quick Pickups</h3>
                <p class="text-gray-600">Connect with uploaders for fast and easy exchanges.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-2 text-[#4EB57C]">Save Money Sustainably</h3>
                <p class="text-gray-600">Support eco-friendly practices while staying within budget.</p>
            </div>
        </div>
    </div>
</section>

<!-- How to Use Section -->
<section class="relative">
    <img src="/images/how-to.jpg" alt="How To Use Banner" class="w-full h-[400px] object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center text-white text-center">
        <h2 class="text-4xl font-bold mb-4 text-[#4EB57C]">How to Use LoopGoods?</h2>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto text-center">
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-6">
                <img src="{{ asset('images/how-to-step1.png') }}" alt="Step 1" class="w-24 h-24 mx-auto mb-4 bg-[#4EB57C] p-4 rounded-full">
                <h3 class="text-xl font-semibold mb-2 text-[#4EB57C]">Step 1</h3>
                <p>Find any item that you would like to claim.</p>
            </div>
            <div class="p-6">
                <img src="{{ asset('images/how-to-step2.png') }}" alt="Step 2" class="w-24 h-24 mx-auto mb-4 bg-[#4EB57C] p-4 rounded-full">
                <h3 class="text-xl font-semibold mb-2 text-[#4EB57C]">Step 2</h3>
                <p>Click the request button for the item that you like.</p>
            </div>
            <div class="p-6">
                <img src="{{ asset('images/how-to-step3.png') }}" alt="Step 3" class="w-24 h-24 mx-auto mb-4 bg-[#4EB57C] p-4 rounded-full">
                <h3 class="text-xl font-semibold mb-2 text-[#4EB57C]">Step 3</h3>
                <p>Get the item after the uploader accepts your request.</p>
            </div>
        </div>
    </div>
</section>

<!-- Product Display Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-6 text-[#4EB57C]">Nearest Items from Your Location</h2>
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            @foreach ($items as $item)
                <div class="bg-white text-black p-6 rounded-lg shadow-lg hover:scale-105 transform transition">
                    <img src="{{ asset('storage/' . str_replace('public/', '', $item->image_path)) }}" alt="Product" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold text-[#4EB57C]">{{ $item->name }}</h3>
                    <p class="text-lg font-bold text-[#4EB57C]">{{ $item->location }}</p>
                    <a href="{{ route('item.show', $item->item_id) }}" class="mt-4 inline-block px-6 py-2 bg-[#FF2D20] text-white rounded-full">Details</a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
