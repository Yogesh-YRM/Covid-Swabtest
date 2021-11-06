<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;


class AdminRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registraties = DB:: table('registratie')->select('*')->where('status','!=',"afgehandeld")->get();
        return view ('adminregistratie.index')->with('registraties',$registraties);
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

       $bp = array($input['bovendruk'],$input['onderdruk']);
        $bpjson = json_encode($bp);
        $vax = array($input['vaxstatus'],$input['vaxdosis']);
        $vaxjson = json_encode($vax);

       $reg = DB:: table('registratie')->insertgetId([
        'firstname' =>$input['firstname'],
        'lastname' =>$input['lastname'],
        'birthdate' =>$input['birthdate'],
        'adress' =>$input['adress'],
        'phonenumber' =>$input['phonenumber'],
        'id_number' =>$input['id_number'],
        'email' =>$input['email'],
        'opmerking' =>$input['symptoms'],
        'status'=>"geregistreerd",
        'saturation'=>$input['saturatie'],
            'bp'=>$bpjson,
            'vax'=>$vaxjson,
        'created_at' =>date('Y-m-d H:i:s')
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
        $reg = DB::table('registratie')->select('*')->where('id',$id)->get();
        return view('adminregistratie.show')->with('reg',$reg[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prereg = DB::table('registratie')->select('*')->where('id',$id)->get();
        return view('adminregistratie.edit')->with('prereg',$prereg[0]);
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
        $bp = array($input['bovendruk'],$input['onderdruk']);
        $bpjson = json_encode($bp);
        $vax = array($input['vaxstatus'],$input['vaxdosis']);
        $vaxjson = json_encode($vax);

        $reg = DB:: table('registratie')->where('id',$id)->update([
            'saturation'=>$input['saturatie'],
            'bp'=>$bpjson,
            'vax'=>$vaxjson,
            'status'=>"geregistreerd",
            'updated_at'=>date('Y-m-d H:i:s')
            
        
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

    public function result($id,$result)
    {
       $result = DB ::table('result')->insertGetid([
           'registration_id' => $id,
           'result' => $result,
           'created_at' => date('Y-m-d H:i:s')
       ]);
       $reg = DB:: table('registratie')->where('id',$id)->update([

        'status'=>"afgehandeld"

    ]);

    require_once 'twilio/vendor/autoload.php';



################################ LIVE KEYS #####################################
// $account_sid = 'AC46041e1c4e91caee7c9949243e1a1e29';
// $auth_token = '7c732613583fe910988cc2c8b0ec0240';
// $twilio_number = '+15703768094';
// $receiver = 
################################################################################

################################ TEST KEYS #####################################
$account_sid = 'AC5a9222e8258ab965b073b8df8a9211c7';
$auth_token = 'e9c21e06bde59a38d4bbaa3785888c2a';
$twilio_number = '+18143998410';
$receiver = '+5978920264';
################################################################################


$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    $receiver,
    array(
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    )
);
    return redirect(route('adminregistratie.index'));
    }

    public function resultaatoverzicht()
    {
        $resultaten = DB::table('registratie as r')->select('r.*','res.*')
        ->leftjoin('result as res','r.id','res.registration_id')->get();
        // dd($resultaten);
return view('adminregistratie.resultaatoverzicht')->with('resultaten',$resultaten);
    }
}
