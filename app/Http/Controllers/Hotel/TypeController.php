<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Hotel;
use App\Models\HotelPhoto;
use App\Models\HotelRoom;
use App\Models\RoomType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = RoomType::where('hotel_id' , Auth::guard('hotel')->id())->get();
        return view('hotel.roomType.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.roomType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $room = RoomType::create([
           'name'=>$request->name,
           'details'=>$request->details,
           'price'=>$request->price,
           'hotel_id'=>$request->user()->id,
        ]);
        return redirect()->route('type.index')->with('status' , 'add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
//        $room = HotelRoom::find($id);
//        $last = $room->Clients->where('id' , $room->client_id)->last();
////        return $last;
//        return view('hotel.room.show',compact('room','last'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = RoomType::find($id);
        return view('hotel.roomType.edit',compact('type'));
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
        $type = RoomType::find($id);
        $type->update([
            'name'=>$request->name,
            'details'=>$request->details,
            'price'=>$request->price,
        ]);
        return redirect()->route('type.index')->with('status' , 'room type updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = RoomType::find($id);
        $type->delete();
        return redirect()->back()->with('status','room type deleted');
    }
}
