<?php

use Illuminate\Support\Facades\Route;

define('STORAGE', 'public/');
define('PAGINATE', 1);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front.welcome');
})->name('front.welcome');
Route::group(['namespace' => 'Front'], function () {
    //hotel front end routes for client
    Route::group(['prefix' => 'hotels'],function (){
        Route::get('/', 'HotelController@index')->name('front.hotel.index');  ////show all hotels for client
        Route::get('/{hotel}', 'HotelController@show')->name('front.hotel.show');  ///show one hotel for client
    });
    //hotel front end routes for client
    Route::group(['prefix' => 'restaurants'],function (){
        Route::get('/', 'RestaurantController@index')->name('front.restaurant.index');  ////show all restaurants for client
        Route::get('/{restaurant}', 'RestaurantController@show')->name('front.restaurant.show');  ///show one restaurant for client
    });

    //client routes
    Route::group([],function(){
        Route::get('client/register' , 'ClientController@registerForm')->name('client.form.register')->middleware('guest:client');
        Route::post('client/register' , 'ClientController@register')->name('client.register');
        Route::get('client/login' , 'ClientController@loginForm')->name('client.form.login')->middleware('guest:client');
        Route::post('client/login' , 'ClientController@login')->name('client.login');
        Route::post('client/logout' , 'ClientController@logout')->name('client.logout');
        Route::post('client/room' , 'ClientController@room')->name('room1');
    });

});

Auth::routes();

//----------------------admin routes----------------//

Route::get('/admin', 'HomeController@index')->name('home');
Route::group(['namespace' => 'BackEnd', 'middleware' => 'auth', 'prefix' => '/admin'], function () {
    Route::resource('/country', 'CountryController');
    Route::resource('/city', 'CityController');
    Route::resource('/hotel', 'HotelController');
    Route::resource('/restaurant', 'RestaurantController');
});

Route::group(['prefix' => '/home', 'namespace' => 'Hotel'], function () {
    Route::get('/login', 'HotelController@loginForm')->name('hotel.login.form')->middleware('guest:hotel');
    Route::post('/login', 'HotelController@login')->name('hotel.login')->middleware('guest:hotel');


    //----------------------hotel admin routes----------------//


    Route::group(['middleware' => 'auth:hotel'], function () {
        Route::get('/', 'HotelController@index')->name('hotel');
        Route::get('/profile', 'HotelController@profile')->name('hotel.profile');
        Route::post('/profile', 'HotelController@update')->name('hotel.profile.update');
        Route::post('/logout', 'HotelController@logout')->name('hotel.logout');
        Route::resource('photo', 'PhotoController');
        Route::resource('room', 'RoomController');
        Route::resource('type', 'TypeController');
        Route::get('reserve','ReservationController@index')->name('hotel.reserve');
        Route::get('reserve/accept/{id}','ReservationController@accept')->name('hotel.reserve.accept');
        Route::get('reserve/reject/{id}','ReservationController@reject')->name('hotel.reserve.reject');
    });


});
