<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomType;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function create()
    {
        return view("main.reservation");
    }

    public function store(Request $request, Reservation $reservation, Client $client, Profile $client_profile, RoomType $roomType)
    {
        $request->checkin = \Carbon\Carbon::createFromFormat('d/m/Y', request('checkin') or '00/00/0000');
        $request->checkout = \Carbon\Carbon::createFromFormat('d/m/Y', request('checkout') or '00/00/0000');

        $client_profile = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'title' => 'required|string',
            'email' => 'nullable|email',
            'phone_number' => 'required|numeric',
            'country' => 'required|string'       
        ]);

        // return request()->all();
        $reservation = request()->validate([
            'occupant' => 'required|numeric',
            'checkin' => 'required|date_format:d/m/Y',
            'checkout' => 'required|date_format:d/m/Y|after_or_equal:checkin',
            'room' => 'required|exists:room_types',
            'message' => 'nullable|string'
        ]);

        $room_type_id = request()->validate([
            'room' => 'required|exists:room_types',
        ]);

        $room::where('room_type_id', $room_type_id)->first();
        
        $client->profile()->save($client_profile);
        $reservation->save($reservation);

        $client_profile->save($pro);

        return $reseration;
        
        return $data;
    }
}
