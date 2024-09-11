<?php

namespace App\Http\Controllers;

use App\Models\Carreer;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 5)
            ->latest('id')
            ->paginate(8);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        $similares = Post::where('category_id', $post->category_id)
            ->where('status', 5)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(4)
            ->get();

        return view('posts.show', compact('post', 'similares'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
            ->where('status', 5)
            ->latest('id')
            ->paginate(8);

        // return $category;
        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()
            ->where('status', 5)
            ->latest('id')
            ->paginate(8);

        return view('posts.tag', compact('posts', 'tag'));
    }

    public function carreer(Carreer $carreer)
    {
        $posts = $carreer->posts()
            ->where('status', 5)
            ->latest('id')
            ->paginate(8);

        return view('posts.carreer', compact('posts', 'carreer'));
    }
}
