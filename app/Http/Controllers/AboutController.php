<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class AboutController extends Controller
// {
//     //
// }




namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        // Returns the about page view
        return view('about');
    }
}