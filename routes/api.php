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

Route::group(['prefix' => 'states'], function () {
    Route::get('/', 'ApiController@index');
    Route::get('/{state}', 'ApiController@state')->name('api.states.show');
    Route::get('/{state}/cities', 'ApiController@cities');
    Route::get('/{state}/lgas', 'ApiController@lgas');
});
