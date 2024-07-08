<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @foreach ($blogPosts as $post)
        <article class='py-8 max-w-screen-md border-b border-grey-300'>
            <h2 class="mb-2 tracking-tight font-bold text-gray-900 text-3xl">{{ $post['title'] }}</h2>
            <div class="text-base text-gray-500">
                <a href="/authors/{{ $post->author->id }}" class="hover:underline">{{ $post->author->name }}</a> |
                {{ $post->created_at->format('d M Y') }} // name dapat diambil karna sudah melakukan relation
            </div>
            <p class="my-4 font-light">{{ $post['body'] }}</p>
            <p class="my-4 font-light">{{ Str::limit($post['body'], 20) }}</p> {{-- Mengubah maksimal karakter menjadi 20 huruf --}}
            <a href="/postDetail/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read More
                &raquo;</a>
        </article> 
    @endforeach
</x-layout>
