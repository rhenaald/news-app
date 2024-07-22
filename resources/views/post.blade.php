<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">
            {{ $post->title }} <!-- Akses properti menggunakan -> -->
        </h2>

            <div>
                By 
                <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> 
                in
                <a href="/categories/{{ $post->category->slug }}" class="font-base text-gray-500 hover:underline">{{ $post->category->name }}</a>
                | {{$post->created_at->diffForHumans()}}
            </div>

        <p class="my-4 font-light">{{ $post->body }}</p>
        <a href="/" class="font-medium text-blue-500 hover:underline">&laquo; Kembali ke beranda</a>
    </article>
</x-layout>
