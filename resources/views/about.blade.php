@extends('public-layouts.app')

@section('content')
<div class="container mx-auto py-10 px-4">
    <!-- About Us Section -->
    <div class="bg-white px-8 py-8 rounded-lg shadow-md max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">About Us</h1>
        <p class="text-gray-700 text-lg leading-relaxed mb-6">
            Welcome to our website! We are dedicated to providing the best service and creating value for our customers. 
            Our journey began with a simple idea: to offer quality products and services that meet the needs of our community.
        </p>
        <p class="text-gray-700 text-lg leading-relaxed mb-6">
            Over the years, we have grown into a trusted name in the industry, thanks to our commitment to excellence, innovation, and customer satisfaction.
            We take pride in our dedicated team who work tirelessly to ensure your experience with us is exceptional.
        </p>
        <p class="text-gray-700 text-lg leading-relaxed">
            Thank you for choosing us. We look forward to continuing to serve you and exceed your expectations.
        </p>
    </div>

    <!-- Team Section -->
    <div class="mt-12">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Meet Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Example Team Member -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="https://via.placeholder.com/150" alt="Team Member" class="w-24 h-24 mx-auto rounded-full mb-4">
                <h3 class="text-xl font-semibold text-gray-800">John Doe</h3>
                <p class="text-gray-600 text-sm">CEO & Founder</p>
            </div>
            <!-- Add more team members as needed -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="https://via.placeholder.com/150" alt="Team Member" class="w-24 h-24 mx-auto rounded-full mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Jane Smith</h3>
                <p class="text-gray-600 text-sm">Marketing Manager</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="https://via.placeholder.com/150" alt="Team Member" class="w-24 h-24 mx-auto rounded-full mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Alice Johnson</h3>
                <p class="text-gray-600 text-sm">Lead Developer</p>
            </div>
        </div>
    </div>
</div>
@endsection
