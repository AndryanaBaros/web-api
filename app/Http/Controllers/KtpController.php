<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KtpController extends Controller
{
    public function ktp() {
        return view('pages.ktp');
    }
}
