<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class InterestController extends Controller
{   

    public function interest() {
        return view('pages.interest');
    }

    public function matchinterest(Request $request) {

        // $request->validate ([
        //     'name'=>'required',
        //     'nik'=>'required',
        //     'msisdn'=>'required',

        // ]);

        $user_nickname = $request->name;
        $request = [
              'user_id' => session('user_id'),
              'customer_name' => $request->name,
              'msisdn'=> $request->msisdn,
              'home_work' => $request->verify,
              'address' => $request->address,

            ];
        
            // dd($request);
         
        $client = new Client();
        $encd_request =json_encode($request);

        try {
        $response = $client->request('POST','https://10.2.114.62:10041/digihub/demo/app/v1/interest/scoring', [
            'verify'          => false,
            'headers'         => ['Content-Type'=>'application/json','Authorization'=>'Basic ZmVfZGVtb2FwcDoyMDIxI0QzbTA='],
            'body'            => $encd_request,
            'allow_redirects' => true
        ]);

        $arrayresponse = json_decode($response->getBody()->getContents());

        // dd($arrayresponse);

        if ($response->getStatusCode()==200) {
            if ($arrayresponse->errorcode=="OK") {
                return view('pages.interest', ['data_interest' => $arrayresponse, 'nama_user' => $user_nickname]);
            }
            elseif ($arrayresponse->errorcode=="SNR:200:APIM1"||$arrayresponse->errorcode=="SNR:200:APIM2") {
                $err_desc = $arrayresponse->errordesc;
                return view('pages.interest', ['data_interest' => $arrayresponse, 'ket_eror'=> $err_desc, 'nama_user' => $user_nickname]);
            }
            else{
                return back()->with('error' ,'Something went wrong!');
            }
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

