<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;

class TagsController extends Controller
{
    public function index()
    {
        return view('tags.index')->with('tags', Tag::all());
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(CreateTagRequest $request)
    {

        Tag::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Tag created successfully.');
        return redirect(route('tags.index'));
    }

    public function edit(Tag $tag)
    {
        return view('tags.create')->with('Tag', $tag);
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Tag updated successfully.');
        return redirect(route('tags.index'));
    }

    public function destroy(Tag $tag)
    {
        if($tag->post->count() > 0) {
            session()->flash('error', 'Tag cannot be deleted, because it is associated to some posts.');
            return redirect()->back();
        }

       $tag->delete();
       session()->flash('success', 'Tag deleted successfully.');
       return redirect('/tags');
    }
}
