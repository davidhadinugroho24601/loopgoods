@extends('public-layouts.app')

@section('content')
<div class="container mx-auto py-10 px-4">
    <div class="bg-white px-8 py-8 rounded-lg shadow-md max-w-4xl mx-auto text-center">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="LoopGoods Logo" class="mx-auto w-32 h-32 mb-6">

        <h1 class="text-4xl font-bold text-[#4EB57C] mb-6">About LoopGoods</h1>

        <div class="text-gray-700 text-lg leading-relaxed mb-6 text-justify space-y-4 max-w-3xl mx-auto">
            <p>
                LoopGoods is a web-based platform designed to help university students share and exchange second-hand items easily and responsibly. Through this platform, students can give away items they no longer need and find useful goods offered by their peers.
            </p>
            <p>
                Our mission is to build a caring and sustainable community by encouraging the reuse of items, reducing campus waste, and promoting a sharing culture among students. With a clean and simple interface, LoopGoods ensures a fun and secure experience for all users.
            </p>
            <p>
                Thank you for being part of the LoopGoods community. Let’s create a positive impact together and keep our campus environment clean, sustainable, and supportive!
            </p>
        </div>

        <!-- Learn More Button -->
        <a href="#" class="inline-block mt-4 bg-[#4EB57C] hover:bg-[#3ea86a] text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
            Learn More
        </a>
    </div>
</div>
@endsection
