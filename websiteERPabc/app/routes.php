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

	Route::post('/management/assignFunPerUser', 'ManagementController@assignFunPerUser');
	Route::get('/management/changepermission/{id}', array('uses' =>'ManagementController@changePermissionUser', 'as' => 'changepermission'));
	Route::post('/management/changepermission/{id}', array('uses' => 'ManagementController@doChangePermissionUser'));
	Route::get('/management/accept/{id}', 'ManagementController@accept');
	Route::get('/management/refuse/{id}', 'ManagementController@refuse');
	Route::get('/management/createadmin/', array('uses' => 'ManagementController@createadmin', 'as'  => 'createadmin'));
	Route::post('/management/createadmin/', array('uses' => 'ManagementController@doCreateadmin'));
	Route::get('/management/showadmin/{id}', array('uses' => 'ManagementController@showadmin', 'as'  => 'showadmin'));
	Route::get('/management/updateadmin/{id}', array('uses' => 'ManagementController@updateadmin', 'as'  => 'updateadmin'));
	Route::post('/management/doUpdateadmin/{id}', array('uses' => 'ManagementController@doUpdateadmin', 'as' => 'doUpdateadmin'));
	Route::get('/management/search/', array('uses' => 'ManagementController@search'));
	Route::get('/management/respassword/{id}', array('uses' => 'ManagementController@resPassword',  'as' => 'resPassword'));
	Route::post('/management/updatePassword/{id}', array('uses' =>'ManagementController@updatePassword', 'as' => 'updatePassword'));
	Route::post('/management/assignDepartmentUser', 'ManagementController@assignDepartmentUser');
	// Route của ajax manager
	Route::post('/management/loadButton', 'ManagementController@loadButton');
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
	//trang thai cong viec
	Route::resource('/taskStatus', 'TaskStatusController');

	Route::get('/report/search', 'ReportController@search');
	Route::post('/report/assignReportUser', 'ReportController@assignReportUser');
	Route::post('/report/getFormatTypeReport', 'ReportController@getFormatTypeReport');
	Route::resource('/report', 'ReportController');
	Route::resource('/notification', 'NotificationController');

	Route::resource('/dashboard', 'DashboardController');
	Route::resource('/type_report', 'TypeReportController');
	
	Route::resource('/type_notification', 'TypeNotificationController');

//  Quản lý thể loại nhân viên
	Route::resource('/user_type', 'UserTypeController');
	// Quản lý tiền lương
	Route::get('search/autocomplete', 'SearchController@autocomplete');
	Route::get('/salary/searchabc', 'SalaryUserController@searchabc');
	Route::get('/salary/createAll', 'SalaryUserController@createAll');
	Route::post('/salary/storeAll', 'SalaryUserController@storeAll');
	Route::post('/salary/getFormatTypeSalary', 'SalaryUserController@getFormatTypeSalary');
	Route::post('/salary/ajax/getUser', 'SalaryUserController@ajaxGetUser');
	Route::post('/salary/ajax/getDetailUser', 'SalaryUserController@getDetailUser');
	Route::get('/salary/old/employee', 'SalaryUserController@createOld');
	Route::post('/salary/old/employee', 'SalaryUserController@storeOld');
	Route::get('/salary/old/index', 'SalaryUserController@indexOld');
	// quan ly lich su luong nhan vien
	Route::resource('/salary/history', 'SalaryHistoryUserController');
	Route::resource('/salary', 'SalaryUserController');
	// Route::resource('/comment', 'CommentController');
	// danh sach de xuat luong
	Route::resource('/propose', 'ProposeSalaryListController');


});
// Route::group(
// 	['prefix' => 'user'], function(){
// 		Route::get('/login', array('uses' => 'UserController@login', 'as' => 'user.login'));

// 	}
// );