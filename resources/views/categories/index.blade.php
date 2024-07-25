@extends('layouts.main')
@section('content')
<main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all z-41 duration-200">
    <div class="w-full px-6 py-6 mx-auto">
        <!-- Articles Table -->
        <div class="flex flex-col bg-white shadow-soft-xl rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold">Categories List</h2>
                <a href="{{ route('categories.create') }}" class="inline-block px-6 py-3 text-white bg-sky-600 hover:bg-blue-700 rounded-lg shadow-md font-semibold transition-colors duration-300">
                    Tambah Kategori
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
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-800 tracking-wider">Slug</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-800 tracking-wider">Color</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-800 tracking-wider">Created</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $category->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $category->slug }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $category->color }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $category->created_at->diffForHumans() }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm">
                                    <a href="/categories/{{ $category->slug }}" class="text-blue-600 hover:text-blue-800">View</a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="text-green-600 hover:text-green-800 ml-2">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
                {{ $categories->links() }}
            </div>
        </div>
    </div>
    <!-- end cards -->
</main>
@endsection
