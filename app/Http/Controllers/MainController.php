<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Media;
use App\Category;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome', ['media' => \App\Media::all()]);
    }

    public function show($id)
    {
        return view('welcome', ['media' => \App\Media::findOrFail($id)]);
    }

    public function profile(Request $request) 
    {
        session(['profile' => $request->input('profile')]);
        return redirect('index/');
    }
}
