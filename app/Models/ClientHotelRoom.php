<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClientHotelRoom extends Pivot
{
    public $timestamps = true;
    protected $fillable = array('client_id', 'hotel_room_id','start_at','end_at','price');
}
