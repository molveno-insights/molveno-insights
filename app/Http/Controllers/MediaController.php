<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Media;
use App\Category;

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

        $mediaList = $query->paginate(10);

        return view('media.index', ['mediaList' => $mediaList]);
    }

    public function show(Media $media)
    {
        return view('media.show', ['media' => $media]);
    }

    public function create()
    {
        return view('media.create', ["categories" => Category::all()]);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'url' => 'required|max:15',
        ]);

        $category = Category::find($request->input('category'));

        if (!$category) {
            echo "Category not valid!";
            exit;
        }

        $media = new Media();
        $media->name = $request->input('name');
        $media->category()->associate($category);
        $media->added_by = Auth::user()->name;
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
        return view('media.edit', ['media' => $media, 'categories' => Category::all()]);
    }

    public function update(Request $request, Media $media)
    {
        $request->validate([
            'name' => 'required|max:255',
            'url' => 'required|max:15',
        ]);

        $media->name = $request->input('name');
        $media->category()->associate(Category::find($request->input('categorySelect')));
        $media->added_by = $request->input('added_by');
        $media->url = $request->input('url');
        $media->forchildren = (bool) $request->input('forchildren', 0);

        if ($media->save()) {
            return redirect()->route('media.index', ['media' => $media->id]);
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
