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
Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::group(['prefix' => 'users'], function(){
	Route::get('type/{type?}', 'UsersController@getType');
	Route::get('print', 'UsersController@printNameEmail');
	Route::get('show/{id}', 'UsersController@showUser');
	Route::get('gender/{gender?}', 'UsersController@getGender');
	Route::get('mail-list', 'UsersController@getUserActiveEmail');
	Route::get('adult', 'UsersController@getAdultUsers');
});
Route::controllers([
	'users'    => 'UsersController',
	'auth'     => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('examples', function(){
	$user = 'Luis';
	return view('examples.template', compact('user'));
});
