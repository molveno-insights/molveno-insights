<?php

namespace App\Http\Controllers;
use App\Media;
use App\Category;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public static function categoryMedia($id)
    {
        return Media::whereIn('category_id',[$id])->get();

        
    }

    public function index()
    {
        return view('videopage', ['media' => Media::all(),'categories' => Category::all()]);
    }
    // public function show($id)
    // {
    //     return view('welcome', ['media' => \App\Media::findOrFail($id)]);
    // }
    

}
