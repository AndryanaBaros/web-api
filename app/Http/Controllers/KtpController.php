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
            'name'=>'required|string',
            'nik'=>'required|string',
            'msisdn'=>'required|string',
        ]);

        $user_nickname = $request->name;
        $name = session('user_id');
        $request = [
              'user_id' => session('user_id'),
              'customer_name' => $request->name,
              'customer_nik' => $request->nik,
              'msisdn'=> $request->msisdn,
        ];
         
        $client = new Client();
        $encd_request =json_encode($request);

        try {
        $response = $client->request('POST','https://10.2.114.62:10041/digihub/demo/app/v1/ktp/match', [
            'verify'          => false,
            'headers'         => ['Content-Type'=>'application/json','Authorization'=>'Basic ZmVfZGVtb2FwcDoyMDIxI0QzbTA='],
            'body'            => $encd_request,
            'allow_redirects' => false
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
        else{
            return back()->with('error' ,'Something went wrong!');
        }
        } catch (\Throwable $th) {
            if (preg_match("/SNR:400:APIM0/i",$th)) {
                return back()->with('error','Matching failed! Please recheck your input');
            }elseif (preg_match("/SNR:400:APIM1/i",$th)) {
                return back()->with('error' ,'Data doesnt match any record');
            }elseif (preg_match("/SNR:400:APIM2/i",$th)) {
                return back()->with('error' ,'MSISDN is invalid');
            }elseif (preg_match("/SNR:401:APIM0/i",$th)) {
                return back()->with('error' ,'Access not permitted');
            }elseif (preg_match("/ERR:500:AGTC0/i",$th)) {
                return back()->with('error' ,'Internal Error SSL Exception');
            }elseif (preg_match("/ERR:500:AGTC1/i",$th)) {
                return back()->with('error' ,'Internal Error JSON Exception');
            }elseif (preg_match("/ERR:502:AGTC0/i",$th)) {
                return back()->with('error' ,'Bad gateway');
            }elseif (preg_match("/ERR:504:AGTC0/i",$th)) {
                return back()->with('error' ,'Connection Timeout');
            }else{
                return back()->with('error' ,'Something went wrong!');
            }
        }

    }
}

