<?php
class Common {
	public static function getComment($modelName, $modelId)
	{
		$comments = Comment::where('model_id', $modelId)
			->where('model_name', $modelName)
			->orderBy('created_at', 'desc')
			->get();
		return $comments;
	}
	public static function insertComment($modelName, $modelId, $input)
	{
		$comment['model_name'] = $modelName;
		$comment['model_id'] = $modelId;
		$comment['description'] = $input['description'];
		$comment['user_id'] = Auth::user()->get()->id;
		$comment['status'] = $input['status'];
		return Comment::create($comment)->id;
	}
	public static function getDateTimeString($datetime, $option = null)
	{
		if(!empty($datetime)) {
			if($option) {
				$date = date('d-m-Y H:i:s', strtotime($datetime));	
			} else {
				$date = date('d-m-Y', strtotime($datetime));
			}
			return $date;	
		}
		return '';
	}
	public static function checkUserFunction($functionId)
	{
		// $user = Auth::user()->get();
		// if($user) {
		// 	if ($user->role_id == ROLE_ADMIN) {
		// 		return true;
		// 	}
		// 	$dep = DepRegencyPerFun::where('user_id', $user->id)
		// 			->groupBy('dep_id')
		// 			->lists('dep_id');
		// 	if($dep) {
		// 		$func = DepartmentFunction::whereIn('dep_id', $dep)
		// 					->groupBy('function_id')
		// 					->lists('function_id');
		// 		if(in_array($functionId, $func)) {
		// 			return true;
		// 		}
		// 	}
		// }
		// return false;
	}
	public static function getModelUserStatus($model1, $model2, $relateField, $userId, $status)
	{
		$data = DB::table($model1)->join($model2, $model2.'.'.$relateField, '=', $model1.'.id')
			->select($model1.'.*')
			->where($model2.'.user_id', $userId)
			->where($model2.'.status', $status)
			->get();
		if($data) {
			return $data;
		}
		return null;
	}
	public static function checkModelUserFunction($modelName, $modelId, $field)
	{
		$user = Auth::user()->get();
		if($user) {
			if($user->role_id == ROLE_ADMIN) {
				return true;
			}
			$data = $modelName::where($field, $modelId)
				->where('user_id', $user->id)
				->where('status', ASSIGN_STATUS_1)
				->first();
			if($data) {
				$perId = $data->per_id;
				if($perId == PERMISSION_1) {
					return true;
				} else {
					return false;
				}
			}
		}
		return false;
	}
	public static function checkModelUserStatus($modelName, $modelId, $field)
	{
		$user = Auth::user()->get();
		if($user) {
			if($user->role_id == ROLE_ADMIN) {
				return ASSIGN_STATUS_1;
			}
			$data = $modelName::where($field, $modelId)
				->where('user_id', $user->id)
				->first();
			if($data) {
				return $data->status;
			}
		}
		return NULL;
	}
	public static function checkPermissionUser($funId, $buttonId)
	{
		$userId = CommonUser::getUserId();
		$userRole = CommonUser::getUserRole();
		if ($userRole == ROLE_ADMIN) {
			return true;
		}
		if ($userRole == ROLE_USER) {
			$check = FunButtonUser::where('user_id', $userId)
				->where('button_id', $buttonId)
				->where('fun_id', $funId)
				->first();
			if ($check) {
				return true;
			}
			return false;
		}
	}	
	public static function getListTask($taskId)
	{
		return Task::where('id', '!=', $taskId)->lists('name', 'id');
	}
	public static function getUserIdByUserName($username)
	{
		$user = User::where('username', $username)->first();
		if ($user) {
			return $userId = $user->id;
		}
		return null;
	}
	public static function sendNotification()
	{
		// lay thong tin id va role
		$userId = CommonUser::getUserId();
		$userRole = CommonUser::getUserRole();
		//lấy ngày tháng hiện tại
		$now = date('Y-m-d H:i:s');
		$weekback = date('Y-m-d 00:00:00', time() + (60 * 60 * 24 * +7));
		//load taonf bị các thông báo
		$task = CommonTask::filterTask($listTask);
		$taskAssign = Common::getModelUserStatus('tasks', 'task_users', 'task_id', $userId, ASSIGN_STATUS_3);
		$projectAssign = Common::getModelUserStatus('projects', 'project_users', 'project_id', $userId, ASSIGN_STATUS_3);
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
		$Alter = 'Thông báo';
		if(count(Session::get('task')) > 0)
			$Alter .= count($task) . ' Công việc mới. ';
		if(count($taskAssign) > 0)
			$Alter .= count($taskAssign) . ' Việc chờ duyệt. ';
		if(count($projectAssign) > 0)
			$Alter .= count($projectAssign) . ' Dự án chờ duyệt. ';
		if(count($contractExpired) > 0)
			$Alter .= count($contractExpired) . ' Hợp đồng hết hạn. ';
		if(count($archive) > 0)
			$Alter .= count($archive) . ' Công văn duyệt. ';
		return $Alter;
	}

	
}