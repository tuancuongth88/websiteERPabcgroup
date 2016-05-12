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

}