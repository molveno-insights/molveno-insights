<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Media;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $mediaList = [];
        $query = Media::query();

        $search = $request->input('search');
        if ($query) {
            $query->where("name", "like", "%" . $search . "%");
        }

        $mediaList = $query->paginate(3);

        // $users = DB::table('Media')->paginate(3);

        // return view('user.index', ['users' => $users]);


        return view('media.index', ['mediaList' => $mediaList]);
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
        $request->validate([
            'name' => 'required|max:255',
            'url' => 'required|max:15',
        ]);

        $media = new Media();
        $media->name = $request->input('name');
        $media->category = $request->input('category');
        $media->added_by = $request->input('added_by');
        $media->url = $request->input('url');
        $media->forchildren = (bool) $request->input('forchildren', 0);

        if ($media->save()) {
            return redirect()->route('media.index');
        } else {
            var_dump("Failed to save!");
        }
    }

    public function edit(Media $media)
    {
        return view('media.edit', ['media' => $media]);
    }

    public function update(Request $request, Media $media)
    {
        $request->validate([
            'name' => 'required|max:255',
            'url' => 'required|max:15',
        ]);

        $media->name = $request->input('name');
        $media->category = $request->input('category');
        $media->added_by = $request->input('added_by');
        $media->url = $request->input('url');
        $media->forchildren = (bool) $request->input('forchildren', 0);

        if ($media->save()) {
            return redirect()->route('media.index');
        } else {
            echo "Failed to save!";
        }
    }
    public function delete(Media $media)
    {
        if ($media->delete()) {
            return redirect()->route('media.index');
        } else {
            echo "Failed to delete media item!";
        }
    }
}
