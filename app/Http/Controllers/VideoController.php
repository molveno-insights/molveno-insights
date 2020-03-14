<?php

namespace App\Http\Controllers;
use App\Media;
use App\Category;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return view('videopage', ['media' => \App\Media::all()]);
    }
    // public function show($id)
    // {
    //     return view('welcome', ['media' => \App\Media::findOrFail($id)]);
    // }

}
