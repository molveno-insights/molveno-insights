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


    public function feedback(Request $request)
    {
        $contact = new Contact();
        $contact->topic = 'feedback';
        $contact->email = null;
        $contact->roomnumber = null;
        $contact->url = null;

        $contact->text = $request->input('feedbackinput');
        if ($contact->save()) {
            return redirect()->route('videopage');
            var_dump("Thanks for sending us feedback!");
        } else {
            var_dump("Failed to send!");
        }

        return view('videopage', ['media' => Media::all(),'categories' => Category::all()]);
    }

    public function complaint(Request $request)
    {
        $contact = new Contact();

        $contact->topic = 'complaint';
        $contact->roomnumber = null;
        $contact->url = null;

        $contact->email = $request->input('email');
        $contact->text = $request->input('complaintInput');

        if ($contact->save()) {
            return redirect()->route('videopage');
            var_dump("Thanks for sending us an complaint!");
        } else {
            var_dump("Failed to send!");
        }

        return view('videopage', ['media' => Media::all(),'categories' => Category::all()]);
    }

    public function url(Request $request)
    {
        $contact = new Contact();

        $contact->topic = 'url';
        $contact->email = null;
        $contact->roomnumber = null;
        $contact->text = null;

        $contact->url = $request->input('url');

        if ($contact->save()) {
            return redirect()->route('videopage');
            var_dump("Thanks for sending us an complaint!");
        } else {
            var_dump("Failed to send!");
        }

        return view('videopage', ['media' => Media::all(),'categories' => Category::all()]);
    }

    public function roomservice(Request $request)
    {
        $contact = new Contact();

        $contact->topic = 'roomservice';
        $contact->email = null;
        $contact->url = null;

        $contact->roomnumber = $request->input('roomnumber');
        $contact->text = $request->input('text');

        if ($contact->save()) {
            return redirect()->route('videopage');
            var_dump("We have received your request for roomservice");
        } else {
            var_dump("Failed to send!");
        }
        return view('videopage', ['media' => Media::all(),'categories' => Category::all()]);
    }

}
