<?php

namespace App\Http\Controllers;

use App\Room;
use App\Client;
use App\Profile;
use App\RoomType;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function create()
    {
        return view("main.reservation");
    }

    public function store(Request $request, Reservation $reservation, Client $client, Profile $profile, RoomType $roomType, Room $room)
    {
        $request->checkin = \Carbon\Carbon::createFromFormat('d/m/Y', request('checkin') ?? '00/00/0000');
        $request->checkout = \Carbon\Carbon::createFromFormat('d/m/Y', request('checkout') ??'00/00/0000');

        $client_profile = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required|string',
            'email' => 'nullable|email',
            'phone_number' => 'required|numeric',
            'country' => 'required|string'
        ]);

        // return $client_profile['email'];

        $profile = $profile::firstOrCreate([
            'email' => $client_profile['email'],
            'first_name' => $client_profile['first_name'],
        ], $client_profile);

        if($profile->id == null) { return "Not Working"; }

        $reservation = request()->validate([
            // 'occupant' => 'required|numeric',
            'checkin' => 'required|date_format:d/m/Y',
            'checkout' => 'required|date_format:d/m/Y|after_or_equal:checkin',
            'message' => 'nullable|string'
        ]);

        $room_type_id = request()->validate([
            'room_type_id' => 'required|exists:room_types,id',
        ]);
            
        $room = $room->open($room_type_id)->firstOrFail();
        
        $client_ = $client::firstOrCreate([
            'profile_id' => $profile->id
        ],[
            'profile_id' => $profile->id,
            'company' => 'No Company'
        ]);

        // return $request->checkin;

        $total_price = $this->calculateTotalPrice(
            $request->checkin->diffInDays($request->checkout),
            $room->type->base_price
        );

        $room->reservation()->create([
            "total_price" => $total_price,
            // "room_id" => $room->id,
            "client_id" => $client_->id,
            "checkin" => $request->checkin,
            "checkout" => $request->checkout,
            "description" => $reservation['message']
        ]);

        return redirect()->route('home');
    }

    public function calculateTotalPrice($days, $base_price)
    {
        return $days * $base_price;
    }
}
