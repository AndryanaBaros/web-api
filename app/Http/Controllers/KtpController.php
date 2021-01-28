<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class KtpController extends Controller
{   

    public function ktp() {
        return view('pages.ktp');
    }

    public function matchktp(Request $request) {

        $request->validate ([
            'name'=>'required',
            'nik'=>'required',
            'msisdn'=>'required',

        ]);

        $user_nickname = $request->name;
        $request = [
              'user_id' => session('user_id'),
              'customer_name' => $request->name,
              'customer_nik' => $request->nik,
              'msisdn'=> $request->msisdn,
            ];
         
        $client = new Client();
        $encd_request =json_encode($request);

        $response = $client->request('POST','https://10.2.114.62:10041/digihub/demo/app/v1/ktp/match', [
            'verify'          => false,
            'headers'         => ['Content-Type'=>'application/json','Authorization'=>'Basic ZmVfZGVtb2FwcDoyMDIxI0QzbTA='],
            'body'            => $encd_request,
            'allow_redirects' => true
        ]);

        $arrayresponse = json_decode($response->getBody()->getContents());

        if ($response->getStatusCode()==200) {
            if ($arrayresponse->errorcode=="OK") {
                return view('pages.ktp', ['data_ktp' => $arrayresponse, 'nama_user' => $user_nickname]);
            }
            elseif ($arrayresponse->errorcode=="SNR:200:APIM1"||$arrayresponse->errorcode=="SNR:200:APIM2") {
                $err_desc = $arrayresponse->errordesc;
                return view('pages.ktp', ['data_ktp' => $arrayresponse, 'ket_eror'=> $err_desc, 'nama_user' => $user_nickname]);
            }
            else{
                return back()->with('error' ,'Something went wrong!');
            }
        }
        elseif ($response->getStatusCode()==400) {
            return back()->with('error','Matching failed! Please recheck your input');
        }
        elseif ($response->getStatusCode()==401) {
            return back()->with('error','Unauthorized access');
        }
        elseif ($response->getStatusCode()==500) {
            return back()->with('error','Internal Server Error');
        }
        elseif ($response->getStatusCode()==502) {
            return back()->with('error','Bad Gateway');
        }
        elseif ($response->getStatusCode()==504) {
            return back()->with('error','Connection Timeout!');
        }else{
            return back()->with('error' ,'Email and Password Incorrect');
        }

    }
}

