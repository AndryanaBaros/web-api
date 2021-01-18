<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function interest() {
        return view('pages.interest');
    }  
}
