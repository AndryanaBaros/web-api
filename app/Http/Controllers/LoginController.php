<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('pages.login');
    }

    public function login(Request $request) {

        $request->validate ([
            'email'=>'required',
            'password'=>'required',
        ],
        [
            'pssword.required' => "Password Harus 8 Karakter"
        ]);

        if(Auth::attempt($request->only('email','password'))){
            return view('pages.dashboard');
        }

        return view('pages.login');
    }
    
    public function logout() {
        Auth::logout();
        return redirect('./');
    }

    public function register() {
        return view('pages.register');
    }

    public function saveregister(Request $request) {
        // dd($request->all());
        $request->validate ([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|max:10|min:8',
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'department' => $request->department,
            'password' => bcrypt($request->password),
            'level' => 'admin',
            'remember_token' => Str::random(60),
        ]);

        return view('pages.login');
    }
}

