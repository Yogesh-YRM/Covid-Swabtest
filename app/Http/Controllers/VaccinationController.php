<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'id_number' => 'required',
           
        ]);

        $input = $request->all();

        $file = 'generated_qrcodes/' . $input['id_number'] . '.png';
        // $message = $input['first_name'] . ' ' . $input['last_name'] . ' ' . $input['id_number'] . ' is volledig gevaccineerd en heeft de ' . $input['manufracturer'] . ' Booster ook genomen';

        // if ($input['status'] == '1e Dose') {
        //     $message = $input['first_name'] . ' ' . $input['last_name'] . ' ' . $input['id_number'] . ' is met de eerste prik gevaccineerd';
        // } elseif ($input['status'] == '2e Dose') {
        //     $message = $input['first_name'] . ' ' . $input['last_name'] . ' ' . $input['id_number'] . ' is volledig gevaccineerd';
        // } elseif ($input['status'] == 'Booster') {
        //     $message = $input['first_name'] . ' ' . $input['last_name'] . ' ' . $input['id_number'] . ' is volledig gevaccineerd en heeft de ' . $input['manufracturer'] . ' Booster ook genomen';
        // }
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

                                // 'lot_number2' => $input['lot_number2'],
                                // 'date2' => $input['date2'],
                                // 'vaccinator2' => $input['vaccinator2'],

                                // 'lot_number3' => $input['lot_number3'],
                                // 'date3' => $input['date3'],
                                // 'vaccinator3' => $input['vaccinator3'],

                                // 'status' => $input['status'],
                                'qr_code' => $file,
                                'created_at' => date('Y-m-d H:i:s')
                            ]);
                            return redirect(route('vaccinatie.index'));
                                }
                            }
                if (!$found) {
                   
                    $user  = DB :: table('users')->insertGetId([
                                        'voornaam' =>$input['first_name'],
                                        'achternaam' =>$input['last_name'],
                                        'geboorte_datum' =>$input['birth_date'],
                                        // 'mobiel' =>$input['phonenumber'],
                                        'id_nummer' =>$input['id_number'],
                                        // 'email' =>$input['email'],
                                        'created_at' =>date('Y-m-d H:i:s')
                                    ]);
                            
                        
                                    $vax = DB::table('vaccinatie')->insertgetId([
                                        'user_id' => $user,
                                        'manufracturer' => $input['manufracturer'],
                                'lot_number1' => $input['lot_number1'],
                                'date1' => $input['date1'],
                                'vaccinator1' => $input['vaccinator1'],

                                // 'lot_number2' => $input['lot_number2'],
                                // 'date2' => $input['date2'],
                                // 'vaccinator2' => $input['vaccinator2'],

                                // 'lot_number3' => $input['lot_number3'],
                                // 'date3' => $input['date3'],
                                // 'vaccinator3' => $input['vaccinator3'],

                                // 'status' => $input['status'],
                                'qr_code' => $file,
                                'created_at' => date('Y-m-d H:i:s')
                                    ]);
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
        //
    }
}
