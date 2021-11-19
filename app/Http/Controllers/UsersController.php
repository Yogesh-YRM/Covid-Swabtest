<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')->select('*')->orderBy('id', 'DESC')->get();
        return view('users.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
                'voornaam' => 'required',
                'achternaam' => 'required',
                'geboorte_datum' => 'required',
                'adress' => 'required',
                'id_nummer' => 'required',
                'mobiel' => 'required',
            ]);

            $input = $request->all();

            $pre = DB::table('users')->insertGetid([
                'voornaam' => $input['voornaam'],
                'achternaam' => $input['achternaam'],
                'geboorte_datum' => $input['geboorte_datum'],
                'adress' => $input['adress'],
                'id_nummer' => $input['id_nummer'],
                'mobiel' => $input['mobiel'],
                'email' => $input['email'],

                'created_at' => date('Y-m-d H:i:s')
            ]);

            return redirect()->route('users.index')
                ->with('success', 'Gebruiker succesvol toegevoegd.');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('users as u')->select('u.*')
                    ->where('u.id', $id)
                    ->get();
                return view('users.show')->with('data', $data[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $data = DB::table('users as u')->select('u.*')
                ->where('u.id', $id)
                ->get();

            return view('users.edit')->with('data', $data[0]);
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
        $data = DB::table('users')->where('id', $id)->update([
                   'voornaam' => $request['voornaam'],
                   'achternaam' => $request['achternaam'],
                   'geboorte_datum' => $request['geboorte_datum'],
                   'adress' => $request['adress'],
                   'id_nummer' => $request['id_nummer'],
                   'mobiel' => $request['mobiel'],
                   'email' => $request['email'],

                   'created_at' => date('Y-m-d H:i:s')
               ]);
               return redirect()->route('users.index')
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
            $data = User::findOrFail($id);
            $data->delete();

            return redirect()->route('users.index')
                ->with('success', 'Gebruiker succesvol verwijderd.');
        }
}
