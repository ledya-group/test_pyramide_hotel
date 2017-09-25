<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use App\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Room $room)
    {
        if (request()->free) {
            $rooms = $room->available();

            return view('admin.rooms.free', compact('rooms'));
        }

        $room_categories = RoomType::with('rooms.hasNoActiveReservation')
                                ->withCount('rooms')
                                ->get();
        
        return view('admin.rooms.index', compact('room_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room_types = RoomType::all();

        return view('admin.rooms.create', ['room_types' => $room_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'room_type_id' => 'required|exists:room_types,id',
            'max_occupancy' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        Room::create([
            "code" => $request->code,
            "room_type_id" => $request->room_type_id,
            "max_occupancy" => $request->max_occupancy,
            "free" => true,
            "description" => $request->description
        ]);

        return redirect()->route('rooms.index')
            ->with('flash', 'La chambre a bel et bien ete creee');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $room_types = RoomType::all();

        return view('admin.rooms.edit', [
            'room' => $room,
            'room_types' => $room_types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        try{
            $room->update([
                "code" => request()->code,
                "room_type_id" => request()->id_room_type,
                "max_occupancy" => request()->max_occupancy,
                "description" => request()->description
            ]);
        } catch(\Exception $e) {}

        return redirect()->route('rooms.index')
            ->with('flash', 'La modification a ete faite.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        // $room = Room::findOrFail($id);
        $roomDeleted = $room->code;
        
        $room->delete();

        return redirect()->back()
            ->with('flash', "La chambre {$roomDeleted} a bien ete supprimee");
    }
}
