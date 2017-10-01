<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use App\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = RoomType::with('rooms')->latest()->get();

        // return RoomType::with('rooms')->get();
        return view('admin.room_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.room_categories.create');
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
            'name' => 'required|string',
            'base_price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        RoomType::create([
            "name" => $request->name,
            "base_price" => $request->base_price,
            "description" => $request->description
        ]);

        return redirect()->route('rooms.index')
            ->with('flash', "La categorie {$request->name} a bel et bien ete creee.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $category)
    {
        return view('admin.room_categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomType $category)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'base_price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        try{
            $category->update([
                "name" => request()->name,
                "base_price" => request()->base_price,
                "description" => request()->description
            ]);
        } catch(\Exception $e) {}

        return redirect()->route('rooms.index')
            ->with('flash', "La categorie <em>{$category->name}</em> a ete modifie.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $category, Room $room)
    {
        $categoryDeleted = $category->name;

        $category->delete();

        return redirect()->back()
            ->with('flash', "La categorie {$categoryDeleted} a bel et bien ete supprimee, ainsi que les chambres qui lui sont liees.");
    }
}
