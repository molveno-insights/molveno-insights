<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Media;
use App\Category;
use App\Guest;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $roomNumber = $request->cookie('roomnumber', null);



        if ($roomNumber) {
            $currentGuest = Guest::findGuestByRoomNumber($roomNumber);
        }else{
            $currentGuest = '';
        }

       
        return view('welcome', ['media' => Media::all(),'roomNumber' => $roomNumber, 'currentGuest' => $currentGuest]);
    }

    public function show($id)
    {
        return view('welcome', ['media' => Media::findOrFail($id)]);
    }

    public function profile(Request $request) 
    {
        session(['profile' => $request->input('profile')]);
        return redirect('index/');
    }
}
