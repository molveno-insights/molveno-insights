<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $guestList = [];
        $query = Guest::query();

        $search = $request->input('search');
        if ($query) {
            $query->where("name", "like", "%" . $search . "%");
        }

        $guestList = $query->paginate(10);

        return view('guest.index', ['guestList' => $guestList]);
    }

    public function create()
    {
        return view('guest.create');
    }

    public function insert(Request $request)
    {
        $guests = new Guest();
        $guests->roomnumber = $request->input('roomnumber');
        $guests->name = $request->input('name');
        $guests->surname = $request->input('surname');
        $guests->email = $request->input('email');
        $guests->phonenumber = $request->input('phonenumber');

        if ($guests->save()) {
            return redirect()->route('guest.index');
        } else {
            var_dump("Failed to save!");
        }
    }

    public function edit(Guest $guests)
    {
        return view('guest.edit', ['guests' => $guests]);
    }

    public function update(Request $request, Guest $guests)
    {
        $guests->roomnumber = $request->input('editroomnumber');
        $guests->name = $request->input('editname');
        $guests->surname = $request->input('editsurname');
        $guests->email = $request->input('editemail');
        $guests->phonenumber = $request->input('editphonenumber');

        if ($guests->save()) {
            return redirect()->route('guest.index', ['guest' => $guests->id]);
        } else {
            echo "Failed to save!";
        }
    }

    public function delete(Guest $guest)
    {
        if ($guest->delete()) {
            return redirect()->route('guest.index');
        } else {
            echo "Failed to delete guest item!";
        }
    }
}
