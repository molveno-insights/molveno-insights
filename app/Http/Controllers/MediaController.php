<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        return view('welcome', ['media' => \App\Media::all()]);
    }

    public function show(Media $media)
    {
        return view('media.show', ['media' => $media]);
    }

    public function create()
    {
        return view('media.create');
    }

    public function insert(Request $request)
    {
        $media = new Media();
        $media->name = $request->input('name');
        $media->date = $request->input('date');
        $media->category = $request->input('category');
        $media->added_by = $request->input('added_by');
        $media->type = $request->input('type');
        $media->forchildren = $request->input('forchildren');
        
        if ($media->save()) {
            return redirect()->route('media.index');
        } else {
            var_dump("niet opgeslagen");
        }
    }

    public function edit(Media $media)
    {
        return view('media.edit', ['media' => $media]);
    }

    public function update(Request $request, Media $media)
    {
        $media->name = $request->input('name');
        $media->date = $request->input('date');
        $media->category = $request->input('category');
        $media->added_by = $request->input('added_by');
        $media->type = $request->input('type');
        $media->forchildren = $request->input('forchildren');

        if ($media->save()) {
            echo "opgeslagen";
        } else {
            echo "niet opgeslagen";
        }
    }
    public function delete(Media $media)
    {
        if ($media->delete()) {
            return redirect()->route('media.index');
        } else {
            echo "failed to delete media item";
        }
    }

}
