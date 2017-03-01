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
Route::get('/', function() {
    return 'ok';
});
Route::resource('makers', 'MakersController', ['except' => ['store', 'edit']]);
Route::resource('vehicles', 'VehiclesController', ['only' => ['index']]);

Route::resource('makers.vehicles', 'MakersVehiclesController', ['except' => ['create', 'edit', 'show']]);