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
        if ($request->get('type') === "complaint") {
            $contact = new Contact();
            $contact->topic = 'complaint';
            $contact->text = $request->input('complaintinput');
            if ($contact->save()) {
                return redirect()->route('videopage');
                var_dump("Thanks for sending us feedback!");
            } else {
                var_dump("Failed to send!");
            }
            // return $request->get('form');
        } else if ($request->get('type') === 'suggest-video') {
            $contact = new Contact();
            $contact->topic = 'videosuggestion';
            $contact->text = $request->input('suggestvideoinput');
            if ($contact->save()) {
                return redirect()->route('videopage');
                var_dump("Thanks for sending us feedback!");
            } else {
                var_dump("Failed to send!");
            }
        } else if ($request->get('type') === 'roomservice') {
            $contact = new Contact();
            $contact->topic = 'roomservice';
            $contact->text = $request->input('roomserviceinput');
            if ($contact->save()) {
                return redirect()->route('videopage');
                var_dump("Thanks for sending us feedback!");
            } else {
                var_dump("Failed to send!");
            }
        } else if ($request->get('type') === 'feedback') {
            $contact = new Contact();
            $contact->topic = 'feedback';
            $contact->text = $request->input('feedbackinput');
            if ($contact->save()) {
                return redirect()->route('videopage');
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
