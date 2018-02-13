<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/wedstrijd', array(
    'as' => 'wedstrijd',
    'uses' => 'WedstrijdController@showLifts'
));

Route::get('/lifters', array(
    'as' => 'lifters',
    'uses' => 'LifterController@showLifters'
));