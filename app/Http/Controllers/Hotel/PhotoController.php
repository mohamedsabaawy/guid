<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelPhoto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = HotelPhoto::where('hotel_id',Auth::guard('hotel')->id())->get();
        return view('hotel.photo.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'photos' => 'required'
        ]);

        if ($validation->fails()){
            return redirect()->back()->with('status' , 'error');
        }
//        dd($request->photos->store('hotelPhoto','public'));
        foreach ($request->photos as $photo)
        HotelPhoto::create([
            'name' => $photo->store('hotelPhoto','public'),
            'hotel_id' => Auth::guard('hotel')->id(),
        ]);
        return redirect(route('photo.index'))->with('status' , 'Photos uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelPhoto $Photo)
    {
//        return $Photo;
        Storage::disk('public')->delete($Photo->name);
        $Photo->delete();
        return redirect()->back()->with('status','photo deleted');
    }
}
