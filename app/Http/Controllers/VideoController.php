<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Media;
use App\Category;

class VideoController extends Controller
{
    public static function categoryMedia($id)
    {
        if (session('profile')==='kids') {
            return Media::where([['category_id',$id],['forchildren', 1]])->get();
        }
        elseif (session('profile')==='default') {
            return Media::whereIn('category_id',[$id])->get();
        }
    }

    public function index()
    {
        return view('videopage', ['media' => Media::all(),'categories' => Category::orderBy('name')->get()]);
    }
    public function search(Request $request)
    {
        $query = Media::query();

        $search = $request->input('q');
        if ($query) {
            $query->where("name", "like", "%" . $search . "%");
        }

        return $query->get()->toJson();
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
