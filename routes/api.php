<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// states endppoints
Route::group(['prefix' => 'states'], function () {
    Route::get('/', 'Api\Controller@index');
    Route::get('/{state}', 'Api\Controller@state')->name('api.states.show');
    Route::get('/{state}/cities', 'Api\Controller@cities');
    Route::get('/{state}/lgas', 'Api\Controller@lgas');
});

// lgas endpoints
Route::get('lgas', 'Api\Controller@localGovAreas');
Route::get('lgas/{lga}', 'Api\Controller@showLga')->name('api.lgas.show');
