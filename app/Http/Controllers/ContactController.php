<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class ContactController extends Controller
// {
//     //
// }



namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        // Returns the contact page view
        return view('contact');
    }
}