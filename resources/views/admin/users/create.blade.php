@extends('public-layouts.app')

@section('content')
<div class="container mx-auto py-10 px-4">
    <h1 class="text-4xl font-bold mb-6 text-[#4EB57C]">Add New User</h1>
    <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
    <label for="name" class="block font-medium">Name</label>
    <input type="text" id="name" name="name" class="w-full border border-gray-300 p-2 rounded-md" required>
</div>
<div>
    <label for="email" class="block font-medium">Email</label>
    <input type="email" id="email" name="email" class="w-full border border-gray-300 p-2 rounded-md" required>
</div>
<div>
    <label for="password" class="block font-medium">Password</label>
    <input type="password" id="password" name="password" class="w-full border border-gray-300 p-2 rounded-md" required>
</div>
<div>
    <label for="password_confirmation" class="block font-medium">Confirm Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border border-gray-300 p-2 rounded-md" required>
</div>
<div>
    <label for="role" class="block font-medium">Role</label>
    <select id="role" name="role" class="w-full border border-gray-300 p-2 rounded-md" required>
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
</div>

        <button type="submit" style="background-color: #4EB57C;" class="bg-[#4EB57C] text-white px-4 py-2 rounded-lg hover:bg-[#357a5c]">Create User</button>
    </form>
</div>
@endsection
