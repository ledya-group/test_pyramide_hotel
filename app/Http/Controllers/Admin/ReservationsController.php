<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use App\Client;
use App\Profile;
use Carbon\Carbon;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::active()
            // ->orderBy('created_at')
            ->get();

            // return $reservations;

        return view('admin.reservations.index', [
            'reservations' => $reservations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Room $room)
    {
        $rooms = $room->available();
        $clients = Client::orderBy('id', 'desc')->get();
        
        if(!empty(request()->room_id)) {
            $room_id = request()->room_id;
            
            return view('admin.reservations.create', compact('clients', 'rooms', 'room_id'));
        } else {
            return view('admin.reservations.create', compact('clients', 'rooms'));
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Reservation $reservation)
    {
        $this->validate($request, [

        ]);

        $checkin = Carbon::createFromFormat('d/m/Y' ,$request->checkin);
        $checkout = Carbon::createFromFormat('d/m/Y' ,$request->checkout);

        $base_price = Room::find($request->room_id)->type->base_price;

        $total_price = $this->calculateTotalPrice($checkin->diffInDays($checkout), $base_price);

        $reservation->create([
            "total_price" => $total_price,
            "room_id" => $request->room_id,
            "client_id" => $request->client_id,
            "checkin" => substr($checkin, 0, 10),
            "checkout" => substr($checkout, 0, 10),
            "description" => $request->description
        ]);

        return redirect()->route('reservations.index');
    }

    public function specialReservation(Room $room)
    {
        return view('admin.reservations.specialReservation', compact('room'));
    }

    public function storeSpecialReservation(Room $room, Request $request, Client $client, Profile $profile)
    {
        $this->validate($request, [

        ]);

        $profile = $profile->firstOrCreate(['email' => $request->email],[
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        $client = $client->firstOrCreate([
            'company' => $request->company,
            'profile_id' => $profile->id,
        ]);

        // return $client;

        $checkin = Carbon::createFromFormat('d/m/Y' ,$request->checkin);
        $checkout = Carbon::createFromFormat('d/m/Y' ,$request->checkout);

        $total_price = $this->calculateTotalPrice($checkin->diffInDays($checkout), $room->type->base_price);

        $room->reservation()->create([
            "total_price" => $total_price,
            // "room_id" => $room->id,
            "client_id" => $client->id,
            "checkin" => $checkin,
            "checkout" => $checkout,
            "description" => $request->description
        ]);

        return redirect()->route('reservations.index');
    }

    public function calculateTotalPrice($days, $base_price)
    {
        return $days * $base_price;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        // $data = $reservation;

        return view('admin.reservations.show')->withReservation($reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation, Room $room)
    {
        $rooms = $room->available();

        $clients = Client::all();

        return view('admin.reservations.edit', compact('reservation', 'clients', 'rooms'));
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
