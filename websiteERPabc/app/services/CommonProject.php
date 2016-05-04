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

	public static function getStatusProjectArray()
	{
		$projectStatus = ProjectStatus::lists('name', 'id');
		if($projectStatus) {
			return $projectStatus;
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

	public static function getTempRoleArray()
	{
		$tempRole = TempRole::lists('name', 'id');
		if($tempRole) {
			return $tempRole;
		}
		return [];
	}

	public static function getPermissionArray()
	{
		$permissions = Permission::lists('name', 'id');
		if($permissions) {
			return $permissions;
		}
		return [];
	}

}