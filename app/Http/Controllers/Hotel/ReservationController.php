<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\ClientHotelRoom;
use App\Models\Hotel;
use App\Models\HotelPhoto;
use App\Models\HotelRoom;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    public function index()
    {
        return view('hotel.reservation.index');
    }

    public function accept($id)
    {
        $reserve = ClientHotelRoom::find($id);
        if ($reserve){
            $reserve->status = 1 ;
            $reserve->save();
            $room = HotelRoom::find($reserve->hotel_room_id);
            $room->client_id = $reserve->client_id;
            $room->save();
            return redirect()->back()->with('status' , 'reservation accepted');
        }
        return redirect()->back()->with('status' , 'something error');
    }

    public function reject($id)
    {
        $reserve = ClientHotelRoom::find($id);
        if ($reserve){
            $reserve->status = 2 ;
            $reserve->save();
            $room = HotelRoom::find($reserve->hotel_room_id);
            $room->client_id = null;
            $room->save();
            return redirect()->back()->with('status' , 'reservation rejected');
        }
        return redirect()->back()->with('status' , 'something error');
    }
}
