<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\Guest;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $currentGuest = null;
        $roomNumber = $request->cookie('roomnumber', null);

        if (!$roomNumber) {
            return redirect()->route('room.setroom')->with('message', 'Roomnumber is not set');
        }

        if ($roomNumber) {
            $currentGuest = Guest::findGuestByRoomNumber($roomNumber);
        }

        return view(
            'welcome',
            [
                'media' => Media::all(),
                'currentGuest' => $currentGuest
            ]
        );
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
