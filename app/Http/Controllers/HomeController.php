<?php

namespace App\Http\Controllers;

use App\Models\ReasonContact;

class HomeController extends Controller
{
    public function homeIndex(){
        $reason_contact = ReasonContact::all();
        return view('app.home', ['reason_contact' => $reason_contact]);
    }
}
