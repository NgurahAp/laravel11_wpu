<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <article class='py-8 max-w-screen-md border-b border-grey-300'>
        <h2 class="mb-2 tracking-tight font-bold text-gray-900 text-3xl">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="/authors/{{ $post->author->id }}">{{ $post->author->name }}</a> | {{ $post->created_at->format('d M Y') }}
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to post</a>
    </article>
</x-layout>