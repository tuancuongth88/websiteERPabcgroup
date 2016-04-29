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

// Route::get('/', function()
// {
// 	return View::make('hello');
// });
Route::group(['prefix' => 'admin'], function () {
	Route::get('/login', array('uses' => 'AdminController@login', 'as' => 'admin.login'));
	Route::post('/login', array('uses' => 'AdminController@doLogin'));
	Route::get('/logout', array('uses' => 'AdminController@logout',  'as' => 'admin.logout'));
	Route::resource('/', 'AdminController');
	Route::resource('/management', 'ManagementController');
	Route::resource('/deparment', 'DeparmentController');
	Route::resource('/regency', 'RegencyController');
	Route::resource('/resouce', 'ResouceController');
	Route::resource('/project', 'ProjectController');
});
// Route::group(
// 	['prefix' => 'user'], function(){
// 		Route::get('/login', array('uses' => 'UserController@login', 'as' => 'user.login'));

// 	}
// );