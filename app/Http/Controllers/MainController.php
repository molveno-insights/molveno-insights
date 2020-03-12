<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Media;
use App\Category;

class MainController extends Controller
{
    public function index()
    {
        $sportMedia = Category::where('name', 'sport')->first()->media()->get();
        return view('welcome', ['media' => \App\Media::all(), 'sportMedia' => $sportMedia]);
    }

    public function show($id)
    {
        return view('welcome', ['media' => \App\Media::findOrFail($id)]);
    }

    public function like(Media $media)
    {
        $media->like();
    }

    public function dislike(Media $media)
    {
        $media->dislike();
    }
}
