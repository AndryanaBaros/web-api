<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use App\Models\User;

class NewLoginController extends Controller
{
    public function index() {
        return view('pages.newlogin');
    }

    public function newlogin(Request $request) {

        if(Auth::attempt($request->only('email','password'))){
            return view('pages.dashboard');
        }

        // return view('pages.newlogin')->with('error' ,'password dan email salah');
        return redirect()->route('newlogin')->with('error' ,'Email and Password Incorrect');
    }
    
    public function logout() {
        Auth::logout();
        return redirect('./');
    }

    public function newregister() {
        return view('pages.newregister');
    }

    public function newsaveregister(Request $request) {
        // dd($request->all());
        $request->validate ([
            'name'=>'required',
            'email'=>'required|unique:users',
            'phone_number'=>'required|unique:users',
            'password'=>'required|max:10|min:8',

        ],
        [
            'name.required' => 'email tidak boleh sama'
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

        return redirect()->route('newlogin')->with('success' ,'Register success, please Sign In!');
    }
}

