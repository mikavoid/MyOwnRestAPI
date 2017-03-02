<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\JsonResponse;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

Route::group(['middleware' => 'auth'], function () {

});
Route::group(['prefix' => 'api/v1', 'middleware' => 'oauth'], function () {
    Route::resource('makers', 'MakersController', ['except' => ['edit']]);
    Route::resource('vehicles', 'VehiclesController', ['only' => ['index']]);
    Route::resource('makers.vehicles', 'MakersVehiclesController', ['except' => ['create', 'edit']]);

    Route::get('ville/{ville}/restos',  'YelpController@restos');
    Route::get('ville/{ville}/events',  'YelpController@events');
    Route::get('ville/{ville}/cinemas', 'CinemaController@index');
    Route::get('ville/{ville}/meteo',   'MeteoController@index');
});

Route::post('api/v1/oauth/access_token', function() {
    return JsonResponse::create(Authorizer::issueAccessToken());
});

Route::auth();

Route::get('/home', 'HomeController@index');
