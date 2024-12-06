@extends('public-layouts.app')

@section('content')
<div class="bg-gray-100 py-10">
    <div class="bg-white px-8 py-8 rounded-lg shadow-md max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">Contact Us</h1>
        
        <p class="text-gray-700 text-lg leading-relaxed mb-6">
            We'd love to hear from you! Please fill out the form below or reach out to us using the provided contact details.
        </p>

        <!-- Contact Form -->
        <form action="#" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Your Message</label>
                <textarea id="message" name="message" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                Send Message
            </button>
        </form>

        <!-- Contact Info -->
        <div class="mt-10 text-center text-gray-600">
            <p>Email: support@example.com</p>
            <p>Phone: +1 (123) 456-7890</p>
            <p>Address: 123 Main Street, City, Country</p>
        </div>
    </div>
</div>
@endsection