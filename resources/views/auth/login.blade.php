@extends('public-layouts.app')

@section('content')
<div class="min-h-screen bg-green-50 flex flex-col items-center justify-center">
    <!-- Logo -->
    <div class="mb-8">
        <img src="{{ asset('images/logo.png') }}" alt="Loopgoods Logo" class="h-20">
    </div>

    <!-- Login Card -->
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h1 class="text-2xl font-bold text-green-600 text-center mb-6">WELCOME!</h1>
        <p class="text-center text-gray-600 mb-4">Please enter your details</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    autocomplete="username"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <div class="relative">
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                    />
                    <div id="togglePassword" class="absolute inset-y-0 right-0 flex items-center px-3 cursor-pointer">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.857 3.06-4.648 7-9.542 7-4.477 0-8.268-3.94-9.542-7z" />
                        </svg>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full !bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">
                Log In
            </button>

            <!-- Sign Up -->
            <p class="text-center text-gray-600 mt-4">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-green-500 font-semibold hover:underline">Sign Up</a>
            </p>
        </form>
    </div>
</div>

<!-- JavaScript Section -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            eyeIcon.classList.toggle('text-green-500');
        });

        // Custom validation messages
        const form = document.getElementById('loginForm');
        const email = document.getElementById('email');
        const password = document.getElementById('password');

        email.addEventListener('invalid', function () {
            if (!email.value) {
                email.setCustomValidity('Please input email address');
            } else {
                email.setCustomValidity('Please input a valid email address');
            }
        });

        email.addEventListener('input', function () {
            email.setCustomValidity('');
        });

        password.addEventListener('invalid', function () {
            if (!password.value) {
                password.setCustomValidity('Please input password');
            }
        });

        password.addEventListener('input', function () {
            password.setCustomValidity('');
        });
    });
</script>
@endsection
