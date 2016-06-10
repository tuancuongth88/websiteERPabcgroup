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
			return 'Tang luong';
		}else{
			return 'Giam luong';
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

	public static function searchSalaryApprove($input)
	{
		$data = SalaryHistoryUser::where(function ($query) use ($input)
		{
			$query = $query->where('model_name', 'User')->where('status', SALARY_PROPOSAL);
			if($input['username'] != '') {
				$listUser = User::where('username', 'like', '%'.$input['username'].'%')->lists('id');
				$query = $query->whereIn('model_id', $listUser);
			}
			if ($input['department'] != '') {
				$listSalaryDepID = SalaryUser::where('dep_id', $input['department'])->lists('user_id');
				$query = $query->whereIn('model_id', $listSalaryDepID);
			}
			if ($input['regency'] != '') {
				$listSalaryRegencyID = SalaryUser::where('regency_id', $input['regency'])->lists('user_id');
				$query = $query->whereIn('model_id', $listSalaryRegencyID);
			}
			if ($input['type_salary'] != TYPE_SALARY_CHOOSE) {
				$query = $query->where('type_salary', $input['type_salary'] );
			}
			if($input['start'] != ''){
				$query = $query->where('start_date', '>=', $input['start']);
			}
			if($input['end'] != ''){
				$query = $query->where('start_date', '<=', $input['end'].' 23:59:59');
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE);
		return $data;
	}

}
