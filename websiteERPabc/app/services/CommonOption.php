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
	public static function getOptionFromModel($model)
	{
		return $model::lists('name', 'id');
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

	public static function getStatusTaskArray($modelName, $fieldName, $fieldValue)
	{
		return $modelName::lists($fieldName, $fieldValue);
	}

	public static function getStatusTaskValue($taskStatusId)
	{
		$taskStatus = TaskStatus::find($taskStatusId);
		if ($taskStatus) {
			return $taskStatus->name;
		}
		return 'Không có trạng thái';
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
	public static function getListUser()
	{
		$lstUser = User::lists('username', 'id');
		return $lstUser;
	}

	// loai cong van giay to
	public static function getArchiveType()
	{
		return array(
			ARCHIVE_TYPE_1 => 'Công văn đến',	
			ARCHIVE_TYPE_2 => 'Công văn đi',	
		);
	}
	public static function getArchiveTypeText($type)
	{
		$array = self::getArchiveType();
		return $array[$type];
	}
	// trang thai xu ly cong van giay to
	public static function getArchiveStatusHandling()
	{
		return array(
			ARCHIVE_STATUS_HANDLING_1 => 'Chờ xử lý',
			ARCHIVE_STATUS_HANDLING_2 => 'Đã xử lý',
		);
	}
	public static function getArchiveStatusHandlingText($status)
	{
		$array = self::getArchiveStatusHandling();
		return $array[$status];
	}
	// chuc nang chuyen cong van giay to
	public static function getArchiveFunction()
	{
		return array(
			ARCHIVE_FUNCTION_1 => 'Xử lý',
			ARCHIVE_FUNCTION_2 => 'Báo cáo',
			ARCHIVE_FUNCTION_3 => 'Phối hợp',
		);
	}
	public static function getArchiveFunctionText($funId)
	{
		$array = self::getArchiveFunction();
		return $array[$funId];
	}

	public static function getTypeContract()
	{
		return array(
			TYPE_CONTRACT_1 => 'Hợp đồng kinh tế',
			TYPE_CONTRACT_2 => 'Hợp đồng dịch vụ',
			TYPE_CONTRACT_3 => 'Hợp đồng hợp tác',
		);
	}
	public static function getTypeContractText($type)
	{
		$array = self::getTypeContract();
		return $array[$type];
	}
	public static function getTypeExtendContract()
	{
		return array(
			TYPE_EXTEND_1 => 'Tự động gia hạn',
			TYPE_EXTEND_2 => 'Thanh lý gia hạn',
			TYPE_EXTEND_3 => 'Yêu cầu gia hạn',
		);
	}
	public static function getTypeExtendContractText($type_extend)
	{
		$array = self::getTypeExtendContract();
		return $array[$type_extend];
	}
	public static function getStatusContract()
	{
		return array(
			STATUS_CONTRACT_1 => 'Đang thực hiên',
			STATUS_CONTRACT_2 => 'Thanh lý',
		);
	}
	public static function getStatusContractText($status)
	{
		$array = self::getStatusContract();
		return $array[$status];
	}
	public static function getStatusResource(){
		return array(
				RESOURCE_STATUS_NEW => 'Mới',
				RESOURCE_STATUS_OLD => 'Đang sử dụng',
				RESOURCE_STATUS_OLE_NO_USER => 'Không sử dụng',
			);
	}
	public static function getNameStatusResource($id){
		if($id == RESOURCE_STATUS_NEW)
			return 'Mới';
		elseif ($id == RESOURCE_STATUS_OLD) {
			return 'Đang sử dụng';
		}
		elseif ($id == RESOURCE_STATUS_OLE_NO_USER) {
			return 'Không sử dụng';
		}
		
	}

}