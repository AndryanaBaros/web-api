<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use App\Models\User;
use GuzzleHttp\Client;

class NewLoginController extends Controller
{
    public function index() {
        if(session()->has('authenticated')){
            return view('pages.dashboard');
        }else{
            return view('pages.newlogin');
        }
    }

    public function newlogin(Request $request) {


        $request->validate ([
            'email'=>'required',
            'password'=>'required',
        ]);

            $client = new Client();
            $encd_request =json_encode($request->all());

            // Sending Request to API
            $response = $client->request('POST','https://10.2.114.62:10041/digihub/demo/app/v1/signin', [
                'verify'          => false,
                'headers'         => ['Content-Type'=>'application/json','Authorization'=>'Basic ZmVfZGVtb2FwcDoyMDIxI0QzbTA='],
                'body'            => $encd_request,
                'allow_redirects' => false
            ]);
            $arrayresponse = json_decode($response->getBody()->getContents());
            // dd($arrayresponse->errorcode);
            
            if ($response->getStatusCode()==200) {
                if ($arrayresponse->errorcode=="SCS:200:LOG0") {
                    session()->put(['authenticated'=>true,'user_id'=>$request->email]);
                    return redirect('/');
                }elseif ($arrayresponse->errorcode=="SCS:200:LOG1") {
                    return back()->with('error' ,'Login failed');
                }elseif ($arrayresponse->errorcode=="SNR:400:LOG0") {
                    return back()->with('error' ,'Login failed, please check your input');
                }else{
                    return back()->with('error' ,'Email and Password Incorrect');
                }
            }else{
                return back()->with('error' ,'Email and Password Incorrect');
            }
    }
    
    public function logout() {
        session()->flush();
        return redirect('./');
    }

    public function newregister() {
        return view('pages.newregister');
    }

    public function newsaveregister(Request $request) {
        $request->validate ([
            'name'=>'required|string',
            'email'=>'required|email',
            'department'=>'required|string',
            'msisdn'=>'required|numeric',
            'password'=>'required|string',
        ]);

        $requestNew = [
            'name' => $request->name,
            'email' => $request->email,
            'msisdn'=> $request->msisdn,
            'departement' => $request->department,
            'password'=>$request->password
        ];


        $encd_request =json_encode($requestNew);
        $client = new Client();


        try {
            $response = $client->request('POST','https://10.2.114.62:10041/digihub/demo/app/v1/signup', [
                'verify'          => false,
                'headers'         => ['Content-Type'=>'application/json','Authorization'=>'Basic ZmVfZGVtb2FwcDoyMDIxI0QzbTA='],
                'body'            => $encd_request,
                'allow_redirects' => false
            ]);
            $arrayresponse = json_decode($response->getBody()->getContents());
            // dd($arrayresponse);

            if ($response->getStatusCode()==200) {
                if ($arrayresponse->errorcode=="SCS:200:REG0") {
                    session()->put(['authenticated'=>true,'user_id'=>$request->email]);
                    return redirect()->route('login')->with('success','Register Success. Before Login, Please Wait 15 Minutes For Data Synchronization');
                }else{
                    return back()->with('error' ,'Email or MSISDN already exist!');
                }
            }
            else{
                return back()->with('error' ,'Oops, Something went wrong!');
            }
        } catch (\Throwable $th) {
            if (preg_match("/SCS:200:REG1/i",$th)) {
                return back()->with('error' ,'Register failed');
            }elseif (preg_match("/SNR:400:REG0/i",$th)) {
                return back()->with('error' ,'Register failed, please check your input');
            }elseif (preg_match("/SNR:401:REG0/i",$th)) {
                return back()->with('error' ,'Register failed, access not permited');
            }else{
                return back()->with('error' ,'Oops, Something went wrong!');
            }
        }
    }
}

