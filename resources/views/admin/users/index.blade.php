@extends('public-layouts.app')

@section('content')
<div class="container mx-auto py-10 px-4">
    <h1 class="text-4xl font-bold mb-6 text-[#4EB57C]">User Management</h1>
    <a href="{{ route('users.create') }}" class="bg-[#4EB57C] text-white px-4 py-2 rounded-lg hover:bg-[#357a5c]">Add User</a>
    <table class="table-auto w-full mt-6">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">{{ $user->role }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('users.edit', $user) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?');" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
