<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index', ['contact' => Contact::all()]);
    }

    public function show(Contact $contact)
    {
        return view('media.show', ['contact' => $contact]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function post()
    {
        return view('contact');
    }
}
