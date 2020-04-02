<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Room;
use App\Guest;

class RoomController extends Controller
{
    public function chooseRoom(Request $request)
    {
        $roomNumber = $request->cookie('roomnumber', null);
        $currentGuest = null;

        if ($roomNumber) {
            $currentGuest = Guest::findGuestByRoomNumber($roomNumber);
        }

        return view(
            'room.setroom',
            ['roomNumber' => $roomNumber, 'currentGuest' => $currentGuest,'guests' => Guest::all()]
        );
    }

    public function setRoom(Request $request)
    {
        $roomNumber = $request->input('roomnumber');
        Cookie::queue('roomnumber', $roomNumber);

        return redirect()->route('room.setroom');
    }
}
