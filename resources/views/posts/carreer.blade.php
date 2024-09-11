<x-app-layout>
    <div
        class="container py-8"
    >
        <h1
            class="uppercase text-4xl font-bold text-gray-600 text-center"
        >
            Carreras {{$carreer->name}}
        </h1>
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4"
        >
            @foreach ($posts as $post)
                <article
                    class="w-full h-80 bg-cover bg-center @if ($loop->first) md:col-span-2 @endif"
                    style="background-image: url(@if ($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg @endif)"
                >
                    <div
                        class="w-full h-full px-8 flex flex-col justify-center"
                        style="background-color: rgba(0, 0, 0, 0.5)"
                    >
                        <div>
                            @foreach ($post->tags as $tag)
                                <a
                                    href="{{route('posts.tag', $tag)}}"
                                    class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full"
                                >
                                    {{$tag->name}}
                                </a>
                            @endforeach
                        </div>
                        <h1
                            class="text-4xl text-white leading-8"
                        >
                            <a
                                href="{{route('posts.show', $post)}}"
                            >
                                {{$post->name}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>
        <div
            class="mt-4"
        >
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>