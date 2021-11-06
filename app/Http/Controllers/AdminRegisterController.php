<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    return redirect(route('adminregistratie.index'));
    }
}
