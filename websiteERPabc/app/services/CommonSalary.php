<?php
class CommonSalary {

	public static function getListNoSalaryUser()
	{
		$listUser = User::where('role_id', '!=', ROLE_ADMIN)
			->whereNull('salary_id')
			->lists('username', 'id');
		return $listUser;
	}
	public static function getListUser()
	{
		return User::where('role_id', '!=', ROLE_ADMIN)->lists('username', 'id');
	}
	public static function getDepRegency($userId)
	{	
		$list = DepRegencyUserParent::where('user_id', $userId)->get();
		foreach ($list as $value) {
			$array[$value->id] = self::getNameDep($value->dep_id) . '-' . self::getNameRegency($value->regency_id); 
		}
		return $array;
	}
	public static function getNameDep($depId)
	{
		return Department::find($depId)->name;
	}
	public static function getNameRegency($regencyId)
	{
		return Regency::find($regencyId)->name;
	}
	public static function getTypeDepRegency()
	{
		return ['0' => 'Lựa chọn', PROPOSAL_DEP => 'Phòng ban', PROPOSAL_REGENCY => 'Chức vụ'];
	}

	public static function getTypeUpDow()
	{
		return [TYPE_SALARY_CHOOSE => 'Lựa chon', TYPE_SALARY_UP => 'Tăng lương', TYPE_SALARY_DOWN => 'Giảm lương'];
	}
	public static function getModelName($input)
	{
		if ($input['type_dep_regency'] == PROPOSAL_DEP) {
			return 'Department';
		}
		if ($input['type_dep_regency'] == PROPOSAL_REGENCY) {
			return 'Regency';
		}
	}
	public static function getType($input)
	{
		return $input['type_dep_regency'];
	}
	public static function getDepAndRegency($modelName, $modelId)
	{
		$data = $modelName::find($modelId);
		if($data)
		{
			return $data->name;
		}else{
			return '';
		}

	}
	public static function getUpAndDown($value)
	{
		if ($value->type_salary == TYPE_SALARY_UP) {
			return 'Tăng lương';
		}
		if ($value->type_salary == TYPE_SALARY_DOWN) {
			return 'Giảm lương';
		}
		else{
			return 'Thêm mới';
		}
	} 
	public static function addAllUserId($userId, $input)
	{
		$userProposalId = CommonUser::getUserId();
    	$salary = SalaryUser::where('user_id', $userId)
			->where('status', SALARY_APPROVE)
			->first();
    	$inputHistory['start_date'] = $input['start_date']; 
    	$inputHistory['model_name'] = 'User'; 
    	$inputHistory['model_id'] = $userId; 
    	$inputHistory['note_user_update'] = $input['note_user_update']; 
    	$inputHistory['salary_old'] = $salary->salary; 
    	$inputHistory['salary_new'] = getSalaryNew($input, $salary); 
    	$inputHistory['user_proposal'] = $userProposalId; 
    	$inputHistory['type_salary'] = $input['type_salary']; 
    	$inputHistory['type'] = PROPOSAL_USER; 
    	$inputHistory['percent'] = $input['percent']; 
    	$inputHistory['status'] = SALARY_PROPOSAL; 
    	$historyId = SalaryHistoryUser::create($inputHistory)->id;
	}
	public static function getListUserId($input)
	{
		if ($input['type_dep_regency'] == PROPOSAL_DEP) {
			$listUser = SalaryUser::where('dep_id', $input['model_id'])->lists('user_id');
		}
		if ($input['type_dep_regency'] == PROPOSAL_REGENCY) {
			$listUser = SalaryUser::where('regency_id', $input['model_id'])->lists('user_id');
		}
		return $listUser;
	}
	public static function getNameUser($user_id)
	{
		return User::find($user_id)->username;
	}
}
