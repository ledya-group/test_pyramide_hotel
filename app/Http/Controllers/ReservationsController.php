<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function create()
    {
        return view("main.reservation");
    }

    public function store(Request $request)
    {
        $request->checkin = \Carbon\Carbon::createFromFormat('d/m/Y', request('checkin'));
        $request->checkout = \Carbon\Carbon::createFromFormat('d/m/Y', request('checkout'));

        // return request()->all();
        $data = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'nullable|email',
            'phone_number' => 'required|numeric',
            'occupant' => 'required|numeric',
            'country' => 'required|string',
            'town' => 'nullable|string',
            'checkin' => 'required|date_format:d/m/Y',
            'checkout' => 'required|date_format:d/m/Y|after_or_equal:checkin',
            'title' => 'required|string',
            'room' => 'required|numeric',
            'message' => 'nullable|string'
        ]);

        $reseration = new Reservation([
            'room_id' => $data['room'],
            'checkin' => $data['checkin'],
            'checkout' => $data['checkout'],
            'description' => $data['message'],
            'paid' => $data['message']
        ]);

        return $reseration;
        
        return $data;
    }
}
