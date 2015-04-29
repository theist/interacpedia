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

Route::get('/', 'PagesController@index');
//Route::get('home', 'HomeController@index');

Route::get('profile/{userid?}', 'UserController@profile');
/**
 * PagesController - Static routes
 */
Route::get('terms-of-use','PagesController@terms');
Route::get('privacy-policy','PagesController@privacy');

/**
 * Resource routes
 */
Route::resource('challenges','ChallengesController');

/**
 * Authentication routes
 */
//Route::get('auth/facebook');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
