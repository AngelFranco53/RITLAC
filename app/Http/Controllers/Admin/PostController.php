<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');   
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.index')->with('info', 'El post se creó con éxito');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        $post->delete();    

        return redirect()->route('admin.posts.index')->with('info', 'The post was deleted successfully');
    }
}
