<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landmark extends Model 
{

    protected $table = 'landmarks';
    public $timestamps = true;
    protected $fillable = array('name', 'details', 'cover', 'city_id', 'user_id', 'latitude', 'longitude');

    public function Photos()
    {
        return $this->hasMany('App\Models\LandmarkPhotos');
    }

    public function City()
    {
        return $this->belongsTo('App\Models\City');
    }

}