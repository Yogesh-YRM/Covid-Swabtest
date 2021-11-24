<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

date_default_timezone_set("America/cayenne");

class ApiController extends Controller
{

   public function qrscanner(Request $request)
   {

      // $id  = Crypt::decryptString($request->id);

      try {
         $id = Crypt::decryptString($request->id);
         //check if string contains the 'vax_'
         if (strpos($id, 'vax_') !== false) {
            //remove 'vax_' from string

            $id_number =  str_replace("vax_", "", $id);;
            $vax = DB::table('users')
               ->select('users.id', 'users.voornaam', 'users.achternaam', 'users.id_nummer', 'v.manufracturer', 'v.lot_number1', 'v.lot_number2', 'v.lot_number3', 'v.date1', 'v.date2', 'v.date3')
               ->leftJoin('vaccinatie as v', 'users.id', 'v.user_id')
               ->where('users.id_nummer', $id_number)
               ->get();

            $pcr = DB::table('registratie')
               ->select('r.result', DB::raw('DATE_FORMAT(r.created_at, "%d %b %Y") as prc_date'))
               ->leftJoin('result as r', 'registratie.id', 'r.registration_id')
               ->where('user_id', $vax[0]->id)->latest('r.id')->first();

            if ($pcr == null) {
               $pcr = [];
            } else if ($pcr != null) {

               if ($pcr->result == 'positief') {
                  $user = [];
                  return response()->json($user);
                  exit();
               }
            }

            $user = array(
               $vax[0],
               $pcr
            );
            return response()->json($user);
         } elseif (strpos($id, 'pcr_') !== false) {
            $id_number =  str_replace("pcr_", "", $id);
            $user = DB::table('result as r')->select('r.result', 'r.created_at as pcr_valid', 'registratie.user_id', 'users.voornaam', 'users.achternaam', 'users.id_nummer')
               ->leftJoin('registratie', 'r.registration_id', 'registratie.id')
               ->leftJoin('users', 'registratie.user_id', 'users.id')
               ->where('r.id', $id_number)->get();
            $user[0]->pcr_valid = date('d-m-Y H:i', strtotime($user[0]->pcr_valid . ' + 1 days'));

            $now = strtotime(date("d-m-Y H:i"));
            $expireDate = strtotime($user[0]->pcr_valid);

            if ($expireDate >= $now) {
               $user[0]->pcr_status = "valid";
            } elseif ($expireDate <= $now) {
               $user[0]->pcr_status = "expire";
            }
            return response()->json($user);
         }
      } catch (DecryptException $e) {
         $user = [];
         return response()->json($user);
      }
   }
}
