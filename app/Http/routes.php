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
Route::get('home', 'PagesController@index');
Route::get('how-it-works', 'PagesController@howitworks');
Route::get('about-us', 'PagesController@about');

/**
 * PagesController - Static routes
 */
Route::get('terms-of-use','PagesController@terms');
Route::get('privacy-policy','PagesController@privacy');

Route::get('user/profile', 'UserController@profile');
Route::get('user/companies', 'UserController@companies');
Route::get('user/{user}/edit', 'UserController@edit');
Route::get('user/{user}/{option}', 'UserController@profile');

Route::get('user/completecategory', 'UserController@completecategory');
Route::get('user/completecity', 'UserController@completecity');
Route::get('user/completeoccupations', 'UserController@completeoccupations');


/**
 * Resource routes
 */
Route::resource('user','UserController');
Route::resource('challenges','ChallengesController');
Route::resource('comments','CommentsController');
Route::resource('likes','LikesController');
Route::resource('follows','FollowsController');
Route::resource('groups','GroupsController');
Route::post('groups/adduser','GroupsController@adduser');
Route::resource('stories','StoriesController');
Route::resource('projects','ProjectsController');
Route::resource('partners','PartnersController');
Route::resource('mentors','MentorsController');
Route::resource('coordinators','CoordinatorsController');
Route::resource('courses','CourseController');
Route::resource('companies','CompaniesController');
Route::resource('messages','MessagesController');
Route::resource('blogs','BlogController');
Route::post('upload','UploadController@store');

Route::get('challenges/{challenge}/{option}', 'ChallengesController@show');
/**
 * Authentication routes
 */
//Route::get('auth/facebook');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

