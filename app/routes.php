<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'LoginController@index'));

Route::get('login', array('uses' => 'LoginController@index'));

Route::post('login', array('uses' => 'LoginController@doLogin')); // route to process the form

Route::get('logout',array('uses' => 'loginController@doLogout'));

Route::group(array('prefix' => 'admin', 'before' =>'auth' ), function()
{
    Route::get('/index', 'HomeController@index');
    Route::resource('airlines', 'AirlinesController');
    Route::resource('airports', 'AirportsController');
    Route::resource('flightplans', 'FlightplansController');
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
});



















