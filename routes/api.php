<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'API' , 'prefix'=>'v1'],function (){
    Route::get('/register','ClientController@registerr');
    Route::post('/login','ClientController@login'); ///api/v1/login
    Route::post('/city','HotelController@city'); ///api/v1/city/

    Route::group(['middleware' => 'auth:api'],function (){
        Route::post('clients' ,'ClientController@index');
        Route::post('hotel' ,'HotelController@index');
    });
});
