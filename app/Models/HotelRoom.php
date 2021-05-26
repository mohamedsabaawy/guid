<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{

    protected $table = 'hotel_rooms';
    public $timestamps = true;
    protected $fillable = array('name', 'hotel_id', 'client_id','type_id');

    public function scopeRoom($query)
    {
        return $query->where('hotel_id',auth('hotel')->id());
    }

    public function Hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    public function Clients()
    {
        return $this->belongsToMany('App\Models\Client')
            ->withPivot('start_at','end_at','price','status','id')->withTimestamps();
    }

    public function RoomType()
    {
        return $this->belongsTo(RoomType::class,'type_id','id');
    }

}
