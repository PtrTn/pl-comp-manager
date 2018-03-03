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

Route::get('/organisatie', array(
    'as' => 'organisatie',
    'uses' => 'OrganisatieController@showLifters'
));

Route::get('/organisatie/delete/{lifter}', array(
    'as' => 'delete.lifter',
    'uses' => 'OrganisatieController@deleteLifter'
));

Route::get('/scheidsrechter', array(
    'as' => 'scheidsrechter',
    'uses' => 'ScheidsrechterController@showWedstrijd'
));

Route::post('/scheidsrechter', array(
    'as' => 'scheidsrechter.approveLift',
    'uses' => 'ScheidsrechterController@approveLift'
));

Route::get('/laders', array(
    'as' => 'laders',
    'uses' => 'LadersController@showWedstrijd'
));