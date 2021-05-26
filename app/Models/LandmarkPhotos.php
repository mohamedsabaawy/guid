<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandmarkPhotos extends Model 
{

    protected $table = 'landmark_photos';
    public $timestamps = true;
    protected $fillable = array('name', 'landmark_id');

    public function Landmark()
    {
        return $this->belongsTo('App\Models\Landmark');
    }

}