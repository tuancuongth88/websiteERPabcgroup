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
	Route::get('/management/search/', array('uses' => 'ManagementController@search'));
	Route::get('/management/respassword/{id}', array('uses' => 'ManagementController@resPassword',  'as' => 'resPassword'));
	Route::post('/management/updatePassword/{id}', array('uses' =>'ManagementController@updatePassword', 'as' => 'updatePassword'));
	Route::post('/management/assignDepartmentUser', 'ManagementController@assignDepartmentUser');
	// Route của ajax manager
	Route::post('/management/loadRegency', 'ManagementController@loadRegency');
	Route::resource('/management', 'ManagementController');
	// search
	Route::get('/deparment/search', array('uses' => 'DeparmentController@search'));
	Route::resource('/deparment', 'DeparmentController');
	
	Route::resource('/regency', 'RegencyController');
	Route::resource('/resouce', 'ResouceController');

	Route::post('/comment/{modelName}/{modelId}', 'CommentController@comment');

	//quan ly du an
	Route::get('/project/search', 'ProjectController@search');
	Route::post('/project/assignProjectUser', 'ProjectController@assignProjectUser');
	Route::get('/project/accept/{id}', 'ProjectController@accept');
	Route::get('/project/refuse/{id}', 'ProjectController@refuse');
	Route::resource('/project', 'ProjectController');
	//trang thai du an
	Route::resource('/projectStatus', 'ProjectStatusController');
	//quan ly vai tro
	Route::resource('/tempRole', 'TempRoleController');
	//task
	Route::get('/task/search', 'TaskController@search');
	Route::post('/task/assignTaskUser', 'TaskController@assignTaskUser');
	Route::get('/task/filter/{status}', 'TaskController@filter');
	Route::post('/task/comment/{modelId}', 'TaskController@comment');
	Route::get('/task/accept/{id}', 'TaskController@accept');
	Route::get('/task/refuse/{id}', 'TaskController@refuse');
	Route::resource('/task', 'TaskController');

	Route::get('/report/search', 'ReportController@search');
	Route::post('/report/assignReportUser', 'ReportController@assignReportUser');
	Route::resource('/report', 'ReportController');

	Route::resource('/dashboard', 'DashboardController');
	Route::resource('/type_report', 'TypeReportController');


	// Route::resource('/comment', 'CommentController');
});
// Route::group(
// 	['prefix' => 'user'], function(){
// 		Route::get('/login', array('uses' => 'UserController@login', 'as' => 'user.login'));

// 	}
// );