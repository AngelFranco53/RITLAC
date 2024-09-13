<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => "required|unique:tags|string|max:255",
            'color' => 'required|string|max:255',
        ]);

        $tag = Tag::create($request->all());

        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'Etiqueta creada con éxito');
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => "required|unique:tags,slug,$tag->slug|string|max:255",
            'color' => 'required|string|max:255',
        ]);

        $tag->update($request->all());

        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'Etiqueta actualizada con éxito');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        
        return redirect()->route('admin.tags.index')->with('info', 'Etiqueta eliminada con éxito');
    }
}
