<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookiesController extends Controller
{
    public function cookies()
    {
        return view('cookies');
    }
}
