<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ReasonContact;

class ContactController extends Controller
{

    public function contact(Request $request) {

        $reason_contact = ReasonContact::all();

        return view('site.contact', ['title' => 'Contato', 'reason_contact' => $reason_contact]);
    }


    public function saveContact(Request $request){

        //Fields validation required:
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'reason_contact' => 'required',
            'message' => 'required'
        ]);

        // Creating contact:
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->reason_contact = $request->input('reason_contact');
        $contact->message = $request->input('message');
        $contact->save();

        // or create new contact using: 
        // Contact::create($request->all());
        
        // var_dump($_POST);

    }

}
