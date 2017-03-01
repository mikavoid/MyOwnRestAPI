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

Route::resource('vehicles', 'VehiclesController', ['except' => ['store', 'edit']]);
Route::resource('makers', 'MakersController', ['only' => ['index']]);

Route::resource('makers.vehicles', 'MakersVehiclesController', ['except' => ['create', 'edit', 'show']]);