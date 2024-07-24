@extends('layouts.main')

@section('content')

<form action="{{ route('categories.store') }}" method="POST" class="max-w-sm mx-auto mt-4 md:mt-8 lg:mt-12">
@csrf

    <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kategori</label>
        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        @error('name')
            <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-5">
    <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Warna Kategori</label>
    <select id="color" name="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <option value="" disabled selected>Pilih warna</option>
        <option value="red">Merah</option>
        <option value="blue">Biru</option>
        <option value="green">Hijau</option>
        <option value="yellow">Kuning</option>
        <option value="gray">Abu-abu</option>
        <!-- Tambahkan opsi warna lain sesuai kebutuhan -->
    </select>
    @error('color')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
    </div>


    <a href="{{ route('categories.index') }}"  class="text-white bg-sky-600 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
        Kembali</a>

    <button type="submit" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
</form>
@endsection
