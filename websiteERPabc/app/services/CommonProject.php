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

}