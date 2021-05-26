<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Hotel::restaurant()->get();
        return view('front.restaurant.index',compact('restaurants'));
    }


    public function show(Hotel $restaurant)
    {
        $types = $restaurant->RoomTypes;
        return view('front.restaurant.show',compact('restaurant','types'));
    }
}
