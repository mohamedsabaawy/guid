<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';
    public $timestamps = true;
    protected $fillable = array('name', 'user_id');

    public function Cities()
    {
        return $this->hasMany('App\Models\City');
    }

//    public function test()
//    {
//        return $this->hasManyThrough(Hotel::class ,City::class,'country_id','city_id');
//    }

}
