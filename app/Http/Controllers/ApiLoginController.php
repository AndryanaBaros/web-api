<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiLoginController extends Controller
{
    public function index()
    {
        $response = Http::post('https://10.2.114.62:10041/digihub/demo/app/v1/signin');
        $data = $response->json();
        dd($data);

        return view('pages.apilogin');
    }
}