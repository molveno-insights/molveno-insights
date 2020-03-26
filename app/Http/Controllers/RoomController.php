<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Guest;

class RoomController extends Controller
{
    public function chooseroom()
    {
        return view('room.setroom');
    }

    public function setroom(Request $request)
    {
        $rooms = Guest::find($request->input('roomnumber'));

        if (!$rooms) {
            echo "Category not valid!";
            exit;
        }

        $setroom = new Room();
        $setroom->roomnumber()->associate($rooms);

        if ($setroom->save()) {
            return redirect()->route('room.setroom');
        } else {
            var_dump("Failed to save!");
        }
    }
}
