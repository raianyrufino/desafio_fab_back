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

// Routes to flights
Route::post('flights', 'App\Http\Controllers\FlightController@register');
Route::put('flights/{id}', 'App\Http\Controllers\FlightController@update');
Route::get('flights', 'App\Http\Controllers\FlightController@getAll');

// Routes to Location
Route::post('locations', 'App\Http\Controllers\LocationController@register');
Route::get('locations', 'App\Http\Controllers\LocationController@getAll');