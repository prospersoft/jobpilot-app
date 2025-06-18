<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class HomeController extends Controller
// {
//     //
// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // Returns the home page view
        return view('home');
    }
}