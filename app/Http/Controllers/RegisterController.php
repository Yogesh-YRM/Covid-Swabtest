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
        $registratie = DB :: table('registratie as r')->select('r.*','l.name as loc','u.*','r.created_at as dat_reg')
        ->leftjoin('locations as l','l.id','r.location')
        ->leftjoin('users as u','u.id','r.user_id')
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
            'location' => 'required',
        ]);
        $input = $request->all();

        

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
                            $pre = DB :: table('registratie')->insertGetid([
                                'user_id' => $users[0]->id,
                                'opmerking' =>$input['symptoms'],
                                'location'=>$input['location'],
                                'status'=>"preregistratie",
                                'created_at' =>date('Y-m-d H:i:s')
                            ]);
                                return redirect (route('registeren.show',[$pre])); 
                                }
                            }
                if (!$found) {

                    $user  = DB :: table('users')->insertGetId([
                                        'voornaam' =>$input['firstname'],
                                        'achternaam' =>$input['lastname'],
                                        'geboorte_datum' =>$input['birthdate'],
                                        'adress' =>$input['adress'],
                                        'mobiel' =>$input['phonenumber'],
                                        'id_nummer' =>$input['id_number'],
                                        'email' =>$input['email'],
                                        'created_at' =>date('Y-m-d H:i:s')
                                    ]);
                            
                        
                                    $pre = DB :: table('registratie')->insertGetid([
                                        'user_id' => $user,
                                        'opmerking' =>$input['symptoms'],
                                        'location'=>$input['location'],
                                        'status'=>"preregistratie",
                                        'created_at' =>date('Y-m-d H:i:s')
                                    ]);
                                    return redirect (route('registeren.show',[$pre])); 
                }

        return redirect (route('registeren.show',[$pre]));       
    
    }

    public function result_pdf($id)
    {
        $result = DB::table('result as res')->select('res.*','r.*','u.*','res.created_at as res_date')
        ->leftjoin('registratie as r','r.id','res.registration_id')
        ->leftjoin('users as u','u.id','r.user_id')
        ->where('u.id_nummer',$id)->get();
        
        return view('registratie.resultpdf')->with('result',$result[0]);
    }
}
