<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = ['name' ,'details','hotel_id','price'];

    public function HotelRoom()
    {
        return $this->hasMany(HotelRoom::class,'type_id');
    }

    public function Hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
