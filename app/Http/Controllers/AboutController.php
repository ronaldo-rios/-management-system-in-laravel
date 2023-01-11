<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAccessMiddleware;

class AboutController extends Controller
{
   
    public function about() {
        return view('site.about');
    }
    


}
