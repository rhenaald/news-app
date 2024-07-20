<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">
            {{ $post['title'] }}
        </h2>

        <div class="font-base text-gray-500">
            <a href="#">{{ $post['author'] }}</a> | 20 Juli 2024
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        <a href="/" class="font-medium text-blue-500 hover:underline">&laquo; Back to home</a>
    </article>
</x-layout>
