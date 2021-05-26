<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::hotel()->get();
        return view('front.hotel.index',compact('hotels'));
    }


    public function show(Hotel $hotel)
    {
        $types = $hotel->RoomTypes;
        return view('front.hotel.show',compact('hotel','types'));
    }
}
