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
		$data = Project::join('project_users', 'project_users.project_id', '=', 'projects.id')
			->select('projects.*')
			->where(function ($query) use ($input)
		{
			if($input['name'] != '') {
				$query = $query->where('projects.name', 'like', '%'.$input['name'].'%');
			}
			if($input['start'] != '') {
				$query = $query->where('projects.start', '>=', $input['start']);
			}
			if($input['end'] != '') {
				$query = $query->where('projects.end', '<=', $input['end']);
			}
			if($input['status'] != '') {
				$query = $query->where('projects.status', $input['status']);
			}
			$user = Auth::user()->get();
			if($user) {
				if($user->role_id == ROLE_ADMIN) {
					if(!empty($input['user_id'])) {
						$query = $query->where('projects.user_id', $input['user_id']);
					}
					if(!empty($input['assign_id'])) {
						$query = $query->where('projects.user_id', $input['assign_id']);
						$query = $query->orWhere('project_users.user_id', $input['assign_id']);
						$query = $query->orWhere('project_users.assign_id', $input['assign_id']);
					}
				} else {
					$query = $query->where('projects.user_id', $user->id);
					$query = $query->orWhere('project_users.user_id', $user->id);
					$query = $query->orWhere('project_users.assign_id', $user->id);
				}
			}

		})->distinct()->orderBy('projects.name', 'asc')->paginate(PAGINATE);
		return $data;
	}

}
