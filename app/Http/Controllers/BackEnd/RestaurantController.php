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

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd('kmml');
        $restaurants = Hotel::restaurant()->get();
        return view('backend/restaurant/index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all()->pluck('name', 'id');
        $restaurant = Hotel::restaurant()->get();
        return view('backend/restaurant/create', compact('restaurant', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRequest $request)
    {
//        return $request->all();
        Hotel::create([
            'name' => $request->name,
            'email' => $request->email,
            'city_id' => $request->city_id,
            'restaurant' => 1,
            'user_id' => Auth::id(),
            'password' => bcrypt($request->password),
        ]);
        return redirect(route('restaurant.index'))->with('status', 'Restaurant added success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $restaurant)
    {
        return $restaurant;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $restaurant)
    {
        $countries = Country::all()->pluck('name' ,'id');
        $city = $restaurant->city()->pluck('name' , 'id');
        return view('backend/restaurant/edit', compact('restaurant', 'countries','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $restaurant)
    {
        if ($request->password == null) {
            $request->password = $restaurant->password;
        } else {
            $request->password = bcrypt($request->password);
        }
        $restaurant->update([
            'name' => $request->name,
            'email' => $request->email,
            'city_id' => $request->city_id,
            'user_id' => $request->user()->id,
            'password' => $request->password,
        ]);
        return redirect(route('restaurant.index'))->with('status', 'Restaurant update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $restaurant)
    {
        Storage::disk('public')->delete($restaurant->cover);
        $restaurant->delete();
        return redirect(route('restaurant.index'))->with('status', 'Restaurant deleted success');
    }

}
