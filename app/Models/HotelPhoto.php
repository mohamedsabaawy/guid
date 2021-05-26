<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelPhoto extends Model 
{

    protected $table = 'hotel_photos';
    public $timestamps = true;
    protected $fillable = array('name', 'hotel_id');

    public function Hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

}