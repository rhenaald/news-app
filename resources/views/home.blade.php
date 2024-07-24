<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <h2 class="mb-1 text-4xl tracking-tight font-bold text-sky-500">{{ $sub_judul ?? "" }}</h2>
    
    <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-0">
        <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2">
            @foreach ($posts as $post)
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md">
    <!-- Gambar -->
    <img src="#" class="w-full h-48 object-cover rounded-t-lg mb-4">

    <!-- Kategori dan Tanggal -->
    <div class="flex justify-between items-center mb-5 text-gray-500">
        <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
            <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </span>
        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
    </div>

    <!-- Judul -->
    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 hover:underline">
        <a href="/posts/{{ $post['slug'] }}">{{ $post['title'] }}</a>
    </h2>

    <!-- Deskripsi -->
    <p class="mb-5 font-light text-gray-500">{{ Str::limit($post['body'], 150) }}</p>

    <!-- Penulis dan Link -->
    <div class="flex justify-between items-center">
        <a href="/authors/{{ $post->author->id }}">
            <div class="flex items-center space-x-4">
                <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="{{ $post->author->id }}" />
                <span class="font-medium text-xs hover:underline">
                    {{ $post->author->name }}
                </span>
            </div>
        </a>
        <a href="/posts/{{ $post['slug'] }}" class="inline-flex items-center text-blue-500 font-medium text-primary-600 hover:underline">
            Read More &raquo;
            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</article>

            @endforeach              
        </div>  
    </div>
</x-layout>
