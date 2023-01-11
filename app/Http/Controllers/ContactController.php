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
            'reason_contacts_id' => 'required',
            'message' => 'required'
        ], 
        [
            'name.required' => 'O campo nome é obrigatório',
            'phone.required' => 'O campo telefone é obrigatório',
            'email.required' => 'O campo e-mail é obrigatório (ex: @outlook.com, @gmail.com, @yahoo.com)',
            'reason_contacts_id.required' => 'É obrigatório selecionar uma das opções',
            'message.required' => 'O campo de mensagem é obrigatório'
        ]);

        // Creating contact:
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->reason_contacts_id = $request->input('reason_contacts_id');
        $contact->message = $request->input('message');
        $contact->save();
        // or create new contact using: 
        // Contact::create($request->all());
        
        // var_dump($_POST);
        return redirect()->route('site.index');
    }

}
