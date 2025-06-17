@extends('public-layouts.app')

@section('content')
<div class="container mx-auto py-10 px-4">
    <!-- Contact Us Section -->
    <div class="bg-white px-8 py-8 rounded-lg shadow-md max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-center text-[#4EB57C] mb-6">Contact Us</h1>
        
        <div class="text-gray-700 text-lg leading-relaxed space-y-4 mb-8">
            <p>We would love to hear from you!</p>
            <p>Whether you have questions, suggestions, or simply want to say hello, feel free to contact us.</p>
            <p>Our team is always ready to assist you with any inquiries about <strong>LoopGoods</strong>, provide support, or hear your valuable feedback to help us grow better.</p>
            <p>Reach us through the following contact options:</p>
        </div>

        <div class="text-gray-700 text-lg leading-relaxed space-y-4 mb-8">
            <p><strong>Email:</strong> 
                <a href="mailto:support@loopgoods.com" class="text-blue-500 hover:underline">support@loopgoods.com</a>
            </p>
            <p><strong>Phone:</strong> 
                <a href="tel:+6285817587504" class="text-blue-500 hover:underline">+62 858-1758-7504</a>
            </p>
            <p><strong>Address:</strong> 
                IPB Vocational School, Jl. Kumbang No.14, Babakan, Bogor, West Java.
            </p>
            <p><strong>Work Hours:</strong> 
                Monday to Friday: 9:00 AM - 5:00 PM
            </p>
        </div>

        <!-- Google Maps Embed -->
        <div>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253844.17099306543!2d106.71787857416726!3d-6.600787699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d7b13b4a27%3A0x4c164a491091696e!2sSekolah%20Vokasi%20IPB!5e0!3m2!1sen!2sid!4v1715077794885!5m2!1sen!2sid" 
                width="100%" 
                height="300" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </div>
</div>
@endsection
