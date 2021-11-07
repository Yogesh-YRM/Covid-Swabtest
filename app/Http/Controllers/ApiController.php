<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;


class ApiController extends Controller
{
    public function vaccinatie_QRvalidation(Request $request)
    {
        // var_dump($request->id);
        // exit();
        // decrypt qr code 
       $id_number = Crypt::decryptString($request->id);
       $user = DB::table('vaccinatie')->where('id_number', $id_number)->get();
    // var_dump($user);
    return response()->json($user);
    }
    public function PCR_QRvalidation(Request $request)
    {
        var_dump($request->id);
        exit();
        // decrypt qr code 
       $id_number = Crypt::decryptString($request->id);
       $user = DB::table('vaccinatie')->where('id_number', $id_number)->get();
    // var_dump($user);
    return response()->json($user);
    }
}