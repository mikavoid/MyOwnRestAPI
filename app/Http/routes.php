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
Route::group(['middleware' => 'auth'], function () {

});
Route::group(['prefix' => 'api/v1', 'middleware' => 'auth.basic'], function () {
    Route::resource('makers', 'MakersController', ['except' => ['edit']]);
});
Route::resource('vehicles', 'VehiclesController', ['only' => ['index']]);

Route::resource('makers.vehicles', 'MakersVehiclesController', ['except' => ['create', 'edit']]);
Route::auth();

Route::get('/home', 'HomeController@index');
