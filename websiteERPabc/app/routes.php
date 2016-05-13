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
	Route::post('/management/assignDepartmentUser', 'ManagementController@assignDepartmentUser');
	// Route của ajax manager
	Route::post('/management/loadUserFunction', 'ManagementController@loadUserFunction');
	Route::resource('/management', 'ManagementController');
	// search
	Route::get('/deparment/search', array('uses' => 'DeparmentController@search'));
	Route::resource('/deparment', 'DeparmentController');
	
	Route::resource('/regency', 'RegencyController');
	Route::resource('/resouce', 'ResouceController');
	//quan ly du an
	Route::get('/project/search', 'ProjectController@search');
	Route::post('/project/assignProjectUser', 'ProjectController@assignProjectUser');
	Route::resource('/project', 'ProjectController');
	//trang thai du an
	Route::resource('/projectStatus', 'ProjectStatusController');
	//quan ly vai tro
	Route::resource('/tempRole', 'TempRoleController');
	//task
	Route::get('/task/search', 'TaskController@search');
	Route::post('/task/assignTaskUser', 'TaskController@assignTaskUser');
	Route::resource('/task', 'TaskController');
});
// Route::group(
// 	['prefix' => 'user'], function(){
// 		Route::get('/login', array('uses' => 'UserController@login', 'as' => 'user.login'));

// 	}
// );