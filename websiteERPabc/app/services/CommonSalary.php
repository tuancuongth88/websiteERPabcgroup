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

	public static function searchSalaryDepRegency($input)
	{	
		$data = SalaryHistoryUser::where(function ($query) use ($input)
		{
			$query = $query->whereIn('type', [PROPOSAL_DEP, PROPOSAL_REGENCY]);
			// $query = $query->where('type', PROPOSAL_DEP)->orwhere('type', PROPOSAL_REGENCY);
			if( $input['type_dep'] != ''){
				$query = $query->where('model_name', 'Department');
				$query = $query->where('model_id', $input['type_dep']);
			}
			if($input['type_regency'] != ''){
				// dd($input['type_regency']);
				$query = $query->where('model_name', 'Regency');
				$query = $query->where('model_id', $input['type_regency']);
			}
			if ($input['type_salary'] != '0') {
				$query = $query->where('type_salary', $input['type_salary'] );
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE);
		// dd($data->toArray());
		return $data;
	}

	public static function searchSalaryHistoryUser($input)
	{
		$data = SalaryUser::where(function ($query) use ($input) {
			if ($input['salary_start']) {
				$query = $query->where('salaries.salary', '>=', $input['salary_start']);
			}
			if ($input['salary_end']) {
				$query = $query->where('salaries.salary', '<=', $input['salary_end']);
			}
			if ($input['username']) 
			{
				$userName = User::where('username', 'like', '%'.$input['username'].'%')->lists('id');
				$query = $query->whereIn('user_id', $userName);
			}
		})->orderBy('id', 'desc')->where('status', SALARY_APPROVE)->paginate(PAGINATE);
		return $data;
	}

	public static function searchSalaryUser($input)
	{
		$data = SalaryHistoryUser::where(function ($query) use ($input) {
			$query = $query::whereIn('type', PROPOSAL_USER_NEW);
			if ($input['salary_start']) {
				$query = $query->where('salary_history.salary', '>=', $input['salary_start']);
			}
			if ($input['salary_end']) {
				$query = $query->where('salary_history.salary', '<=', $input['salary_end']);
			}
			if ($input['username']) 
			{
				$userName = User::where('username', 'like', '%'.$input['username'].'%')->lists('id');
				$query = $query->whereIn('model_id', $userName);
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE);
		return $data;
	}
	public static function getNameUser($user_id)
	{
		return User::find($user_id)->username;
	}
	public static function getAllNameDep()
	{
		return Department::lists('name', 'id');
	}
	public static function getAllNameRegency()
	{
		return Regency::lists('name', 'id');
	}
	public static function getidDepRegPartner($data)
	{
		return DepRegencyUserParent::where('user_id',  $data->user_id)->where('dep_id', $data->dep_id)->first()->id;
	}
	public static function getNameUserDate($value)
	{
		if(isset($value->user_id))
			return User::find($value->user_id)->username;
		else
			return User::find($value->model_id)->username;
	}
	public static function getSalaryUserDate($value)
	{
		$input = $value;
		if(isset($value->user_id))
		{
			return SalaryUser::find($input->id)->salary;
		}
		elseif (isset($value->model_id)) {
			if($value->salary_edit){
				$data= SalaryHistoryUser::where('id' ,$input->id)->where('model_id', $input->model_id)->get();
				return $data[0]->salary_edit;
			}
			elseif($value->salary_new){
				$data = SalaryHistoryUser::where('id' ,$input->id)->where('model_id', $input->model_id)->get();
				return $data[0]->salary_new;
			}
		}
	}
}
