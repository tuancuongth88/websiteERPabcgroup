<?php

class DashboardController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user()->get();
		if($user) {
			$userId = $user->id;
		} else {
			$userId = NULL;
		}
		//task cong viec dang lam
		$task = CommonTask::filterTask(TASK_STATUS_1);
		//task duoc assign, cho dong y
		$taskAssign = Common::checkModelUserStatus('tasks', 'task_users', 'task_id', $userId, ASSIGN_STATUS_3);
		//project duoc assign, cho dong y
		$projectAssign = Common::checkModelUserStatus('projects', 'project_users', 'project_id', $userId, ASSIGN_STATUS_3);
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
