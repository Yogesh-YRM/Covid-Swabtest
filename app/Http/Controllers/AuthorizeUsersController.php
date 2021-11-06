<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorizeUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::latest()->paginate(5);
        return view('authorizeUsers.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authorizeUsers.create');
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
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        //DR encrypt password
        $request['password'] = Hash::make($request['password']);

        Admin::create($request->all());

        return redirect()->route('authorizeUsers.index')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Admin::findOrFail($id);
        return view('authorizeUsers.edit', compact('data'));
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
        $validatedData = $request->validate([
            'voornaam' => 'required',
            'achternaam' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        //DR encrypt password
        $validatedData['password'] = Hash::make($validatedData['password']);

        //$id->update($request->all());
        Admin::whereId($id)->update($validatedData);

        return redirect()->route('authorizeUsers.index')
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
        $data = Admin::findOrFail($id);
        $data->delete();

        return redirect()->route('authorizeUsers.index')
            ->with('success', 'Gebruiker succesvol verwijderd.');
    }
}
