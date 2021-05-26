<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use function App\Sabaawy\responseJson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::hotel()->get();
       return view('backend/hotel/index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all()->pluck('name' , 'id');
        $hotel = Hotel::hotel()->get();
        return view('backend/hotel/create',compact('hotel','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRequest $request)
    {
//        return $request->all();
        Hotel::create([
            'name' => $request->name,
            'email' => $request->email,
            'city_id' => $request->city_id,
            'user_id' => Auth::id(),
            'password' => bcrypt($request->password),
        ]);
        return redirect(route('hotel.index'))->with('status','Hotel added success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return $hotel;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $cities = City::all();
        return view('backend/hotel/edit',compact('hotel','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        if ($request->password == null){
            $request->password = $hotel->password;
        }else{
            $request->password = bcrypt($request->password);
        }
        $hotel->update([
            'name' => $request->name,
            'email' => $request->email,
            'city_id' => $request->city_id,
            'user_id' => $request->user_id,
            'password' => $request->password,
        ]);
        return redirect(route('hotel.index'))->with('status','Hotel update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        Storage::disk('public')->delete($hotel->cover);
        $hotel->delete();
        return redirect(route('hotel.index'))->with('status','Hotel deleted success');
    }

}
