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

            <form method="POST" action="{{ route('login') }}">
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
                        <div class="absolute inset-y-0 right-0 flex items-center px-3 cursor-pointer">
                            <!-- Add JavaScript to toggle password visibility -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.857 3.06-4.648 7-9.542 7-4.477 0-8.268-3.94-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="form-checkbox rounded text-green-600" name="remember">
                        <span class="ml-2 text-gray-600">Remember for 30 days</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-green-500 text-sm hover:underline">Forgot password?</a>
                    @endif
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
    @endsection
