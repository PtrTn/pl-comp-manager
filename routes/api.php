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

Route::post('/lift', array(
    'as' => 'lift',
    'uses' => 'WedstrijdApiController@updateLift'
));

Route::post('/lifter', array(
    'as' => 'lifter',
    'uses' => 'LifterApiController@updateLifter'
));
Route::post('/lifter/add', array(
    'as' => 'add.lifter',
    'uses' => 'LifterApiController@addLifter'
));