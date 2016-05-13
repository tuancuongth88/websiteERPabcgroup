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

		})->orderBy('name', 'asc')->paginate(PAGINATE);
		return $data;
	}

}