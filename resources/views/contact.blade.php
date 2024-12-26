@extends('public-layouts.app')

@section('content')
<div class="container mx-auto py-10 px-4">
    <!-- Contact Us Section -->
    <div class="bg-white px-8 py-8 rounded-lg shadow-md max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-center text-[#4EB57C] mb-6">Contact Us</h1>
        
        <p class="text-gray-700 text-lg leading-relaxed mb-6">
            We would love to hear from you! Whether you have questions, feedback, or need assistance, feel free to reach out to us through any of the following ways:
        </p>

        <div class="text-gray-700 text-lg leading-relaxed space-y-4">
            <p>
                <strong>Email:</strong> 
                <a href="mailto:support@example.com" class="text-blue-500 hover:underline">support@example.com</a>
            </p>
            <p>
                <strong>Phone:</strong> 
                <a href="tel:+11234567890" class="text-blue-500 hover:underline">+1 (123) 456-7890</a>
            </p>
            <p>
                <strong>Address:</strong> 
                123 Main Street, City, Country
            </p>
            <p>
                <strong>Business Hours:</strong> 
                Monday to Friday: 9:00 AM - 5:00 PM
            </p>
        </div>
    </div>
</div>
@endsection
