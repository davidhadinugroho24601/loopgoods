@extends('public-layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-green-100 flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 space-y-6">

        <!-- Logo -->
        <div class="flex justify-center">
            <img src="{{ asset('images/logo.png') }}" alt="Loopgoods Logo" class="h-20">
        </div>

        <!-- Heading -->
        <div class="text-center">
            <h1 class="text-3xl font-extrabold text-green-600">Welcome Back 👋</h1>
            <p class="text-gray-500 mt-1">Please enter your login details below</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate class="space-y-5">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input 
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative mt-1">
                    <input 
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 pr-10"
                    />
                    <div id="togglePassword" class="absolute inset-y-0 right-0 flex items-center px-3 cursor-pointer">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 hover:text-green-500 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" />
            </div>

<!-- Submit Button -->
<button 
    type="submit" 
    class="w-full !bg-green-500 hover:bg-green-600 text-white font-semibold py-2.5 rounded-lg transition duration-200 shadow-md hover:shadow-lg mt-6"
>
    Log In
</button>


            <!-- Sign Up Link -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-green-600 font-medium hover:underline">Sign up</a>
            </p>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', () => {
            const isPassword = passwordField.type === 'password';
            passwordField.type = isPassword ? 'text' : 'password';
            eyeIcon.classList.toggle('text-green-500');
        });

        const form = document.getElementById('loginForm');
        const email = document.getElementById('email');
        const password = document.getElementById('password');

        email.addEventListener('invalid', () => {
            email.setCustomValidity(!email.value ? 'Please input email address' : 'Please input a valid email address');
        });

        email.addEventListener('input', () => email.setCustomValidity(''));
        password.addEventListener('invalid', () => password.setCustomValidity('Please input password'));
        password.addEventListener('input', () => password.setCustomValidity(''));
    });
</script>
@endsection
