@extends('layouts.main')

@section('content')

<form action="{{ route('users.store') }}" method="POST" class="max-w-sm mx-auto mt-4 md:mt-8 lg:mt-12" enctype="multipart/form-data">
    @csrf

    <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        @error('name')
            <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        @error('email')
            <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        @error('password')
            <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        @error('password_confirmation')
            <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="profile_photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Profil</label>
        <input type="file" id="profile_photo" name="profile_photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('profile_photo')
            <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
    </div>

    <a href="{{ route('users.index') }}" class="text-white bg-sky-600 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
        Kembali
    </a>

    <button type="submit" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
        Submit
    </button>
</form>

@endsection
