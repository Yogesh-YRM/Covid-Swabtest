<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;
use Flash;
use QRCode;
use Illuminate\Support\Facades\Crypt;


class AdminRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registraties = DB::table('registratie')->select('*')->where('status', '!=', "afgehandeld")->get();
        return view('adminregistratie.index')->with('registraties', $registraties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('adminregistratie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $bp = array($input['bovendruk'], $input['onderdruk']);
        $bpjson = json_encode($bp);
        $vax = array($input['vaxstatus'], $input['vaxdosis']);
        $vaxjson = json_encode($vax);

        $reg = DB::table('registratie')->insertgetId([
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'birthdate' => $input['birthdate'],
            'adress' => $input['adress'],
            'phonenumber' => $input['phonenumber'],
            'id_number' => $input['id_number'],
            'email' => $input['email'],
            'opmerking' => $input['symptoms'],
            'status' => "geregistreerd",
            'saturation' => $input['saturatie'],
            'bp' => $bpjson,
            'vax' => $vaxjson,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect(route('adminregistratie.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reg = DB::table('registratie')->select('*')->where('id', $id)->get();
        return view('adminregistratie.show')->with('reg', $reg[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prereg = DB::table('registratie')->select('*')->where('id', $id)->get();
        return view('adminregistratie.edit')->with('prereg', $prereg[0]);
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
        $input = $request->all();
        $bp = array($input['bovendruk'], $input['onderdruk']);
        $bpjson = json_encode($bp);
        $vax = array($input['vaxstatus'], $input['vaxdosis']);
        $vaxjson = json_encode($vax);

        $reg = DB::table('registratie')->where('id', $id)->update([
            'saturation' => $input['saturatie'],
            'bp' => $bpjson,
            'vax' => $vaxjson,
            'status' => "geregistreerd",
            'updated_at' => date('Y-m-d H:i:s')


        ]);
        return redirect(route('adminregistratie.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function result($id, $result)
    {
        require '../twilio/vendor/autoload.php';



        $file = 'generated_qrcodes/pcr' . $id . '-'.$result. '.png';

        $result = DB ::table('result')->insertGetid([
            'registration_id' => $id,
            'result' => $result,
            'qr_code' =>$file,
            'created_at' => date('Y-m-d H:i:s')
             ]);
        $reg = DB:: table('registratie')->where('id',$id)->update([

             'status'=>"afgehandeld"
             ]);
         $encrypted = Crypt::encryptString($result);
         $newQrcode = QRCode::text($encrypted)
             ->setSize(8)
             ->setMargin(2)
             ->setOutfile($file)
             ->png();


         $smsresult = DB::table('registratie as r')->select('r.*','res.*','res.created_at as today')
          ->leftjoin('result as res','r.id','res.registration_id')
          ->where('res.id',$result)->get();
            ################################ LIVE KEYS #####################################

        // $account_sid = 'AC46041e1c4e91caee7c9949243e1a1e29';
        // $auth_token = '7fdbfdb';
        // $twilio_number = '+15703768094';
        // $receiver =
        ################################################################################

        ################################ TEST KEYS #####################################
        $account_sid = 'AC5a9222e8258ab965b073b8df8a9211c7';
        $auth_token = 'dssbfbfbd';
        $twilio_number = '+18143998410';
        $receiver = '+5978920264';
        ################################################################################


        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            $receiver,
            array(
                'from' => $twilio_number,
                'body' => 'Beste ' .$smsresult[0]->lastname.', U bent '.$smsresult[0]->result.' getest. Het bewijs vindt u op de volgende link team13.app.sr/result_pdf/'.$smsresult[0]->id_number

            )
        );

        return redirect(route('adminregistratie.index'));
    }

    public function resultaatoverzicht(Request $request)
    {
        $input = $request->all();

        $resultaten = DB::table('result as res')->select('r.*','res.*','res.created_at as today')
        ->leftjoin('registratie as r','r.id','res.registration_id');


        if (isset($input['resultfilter'])) {



            //    echo '<pre>';
            //     var_dump($input);
            //    echo '</pre>';
            //    exit();

            // Filter on resultaat


            if (isset($input['resultaatfilter']) && $input['resultaatfilter'] != '') {
                $resultaten = $resultaten->where('res.result', $input['resultaatfilter']);
            }

            //Filter on vaccinatie
            if (isset($input['vaxfilter']) && $input['vaxfilter'] != '') {
                $resultaten = $resultaten->where('r.vax', 'like', '%' . $input['vaxfilter'] . '%');
            }


            //Filter on resultaatdate range

            $resultdatumRange = explode(" - ", $input['resultdatefilter']);
            $resultdatumStart = implode("-", array_reverse(explode("-", $resultdatumRange[0])));
            $resultdatumEnd = implode("-", array_reverse(explode("-", $resultdatumRange[1])));
            if (isset($resultdatumStart) && isset($resultdatumEnd)) {
                $resultaten =  $resultaten->whereBetween('res.created_at', [$resultdatumStart, $resultdatumEnd]);
            }

            $resultaten =  $resultaten->get();

            return view('adminregistratie.resultaatoverzicht')->with('resultaten', $resultaten)
                ->with('activedate', $input['resultdatefilter']);
        }
        $resultaten =  $resultaten->get();
        return view('adminregistratie.resultaatoverzicht')->with('resultaten', $resultaten);
    }
}
