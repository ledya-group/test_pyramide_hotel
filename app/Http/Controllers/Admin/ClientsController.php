<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Profile;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Reservation::with('client.profile')
            ->active()
            ->get()
            ->pluck('client');

        // return $clients;

        return view('admin.clients.index')->withClients($clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Client $client, Profile $profile)
    {
        $this->validate($request, [

        ]);

        $profile = $profile->create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "middle_name" => $request->middle_name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
        ]);
        
        $client->create([
            'profile_id' => $profile->id,
            'company' => $request->company
        ]);

        return redirect()->route('reservations.index');
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
}
