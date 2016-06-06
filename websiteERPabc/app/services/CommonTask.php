<?php
class CommonTask {

	public static function getTaskUserPerIdArray($taskId, $userId)
	{
		$rs = TaskUser::where('task_id', $taskId)
				->where('user_id', $userId)
				->lists('per_id');
		if($rs) {
			return $rs;
		}
		return [];
	}

	public static function checkTaskUserPerStatus($taskId, $userId, $perId)
	{
		$taskUserPerIdArray = self::getTaskUserPerIdArray($taskId, $userId);
		if(in_array($perId, $taskUserPerIdArray)) {
			return true;
		} else {
			return false;
		}
	}

	public static function search()
	{
		$input = Input::all();
		$data = Task::join('task_users', 'task_users.task_id', '=', 'tasks.id')
			->select('tasks.*')
			->where(function ($query) use ($input)
		{
			if(!empty($input['name'])) {
				$query = $query->where('tasks.name', 'like', '%'.$input['name'].'%');
			}
			if(!empty($input['start'])) {
				$query = $query->where('tasks.start', '>=', $input['start']);
			}
			if(!empty($input['end'])) {
				$query = $query->where('tasks.end', '<=', $input['end']);
			}
			if(!empty($input['status'])) {
				$query = $query->where('tasks.status', $input['status']);
			}
			if(!empty($input['project_id'])) {
				$query = $query->where('tasks.project_id', $input['project_id']);
			}
			$user = Auth::user()->get();
			if($user) {
				if($user->role_id == ROLE_ADMIN) {
					if(!empty($input['user_id'])) {
						$query = $query->where('tasks.user_id', $input['user_id']);
					}
					if(!empty($input['assign_id'])) {
						$query = $query->where('tasks.user_id', $input['assign_id']);
						$query = $query->orWhere('task_users.user_id', $input['assign_id']);
						$query = $query->orWhere('task_users.assign_id', $input['assign_id']);
					}	
				} else {
					$query = $query->where('tasks.user_id', $user->id);
					$query = $query->orWhere('task_users.user_id', $user->id);
					$query = $query->orWhere('task_users.assign_id', $user->id);
				}
			}
			
		})->distinct()->orderBy('tasks.name', 'asc')->paginate(PAGINATE);
		return $data;
	}

	public static function filterTask($taskStatusId, $paginate = null)
	{
		$userId = CommonUser::getUserId();
		$data = Task::join('task_users', 'task_users.task_id', '=', 'tasks.id')
			->select('tasks.*')
			->where('task_users.status', ASSIGN_STATUS_1);
		if($userId) {
			$data = $data->where('task_users.user_id', $userId);
		}
		if ($taskStatusId) {
			if (is_array($taskStatusId)) {
				$data = $data->whereIn('tasks.task_status_id', $taskStatusId);
			}
			else {
				$data = $data->where('tasks.task_status_id', $taskStatusId);
			}
		}
		// switch ($taskStatusId) {

		// 	case TASK_STATUS_1:
		// 		$data = $data->where('tasks.status', TASK_STATUS_1);
		// 		break;
		// 	case TASK_STATUS_2:
		// 		$data = $data->where('tasks.status', TASK_STATUS_2);
		// 		break;
		// 	case TASK_STATUS_3:
		// 		$data = $data->where('tasks.status', TASK_STATUS_3);
		// 		break;
			
		// 	default:
		// 		# code...
		// 		break;
		// }
		$data = $data->distinct()->orderBy('tasks.id', 'desc');
		if($paginate) {
			$data = $data->paginate(PAGINATE);	
		} else {
			$data = $data->get();			
		}
		return $data;
	}

}