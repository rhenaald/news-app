@extends('layouts.main')

@section('content')
<main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all z-41 duration-200">
    <div class="w-full px-6 py-6 mx-auto">
        <!-- Users Table -->
        <div class="flex flex-col bg-white shadow-soft-xl rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold">Users List</h2>
                <a href="{{ route('users.create') }}" class="inline-block px-6 py-3 text-white bg-sky-600 hover:bg-blue-700 rounded-lg shadow-md font-semibold transition-colors duration-300">
                    Add User
                </a>
            </div>
            @if (session('success'))
                <div x-data="{ show: true }"
                    x-show="show"
                    x-init="setTimeout(() => show = false, 1000)"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="bg-green-500 text-white p-4 rounded">
                    {{ session('success') }}
                </div>
            @endif
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-800 tracking-wider">Name</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-800 tracking-wider">Email</th>
                            <!-- <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-800 tracking-wider">Profile Photo</th> -->
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-800 tracking-wider">Created</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $user->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $user->email }}</td>
                                <!-- <td class="px-6 py-4 border-b border-gray-300 text-sm">
                                    @if ($user->profile_photo_path)
                                        <img src="{{ $user['profile_photo_path'] }}" alt="Profile Photo" class="w-12 h-12 rounded-full">
                                    @else
                                        <span>No Photo</span>
                                    @endif -->
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $user->created_at->diffForHumans() }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">
                                    <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-green-600 hover:text-green-800 ml-2">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
    <!-- end cards -->
</main>
@endsection
