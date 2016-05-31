<?php

class DashboardController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userId = CommonUser::getUserId();
		//task cong viec dang lam
		$task = CommonTask::filterTask(TASK_STATUS_1);
		//task duoc assign, cho dong y
		$taskAssign = Common::getModelUserStatus('tasks', 'task_users', 'task_id', $userId, ASSIGN_STATUS_3);
		//project duoc assign, cho dong y
		$projectAssign = Common::getModelUserStatus('projects', 'project_users', 'project_id', $userId, ASSIGN_STATUS_3);
		//deparement đươc assign, cho dong y
		// $depAssign = Common::getModelUserStatus('departments', 'dep_regency_per_user', 'dep_id', $userId, ASSIGN_STATUS_3);
		return View::make('admin.dashboard.index')->with(compact('task', 'taskAssign', 'projectAssign'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
