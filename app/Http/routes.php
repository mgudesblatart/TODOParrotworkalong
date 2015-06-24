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

Route::get('/about', 'AboutController@index');

Route::get('contact', ['as'=>'contact', 'uses' => 'AboutController@create']);

Route::post('contact', ['as'=>'contact_store', 'uses' => 'AboutController@store']);

Route::get('home', 'HomeController@index');

Route::resource('lists', 'ListsController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
