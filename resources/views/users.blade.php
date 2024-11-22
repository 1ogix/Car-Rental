@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Users</h1>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="text-left px-4 py-2 border">ID</th>
                    <th class="text-left px-4 py-2 border">Name</th>
                    <th class="text-left px-4 py-2 border">Email</th>
                    <th class="text-left px-4 py-2 border">Role</th>
                    <th class="text-left px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="px-4 py-2 border">{{ $user->id }}</td>
                        <td class="px-4 py-2 border">{{ $user->name }}</td>
                        <td class="px-4 py-2 border">{{ $user->email }}</td>
                        <td class="px-4 py-2 border">{{ $user->role }}</td>
                        <td class="px-4 py-2 border">
                            <!-- Placeholder for action buttons -->
                            <button class="bg-blue-500 text-white px-2 py-1 rounded">Edit</button>
                            <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
