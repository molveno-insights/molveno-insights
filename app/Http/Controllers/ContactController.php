<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Media;
use App\Category;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contactList = [];
        $contactList = Contact::all();

        return view('contact.index', ['contactList' => $contactList]);
    }

    public function show(Contact $contact)
    {
        return view('contact.show', ['contact' => $contact]);
    }

    public function insert(Request $request)
    {
        $roomNumber = $request->cookie('roomnumber', null);

        if ($roomNumber) {
            $currentGuest = \App\Guest::findGuestByRoomNumber($roomNumber);
        }

        if ($request->get('type') === "complaint") {
            $contact = new Contact();
            $contact->topic = 'complaint';
            $contact->text = $request->input('complaintinput');
            $contact->guest()->associate($currentGuest);
            if ($contact->save()) {
                return redirect()->route('videopage')->with('message','<i class="fas fa-info-circle"></i> We have received your complaint correctly!');
                var_dump("Thanks for sending us feedback!");
            } else {
                var_dump("Failed to send!");
            }
            // return $request->get('form');
        } else if ($request->get('type') === 'suggest-video') {
            $contact = new Contact();
            $contact->topic = 'videosuggestion';
            $contact->text = $request->input('suggestvideoinput');
            $contact->guest()->associate($currentGuest);
            if ($contact->save()) {
                return redirect()->route('videopage')->with('message','<i class="fas fa-info-circle"></i> We have received your videosuggestion correctly!');;
                var_dump("Thanks for sending us feedback!");
            } else {
                var_dump("Failed to send!");
            }
        } else if ($request->get('type') === 'roomservice') {
            $contact = new Contact();
            $contact->topic = 'roomservice';
            $contact->text = $request->input('roomserviceinput');
            $contact->guest()->associate($currentGuest);
            if ($contact->save()) {
                return redirect()->route('videopage')->with('message','<i class="fas fa-info-circle"></i> We have received your request for roomservice correctly!');;
                var_dump("Thanks for sending us feedback!");
            } else {
                var_dump("Failed to send!");
            }
        } else if ($request->get('type') === 'feedback') {
            $contact = new Contact();
            $contact->topic = 'feedback';
            $contact->text = $request->input('feedbackinput');
            $contact->guest()->associate($currentGuest);
            if ($contact->save()) {
                return redirect()->route('videopage')->with('message','<i class="fas fa-info-circle"></i> We have received your feedback correctly!');;
                var_dump("Thanks for sending us feedback!");
            } else {
                var_dump("Failed to send!");
            }
        }

    }

    public function delete(Contact $contact)
    {
        if ($contact->delete()) {
            return redirect()->route('media.index');
        } else {
            echo "Failed to delete media item!";
        }
    }

}
