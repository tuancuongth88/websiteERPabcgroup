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
		$data = Task::where(function ($query) use ($input)
		{
			if($input['name'] != '') {
				$query = $query->where('name', 'like', '%'.$input['name'].'%');
			}
			if($input['start'] != '') {
				$query = $query->where('start', '>=', $input['start']);
			}
			if($input['end'] != '') {
				$query = $query->where('end', '<=', $input['end']);
			}
			if($input['status'] != '') {
				$query = $query->where('status', $input['status']);
			}
			if($input['project_id'] != '') {
				$query = $query->where('project_id', $input['project_id']);
			}
			if($input['user_id'] != '') {
				if($input['user_id'] == 0) {
					//nguoi tao la admin
					$query = $query->whereNull('user_id');
				} else {
					//nguoi tao la user
					$query = $query->where('user_id', $input['user_id']);
				}
			}
			
		})->orderBy('name', 'asc')->paginate(PAGINATE);
		return $data;
	}

}