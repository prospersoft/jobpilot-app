<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function features()
    {
        // Returns the features page view
        return view('features');
    }
}
