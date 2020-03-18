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
    public function like(Media $media)
    {
        $media->like();
    }

    public function dislike(Media $media)
    {
        $media->dislike();
    }
    
    public function view(Media $media)
    {
        $media->view();
    }

}
