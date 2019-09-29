<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Carbon\Carbon;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Client::orderBy('nombres', 'ASC')->get();
        } else {
            return view('home');
        }
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
        $current_date_time = Carbon::now()->toDateTimeString();
        $client = new Client();
        $client->nombres = $request->nombres;
        $client->apellidos = $request->apellidos;
        $client->cedula = $request->cedula;
        $client->correo = $request->correo;
        $client->telefono = $request->telefono;
        $client->fecha_de_registro = $current_date_time;
        $client->fecha_de_modificacion = null;
        $client->save();
        return $client;
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
        $current_date_time = Carbon::now()->toDateTimeString();
        $client = Client::find($id);
        $client->nombres = $request->nombres;
        $client->apellidos = $request->apellidos;
        $client->cedula = $request->cedula;
        $client->correo = $request->correo;
        $client->telefono = $request->telefono;
        $client->fecha_de_modificacion = $current_date_time;
        $client->save();
        return $client;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
    }
}
