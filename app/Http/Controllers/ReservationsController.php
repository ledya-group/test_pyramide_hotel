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

    public function store(Request $request, Reservation $reservation, Client $client, Profile $profile, RoomType $roomType)
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

        $profile_id = ($profile::firstOrCreate([
            'email' => $client_profile['email'],
            'first_name' => $client_profile['firstname'],
        ], $client_profile))->id;

        $reservation = request()->validate([
            // 'occupant' => 'required|numeric',
            'checkin' => 'required|date_format:d/m/Y',
            'checkout' => 'required|date_format:d/m/Y|after_or_equal:checkin',
            'room' => 'required|exists:room_types',
            'message' => 'nullable|string'
        ]);

        $reseration = new Reservation([
            'room_id' => $data['room'],
            'checkin' => $data['checkin'],
            'checkout' => $data['checkout'],
            'description' => $data['message'],
            'paid' => $data['message']
        ]);

        $room = $room::where('room_type_id', $room_type_id)->open()->firstOrFail();
        
        $client_id = $client::firstOrCreate([
            'profile_id' => $profile_id
        ],[
            'profile_id' => $profile_id,
            'company' => 'No Company'
        ]);

        $total_price = $this->calculateTotalPrice(
            $checkin->diffInDays($checkout),
            $room->type->base_price
        );

        $room->reservation()->create([
            "total_price" => $total_price,
            // "room_id" => $room->id,
            "client_id" => $client_id,
            "checkin" => $request()->checkin,
            "checkout" => $request()->checkout,
            "description" => $reservation['message']
        ]);

        return redirect()->route('home');
    }

    public function calculateTotalPrice($days, $base_price)
    {
        return $days * $base_price;
    }
}
