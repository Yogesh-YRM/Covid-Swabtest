<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;


class ApiController extends Controller
{

   public function qrscanner(Request $request)
   {
      $id = Crypt::decryptString($request->id);
      //check if string contains the 'vax_'
      if (strpos($id, 'vax_') !== false) {
         //remove 'vax_' from string
         $id_number =  str_replace("vax_", "", $id);
         $user = DB::table('vaccinatie')->where('id_number', $id_number)->get();

         return response()->json($user);
      } 
      elseif (strpos($id, 'pcr_') !== false) {
         $id_number =  str_replace("pcr_", "", $id);
         $user = DB::table('registratie as r')->select('r.*', 'res.*', 'res.created_at as today')
            ->leftjoin('result as res', 'r.id', 'res.registration_id')
            ->where('res.id', $id_number)->get();
         return response()->json($user);
      }
   }
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
      $id_number = Crypt::decryptString($request->id);
      //    $user = DB::table('result')->where('registration_id', $id_number)->get();

      $user = DB::table('registratie as r')->select('r.*', 'res.*', 'res.created_at as today')
         ->leftjoin('result as res', 'r.id', 'res.registration_id')
         ->where('res.id', $id_number)->get();
      // var_dump($user);
      return response()->json($user);
   }
}
