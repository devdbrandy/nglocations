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
    Route::get('/', 'Api\Controller@getStates');
    Route::get('/{state}', 'Api\Controller@getState')->name('api.states.show');
    Route::get('/{state}/cities', 'Api\Controller@getCities');
    Route::get('/{state}/lgas', 'Api\Controller@getLgas');
});

// lgas endpoints
Route::get('lgas', 'Api\Controller@getLgasAll');
Route::get('lgas/{lga}', 'Api\Controller@getLga')->name('api.lgas.show');
