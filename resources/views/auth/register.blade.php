@extends('public-layouts.app')

@section('content')

<div class="min-h-screen bg-green-50 flex flex-col items-center justify-center">
    <!-- Logo -->
    <div class="mb-8">
        <img src="{{ asset('images/logo.png') }}" alt="Loopgoods Logo" class="h-20">
    </div>

    <!-- Register Card -->
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h1 class="text-2xl font-bold text-green-600 text-center mb-6">SIGN UP!</h1>
        <p class="text-center text-gray-600 mb-4">Create your account</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input 
                    id="name" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="username"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                <input 
                    id="password_confirmation" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full !bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">
                Register
            </button>

            <!-- Already Registered -->
            <p class="text-center text-gray-600 mt-4">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-green-500 font-semibold hover:underline">Log In</a>
            </p>
        </form>
    </div>
</div>

@endsection
