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
            <h1 class="text-3xl font-extrabold text-green-600">Sign Up ✨</h1>
            <p class="text-gray-500 mt-1">Create your account below</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input 
                    id="name" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm" />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="username"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input 
                    id="password_confirmation" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm" />
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full !bg-green-500 hover:bg-green-600 text-white font-semibold py-2.5 rounded-lg mt-6 transition duration-200 shadow-md hover:shadow-lg"
            >
                Register
            </button>

            <!-- Already Registered -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-green-600 font-medium hover:underline">Log In</a>
            </p>
        </form>
    </div>
</div>

@endsection
