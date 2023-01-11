<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexProduct() {
        return view('app.product');
    }
}
