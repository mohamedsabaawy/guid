<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model 
{

    protected $table = 'reviews';
    public $timestamps = true;
    protected $fillable = array('comment', 'review', 'hotel_id', 'client_id');

    public function Hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    public function Client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}