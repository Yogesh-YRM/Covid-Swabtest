<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pre)
    {
        $registratie = DB :: table('registratie as r')->select('r.*','l.name as loc')
        ->leftjoin('locations as l','l.id','r.location')
        ->where('r.id',$pre)
        ->get();
        return view('registratie.registerconfirm')->with('registratie',$registratie[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function preregister(Request $request)
    {
        //DR add validation to pre reg form
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'adress' => 'required',
            'phonenumber' => 'required',
            'birthdate' => 'required',
            'id_number' => 'required',
            'email' => 'required',
            'location' => 'required',
        ]);
        $input = $request->all();
        dd($input);
        exit();

        $pre = DB :: table('registratie')->insertGetid([
            'firstname' =>$input['firstname'],
            'lastname' =>$input['lastname'],
            'birthdate' =>$input['birthdate'],
            'adress' =>$input['adress'],
            'phonenumber' =>$input['phonenumber'],
            'id_number' =>$input['id_number'],
            'email' =>$input['email'],
            'opmerking' =>$input['symptoms'],
            'location'=>$input['location'],
            'status'=>"preregistratie",
            'created_at' =>date('Y-m-d H:i:s')
        ]);
    return redirect (route('registeren.show',[$pre]));
    }

    public function result_pdf($id)
    {
        $result = DB::table('result as res')->select('res.*','r.*')
        ->leftjoin('registratie as r','r.id','res.registration_id')
        ->where('r.id_number',$id)->get();
        
        return view('registratie.resultpdf')->with('result',$result[0]);
    }
}
