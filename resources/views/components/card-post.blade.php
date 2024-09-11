@props(['post'])
<article
    class="mb-12 bg-white shadow-lg rounded-lg overflow-hidden"
>
    @if ($post->image)
        <img
            class="w-full h-80 object-cover object-center"
            src="{{Storage::url($post->image->url)}}"
            alt=""
        >
    @else
        <img
            class="w-full h-80 object-cover object-center"
            src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg"
            alt=""
        >
    @endif

    <div
        class="px-6 py-4"
    >
        <h1
            class="font-bold text-xl mb-2"
        >
            <a
                href="{{route('posts.show', $post)}}"
            >
                {{$post->name}}
            </a>
        </h1>

        <div
            class="px-6 pt-4 pb-2"
        >
            @foreach ($post->tags as $tag)
                <a
                    href="{{route('posts.tag', $tag)}}"
                    class="inline-block px-3 h-6 text-white rounded-full"
                    style="background-color: {{$tag->color}}"
                >
                    {{$tag->name}}
                </a>
            @endforeach
        </div>
    </div>
</article>