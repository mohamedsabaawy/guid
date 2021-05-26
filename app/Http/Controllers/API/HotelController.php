<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\HotelResource;
use App\Models\City;
use App\Models\Client;
use App\Models\Hotel;
use function App\Sabaawy\responseJson;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function city(Request $request)
    {

        $cities = City::where('country_id' , $request->country_id)->get();
        return responseJson('1' , 'fff' ,$cities);
    }

    public function index(Request $request)
    {
        if ($request->hotel_id){
            return new HotelResource(Hotel::hotel()->find($request->hotel_id));
        }
        return HotelResource::collection(Hotel::hotel()->paginate(PAGINATE));
    }

}
