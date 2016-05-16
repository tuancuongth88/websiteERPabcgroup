<?php
class CommonOption {

	public static function getOption($model)
	{
		$array = array(
			null => 'Parent',
		);
		return $array + self::childOption($model);
	}
	public static function parentOption($model)
	{
		return $model::whereNull('parent_id')->lists('name', 'id');
	}
	public static function childOption($model)
	{
		$parents = self::parentOption($model);
		$child = $model::whereNotNull('parent_id')->lists('name', 'id');
		foreach ($child as $key => $value) {
			$parentId = $model::find($key)->parent_id;
			if($parentId) {
				$child[$key] = $model::find($parentId)->name . '-' . $value;
			}
			else {
				dd('sai');
			}
		}
		return $parents + $child;
	}
	public static function getNameOption($model, $value)
	{
		$parent_id = $model::find($value->id)->parent_id;
		if ($parent_id) {
			return $model::find($parent_id)->name;
		}
		return null;
	}
	public static function deleteParent($modelName, $id)
	{
		$parentId = $modelName::find($id)->parent_id;
		if ($parentId) {
			$list = $modelName::where('parent_id', $id)->update(['parent_id' => $parentId]);
		}
		else {
			$modelName::where('parent_id', $id)->update(['parent_id' => null]);
		}
	}

	public static function getOptionModel($model)
	{
		$data = $model::lists('name', 'id');
		return $data;
	}
	public static function checkOptionCheckbox($modelName, $id1, $id2, $field1, $field2)
	{
		$check = $modelName::where($field1, $id1)->where($field2, $id2)->first();
		if ($check) {
			return true;
		}
		return false;
	}

	public static function checkValueCheckbox($modelName, $id1, $id2, $field1, $field2)
	{
		$check = $modelName::where($field1, $id1)->where($field2, $id2)->first();
		if ($check) {
			return CHECKED;
		}
		return NOT_CHECKED;
	}

	public static function getKeyFromArray($input)
	{
		$array = [];
		foreach ($input as $key => $value) {
			$array[] = $key;
		}
		return $array;
	}
	public static function getOptionAllModel($model)
	{
		return $model::where('status', '=', 1)->lists('name', 'id');
	}

	public static function getFieldTextByModel($modelName, $modelId, $field)
	{
		$data = $modelName::find($modelId);
		if($data) {
			if($data->$field) {
				return $data->$field;
			}
		}
		return '';
	}

	public static function getStatusTaskArray()
	{
		return array(
				TASK_STATUS_1 => 'Đang làm',
				TASK_STATUS_2 => 'Hoàn thành',
				TASK_STATUS_3 => 'Tạm dừng',
			);
	}

	public static function getStatusTaskValue($status)
	{
		$array = self::getStatusTaskArray();
		return $array[$status];
	}

	public static function getPermissionArray()
	{
		return array(
				PERMISSION_1 => 'Toàn quyền',
				PERMISSION_2 => 'Bình thường',
			);
	}

	public static function getPermissionValue($permission)
	{
		$array = self::getPermissionArray();
		return $array[$permission];
	}

	public static function getFunctionArray()
	{
		return array(
				FUNCTION_USER => 'Quản lý nhân viên',
				FUNCTION_DEPARTMENT => 'Quản lý phòng ban',
				FUNCTION_REGENCY => 'Quản lý chức vụ',
				FUNCTION_TASK => 'Quản lý công việc',
				FUNCTION_PROJECT => 'Quản lý dự án',
				FUNCTION_TEMPROLE => 'Quản lý vai trò dự án',
				FUNCTION_PROJECTSTATUS => 'Quản lý trạng thái dự án',
				FUNCTION_REPORT => 'Quản lý báo cáo',
			);
	}

	public static function getFunctionValue($function)
	{
		$array = self::getFunctionArray();
		return $array[$function];
	}

}