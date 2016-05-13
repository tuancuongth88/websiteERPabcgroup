<?php
class CommonProject {

	public static function getModelArray($modelName, $fieldName, $fieldValue)
	{
		$data = $modelName::lists($fieldName, $fieldValue);
		if($data) {
			return $data;
		}
		return [];
	}

	public static function getUserArray()
	{
		$users = User::where('status', ACTIVE)->lists('username', 'id');
		if($users) {
			return $users;
		}
		return [];
	}

	public static function getProjectUserPerIdArray($projectId, $userId, $tempRoleId)
	{
		$rs = ProjectUser::where('project_id', $projectId)
				->where('user_id', $userId)
				->where('temp_role_id', $tempRoleId)
				->lists('per_id');
		if($rs) {
			return $rs;
		}
		return [];
	}

	public static function checkProjectUserPerStatus($projectId, $userId, $tempRoleId, $perId)
	{
		$projectUserPerIdArray = self::getProjectUserPerIdArray($projectId, $userId, $tempRoleId);
		if(in_array($perId, $projectUserPerIdArray)) {
			return true;
		} else {
			return false;
		}
	}

	public static function search()
	{
		$input = Input::all();
		$data = Project::where(function ($query) use ($input)
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
