<?php

namespace App\Models;

//use App\Http\Middleware\Authenticate;
use http\Client\Curl\User;
use function App\Sabaawy\responseJson;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Client extends Authenticatable implements JWTSubject
{


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
//            auth()->login(auth('api')->user()),
        ];
    }
    protected $guard = 'hotel';
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'cover' , 'phone','city_id');
    protected $hidden = ['password'];

    public function HotelRooms()
    {
        return $this->belongsToMany('App\Models\HotelRoom')->withTimestamps();
    }

    public function Reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function City(){
        return $this->belongsTo(City::class);
    }

}
