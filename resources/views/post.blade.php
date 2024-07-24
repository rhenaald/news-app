<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue">
                <header class="mb-4 lg:mb-6 not-format">
                    
                    <!-- Gambar Artikel -->
                    <img src="#" alt="{{ $post->title }}" class="w-full h-72 object-cover rounded-lg mb-4 shadow">

                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                            <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->author->id }}">
                            <div>
                                <a href="/authors/{{ $post->author->id }}" rel="author" class="text-xl font-bold text-gray-900">{{ $post->author->name }}</a>
                                <p class="text-base text-gray-500 mb-1">{{ $post->created_at->diffForHumans() }}</p>
                                <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                                    <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                                </span>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">{{ $post->title }}</h1>
                </header>
                <p>{{ $post->body }}</p>
                <a href="/" class="font-medium text-xs text-blue-500 hover:underline">&laquo; Kembali ke beranda</a>
            </article>
        </div>
    </main>
</x-layout>
