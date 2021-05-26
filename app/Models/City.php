<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('country_id', 'user_id','name');

    public function Country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function Hotels()
    {
        return $this->hasMany('App\Models\Hotel');
    }

    public function Landmarks()
    {
        return $this->hasMany('App\Models\Landmark');
    }

}