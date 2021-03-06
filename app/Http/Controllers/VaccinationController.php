<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Twilio\Rest\Client;
use App\Models\Vaccinatie;
use Flash;
use QRCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('vaccinatie as v')->select('v.*','u.*','v.created_at as vax_date','v.id as vax_id')
        ->leftjoin('users as u','u.id','v.user_id')->get();
        return view('vaccinatie.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaccinatie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     require '../twilio/vendor/autoload.php';

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'id_number' => 'required',

        ]);

        $input = $request->all();

        $file = 'generated_qrcodes/' . $input['id_number'] . '.png';

        //  DR encrypt qr code
        $encrypted = Crypt::encryptString('vax_'.$input['id_number']);
        $newQrcode = QRCode::text($encrypted)
            ->setSize(8)
            ->setMargin(2)
            ->setOutfile($file)
            ->png();



            $users = DB :: table('users')->select('*')->get();

            $array = json_decode($users);
            $match_string =$input['id_number'];
            $found = false;
            foreach ($array as $data) {
                if ($found) {

                            }
                            else if ($data->id_nummer === $match_string) {
                            $found = true;
                            $users = DB :: table('users')->select('*')->where('id_nummer',$input['id_number'])->get();

                            $vax = DB::table('vaccinatie')->insertgetId([
                                'user_id' => $users[0]->id,
                                'manufracturer' => $input['manufracturer'],
                                'lot_number1' => $input['lot_number1'],
                                'date1' => $input['date1'],
                                'vaccinator1' => $input['vaccinator1'],


                                // 'status' => $input['status'],
                                'qr_code' => $file,
                                'created_at' => date('Y-m-d H:i:s')
                            ]);

$smsresult = DB::table('vaccinatie as r')->select('r.*','u.*','r.id as vaxid')
                                                   ->leftjoin('users as u','u.id','r.user_id')
                                                   ->where('u.id_nummer', $input['id_number'])->get();
                                               ################################ LIVE KEYS #####################################

                                               // $account_sid = 'AC46041e1c4e91caee7c9949243e1a1e29';
                                               // $auth_token = '7fdbfdb';
                                               // $twilio_number = '+15703768094';
                                               // $receiver =
                                               ################################################################################

                                               ################################ TEST KEYS #####################################
                                               $account_sid = 'AC5a9222e8258ab965b073b8df8a9211c7';
                                               $auth_token = '1234568';
                                               $twilio_number = '+18143998410';
                                               $receiver = '+5978920264';
                                               ################################################################################


                                               $client = new Client($account_sid, $auth_token);
                                               $client->messages->create(
                                                   // Where to send a text message (your cell phone?)
                                                   $receiver,
                                                   array(
                                                       'from' => $twilio_number,
                                                       'body' => 'Beste ' . $smsresult[0]->achternaam . ', U bent gevaccineerd. Het bewijs vindt u op de volgende link https://team13.app.sr/vax_pdf/' . $smsresult[0]->vaxid

                                                   )
                                               );

                            return redirect(route('vaccinatie.index'));
                                }
                            }
                if (!$found) {

                    $user  = DB :: table('users')->insertGetId([
                                        'voornaam' =>$input['first_name'],
                                        'achternaam' =>$input['last_name'],
                                        'geboorte_datum' =>$input['birth_date'],
                                        'mobiel' =>$input['mobiel'],
                                        'id_nummer' =>$input['id_number'],
                                        'adress' =>$input['adress'],
                                        'email' =>$input['email'],
                                        'created_at' =>date('Y-m-d H:i:s')
                                    ]);


                                    $vax = DB::table('vaccinatie')->insertgetId([
                                        'user_id' => $user,
                                        'manufracturer' => $input['manufracturer'],
                                'lot_number1' => $input['lot_number1'],
                                'date1' => $input['date1'],
                                'vaccinator1' => $input['vaccinator1'],


                                'qr_code' => $file,
                                'created_at' => date('Y-m-d H:i:s')
                                    ]);

$smsresult = DB::table('vaccinatie as r')->select('r.*','u.*')
                                                   ->leftjoin('users as u','u.id','r.user_id')
                                                   ->where('u.id_nummer', $input['id_number'])->get();
                                               ################################ LIVE KEYS #####################################

                                               // $account_sid = 'AC46041e1c4e91caee7c9949243e1a1e29';
                                               // $auth_token = '7fdbfdb';
                                               // $twilio_number = '+15703768094';
                                               // $receiver =
                                               ################################################################################

                                               ################################ TEST KEYS #####################################
                                               $account_sid = 'AC5a9222e8258ab965b073b8df8a9211c7';
                                               $auth_token = '1234568';
                                               $twilio_number = '+18143998410';
                                               $receiver = '+5978920264';
                                               ################################################################################


                                               $client = new Client($account_sid, $auth_token);
                                               $client->messages->create(
                                                   // Where to send a text message (your cell phone?)
                                                   $receiver,
                                                   array(
                                                       'from' => $twilio_number,
                                                       'body' => 'Beste ' . $smsresult[0]->achternaam . ', U bent gevaccineerd. Het bewijs vindt u op de volgende link team13.app.sr/vax_pdf/' . $smsresult[0]->vaxid

                                                   )
                                               );

                                    return redirect(route('vaccinatie.index'));
                }

        return redirect()->route('vaccinatie.index')
            ->with('success', 'Gebruiker succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = DB::table('vaccinatie as v')->select('v.*','u.*','v.created_at as vax_date','v.id as vax_id')
        ->leftjoin('users as u','u.id','v.user_id')
        ->where('v.id',$id)->get();
        return view('vaccinatie.show')->with('data', $data[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('vaccinatie as v')->select('v.*','u.*','v.created_at as vax_date','v.id as vax_id')
        ->leftjoin('users as u','u.id','v.user_id')
        ->where('v.id',$id)->get();


        // Folder path to be flushed
        $folder_path = "generated_qrcodes";

        // List of name of files inside
        // specified folder
        $files = glob($folder_path . '/' . $data[0]->id_nummer . '.png');

        // Deleting all the files in the list
        foreach ($files as $file) {

            if (is_file($file))

                // Delete the given file
                unlink($file);
        }
        return view('vaccinatie.edit')->with('data', $data[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    require '../twilio/vendor/autoload.php';

        $file = 'generated_qrcodes/' . $request['id_number'] . '.png';

        //  DR encrypt qr code
        $encrypted = Crypt::encryptString($request['id_number']);
        $newQrcode = QRCode::text($encrypted)
            ->setSize(8)
            ->setMargin(2)
            ->setOutfile($file)
            ->png();

        $data = DB::table('vaccinatie')->where('id', $id)->update([

            'lot_number1' => $request['lot_number1'],
            'date1' => $request['date1'],
            'vaccinator1' => $request['vaccinator1'],

            'lot_number2' => $request['lot_number2'],
            'date2' => $request['date2'],
            'vaccinator2' => $request['vaccinator2'],

            'lot_number3' => $request['lot_number3'],
            'date3' => $request['date3'],
            'vaccinator3' => $request['vaccinator3'],

            'status' => $request['status'],
            'qr_code' => $file,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

         $smsresult = DB::table('vaccinatie as r')->select('r.*','u.*')
                        ->leftjoin('users as u','u.id','r.user_id')
                        ->where('r.id', $id)->get();
                    ################################ LIVE KEYS #####################################

                    // $account_sid = 'AC46041e1c4e91caee7c9949243e1a1e29';
                    // $auth_token = '7fdbfdb';
                    // $twilio_number = '+15703768094';
                    // $receiver =
                    ################################################################################

                    ################################ TEST KEYS #####################################
                    $account_sid = 'AC5a9222e8258ab965b073b8df8a9211c7';
                    $auth_token = '1234568';
                    $twilio_number = '+18143998410';
                    $receiver = '+5978920264';
                    ################################################################################


                    $client = new Client($account_sid, $auth_token);
                    $client->messages->create(
                        // Where to send a text message (your cell phone?)
                        $receiver,
                        array(
                            'from' => $twilio_number,
                            'body' => 'Beste ' . $smsresult[0]->achternaam . ', U bent gevaccineerd. Het bewijs vindt u op de volgende link team13.app.sr/result_pdf/' . $smsresult[0]->id_nummer

                        )
                    );

        return redirect()->route('vaccinatie.index')
            ->with('success', 'Gebruiker gegevens zijn succesvol gewijzigd.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Vaccinatie::findOrFail($id);
        $data->delete();

        return redirect()->route('vaccinatie.index')->with('success', 'Gebruiker succesvol verwijderd.');
    }
    public function vax_pdf($id)
    {
        $data = DB::table('vaccinatie as v')->select('v.*','u.*','v.created_at as vax_date','v.id as vax_id')
        ->leftjoin('users as u','u.id','v.user_id')
        ->where('v.id',$id)->get();
    return view('vaccinatie.vaxpdf')->with('data',$data[0]);
    }
}
