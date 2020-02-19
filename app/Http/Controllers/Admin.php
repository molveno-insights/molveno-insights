<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admin extends Controller
{
    public function show()
    {
        return view('layout.adminbase');
    }
}
