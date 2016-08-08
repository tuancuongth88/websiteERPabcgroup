<?php

class DashboardController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Common::sendMail();
		$userId = CommonUser::getUserId();
		$userRole = CommonUser::getUserRole();
		//task cong viec dang lam
		$listTask = TaskStatus::lists('id');
		$task = CommonTask::filterTask($listTask);
		//task duoc assign, cho dong y
		$taskAssign = Common::getModelUserStatus('tasks', 'task_users', 'task_id', $userId, ASSIGN_STATUS_3);
		//project duoc assign, cho dong y
		$projectAssign = Common::getModelUserStatus('projects', 'project_users', 'project_id', $userId, ASSIGN_STATUS_3);
		//deparement đươc assign, cho dong y
		// $depAssign = Common::getModelUserStatus('departments', 'dep_regency_per_user', 'dep_id', $userId, ASSIGN_STATUS_3);
		// ngay hien tai - 1 tuan <= date_active <= ngay hien tai
		$now = date('Y-m-d H:i:s');
		$weekback = date('Y-m-d 00:00:00', time() + (60 * 60 * 24 * +7));
		$listIdContract = Contract::whereRaw('id in (select MAX(id) as id From contracts GROUP BY name)')->lists('id');
		$contractExpired = Contract::where('date_expired_new', '<=', $weekback)->
		whereIn('id', $listIdContract)
			->lists('id');
		$contractExpired =  Contract::whereIn('id', $contractExpired)->where('date_expired_new', '>', $now)->get();
		if($userRole != ROLE_ADMIN) {
			$archive = Archive::join('archive_users', 'archive_users.archive_id', '=', 'archives.id')
					->select('archives.*')
					->where('archive_users.user_send', $userId)
					->orWhere('archive_users.user_receive', $userId)
					->distinct()->groupBy('archives.id')
					->limit(5)
					->get();
		} else {
			$archive = Archive::orderBy('id', 'desc')->limit(5)->get();
		}
		$countNotification = count($task) + count($taskAssign) + count($projectAssign) + count($contractExpired) + count($archive);
		Session::put('countNotification', $countNotification);
		return View::make('admin.dashboard.index')->with(compact('task', 'taskAssign', 'projectAssign', 'contractExpired', 'archive', 'countNotification'));
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
	public function getNotification(){
		$curentsession = Session::get('countNotification');
		$userId = CommonUser::getUserId();
		$userRole = CommonUser::getUserRole();
		//task cong viec dang lam
		$listTask = TaskStatus::lists('id');
		$task = CommonTask::filterTask($listTask);
		//task duoc assign, cho dong y
		$taskAssign = Common::getModelUserStatus('tasks', 'task_users', 'task_id', $userId, ASSIGN_STATUS_3);
		//project duoc assign, cho dong y
		$projectAssign = Common::getModelUserStatus('projects', 'project_users', 'project_id', $userId, ASSIGN_STATUS_3);
		//deparement đươc assign, cho dong y
		// $depAssign = Common::getModelUserStatus('departments', 'dep_regency_per_user', 'dep_id', $userId, ASSIGN_STATUS_3);
		// ngay hien tai - 1 tuan <= date_active <= ngay hien tai
		$now = date('Y-m-d H:i:s');
		$weekback = date('Y-m-d 00:00:00', time() + (60 * 60 * 24 * +7));
		$listIdContract = Contract::whereRaw('id in (select MAX(id) as id From contracts GROUP BY name)')->lists('id');
		$contractExpired = Contract::where('date_expired_new', '<=', $weekback)->
		whereIn('id', $listIdContract)
			->lists('id');
		$contractExpired =  Contract::whereIn('id', $contractExpired)->where('date_expired_new', '>', $now)->get();
		if($userRole != ROLE_ADMIN) {
			$archive = Archive::join('archive_users', 'archive_users.archive_id', '=', 'archives.id')
					->select('archives.*')
					->where('archive_users.user_send', $userId)
					->orWhere('archive_users.user_receive', $userId)
					->distinct()->groupBy('archives.id')
					->limit(5)
					->get();
		} else {
			$archive = Archive::orderBy('id', 'desc')->limit(5)->get();
		}
		$countNotification = count($task) + count($taskAssign) + count($projectAssign) + count($contractExpired) + count($archive);
		Session::put('countNotification', $countNotification);
		return Response::json($countNotification + $curentsession);
	}

}
