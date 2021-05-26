<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Hotel;
use App\Models\HotelPhoto;
use App\Models\HotelRoom;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = HotelRoom::room()->get();
        return view('hotel.room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Auth::guard('hotel')->user()->RoomTypes;
        return view('hotel.room.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $room = HotelRoom::create([
           'name'=>$request->name,
           'hotel_id'=>$request->user()->id,
           'type_id'=>$request->type_id,
        ]);
        return redirect()->route('room.index')->with('status' , 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $room = HotelRoom::find($id);
        $last = $room->Clients->where('id' , $room->client_id)->last();
//        return $last;
        return view('hotel.room.show',compact('room','last'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = HotelRoom::find($id);
        $types = Auth::guard('hotel')->user()->RoomTypes;
        return view('hotel.room.edit',compact('room','types'));

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
        $room = HotelRoom::find($id);
        $room->update([
            'name'=>$request->name,
            'type_id'=>$request->type_id,
        ]);
        return redirect()->route('room.index')->with('status' , 'room updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $room = HotelRoom::find($id);
        $room->delete();
        return redirect()->back()->with('status','room deleted');
    }
}
