<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
// use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() {
        return view('index');
    }

    // public function confirm(Request $request) 
    public function confirm(ContactRequest $request) {
    $contact = $request->only(['name', 'email', 'tel', 'content']);
    // return $contact;
    return view('confirm', compact('contact'));
    }

    // public function store(Request $request) 
    public function store(ContactRequest $request) 
    {
        $contact = $request->validate( [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'tel' => 'required|max:11',
            'content' => 'required'
        ]);

        Contact::create($contact);
        return view('thanks');
    }
}
