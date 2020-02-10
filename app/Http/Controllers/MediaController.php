<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function show($id)
    {
        return view('media', ['media' => \App\Media::findOrFail($id)]);
    }
}
