<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReasonContact;
use App\Models\Contact;

class MainController extends Controller
{

    public function main() {

        $reason_contact = ReasonContact::all();

        return view('site.main', ['reason_contact' => $reason_contact]);
    }


}
