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


/**
 * Home Page
 */
Route::get('/', 'PagesController@home');

/**
 * Profile
 */
Route::get('profiles/edit', 'ProfilesController@edit');
Route::get('profiles/create', 'ProfilesController@create');
Route::get('profiles/{profiles}', 'ProfilesController@show');
Route::post('profiles/store', 'ProfilesController@store');
Route::patch('profiles/{profiles}', 'ProfilesController@update');
Route::patch('profiles/{profiles}/image', 'ProfilesController@updateImage');

/**
 * Matches
 */
Route::get('matches', 'MatchesController@index');
Route::get('matches/{sort}', 'MatchesController@index');

/**
 * Messages
 */
Route::get('messages/{id}/create', 'MessagesController@create');
Route::get('messages', 'MessagesController@index');
Route::post('messages/store', 'MessagesController@store');
Route::patch('messages/{messages}', 'MessagesController@update');

/**
 * Authentication
 */
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/**
 * Github Login
 */
Route::get('login/github', 'AuthController@login');
