<?php 

class SalaryApproveController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = SalaryHistoryUser::where('status', SALARY_PROPOSAL)
							->where('model_name', 'User')->paginate(PAGINATE);
		return View::make('admin.salary.approve_salary_manager.index')->with(compact('data'));
	}
	public function indexDepReg()
	{
		$data = SalaryHistoryUser::where('model_name', 'Department')
			->where('type', PROPOSAL_DEP)
		    ->orwhere('model_name', 'Regency')
			->where('type', PROPOSAL_REGENCY)
			->paginate(PAGINATE);
		return View::make('admin.salary.approve_salary_manager.index_dep_reg')->with(compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = SalaryHistoryUser::find($id);
		return View::make('admin.salary.approve_salary_manager.show')->with(compact('data'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = SalaryHistoryUser::find($id);
		$salary = SalaryUser::where('user_id', $data->model_id)
			// ->where('status', SALARY_APPROVE)
			->first();
		if($data->type == PROPOSAL_USER_NEW)
		{
			return View::make('admin.salary.approve_salary_manager.edit_new')->with(compact('data', 'salary'));
		} else {
			return View::make('admin.salary.approve_salary_manager.edit_old')->with(compact('data', 'salary'));
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = SalaryHistoryUser::find($id);
		$salary = SalaryUser::where('user_id', $data->model_id)
			->first();
		$input = Input::except('_token');
		$input_user_new = array();
		$inputupdateSalary = array();
		$input_user_new['approve_id'] = CommonUser::getUserId();
		$input_user_new['approve_date'] = Carbon\Carbon::now();
		$input_user_new['status'] = SALARY_APPROVE;
		if($data->type == PROPOSAL_USER_NEW)
		{
			if($input['salary_edit'] != '')
			{
				$input_user_new['salary_edit'] =  $input['salary_edit'];
				$inputupdateSalary['salary'] = $input['salary_edit'];
			}	
			$input_user_new['type'] = PROPOSAL_USER;
			$inputupdateSalary['status'] = SALARY_APPROVE;
			SalaryUser::where('user_id', $data->model_id)->update($inputupdateSalary);
			SalaryHistoryUser::find($id)->update($input_user_new);
		} else {
			if($input['percent_edit'] != '')
			{
				$input_user_new['percent_edit'] =  $input['percent_edit'];
				$salaryNew = getSalaryNew_admin_edit($input, $salary);
				$input_user_new['salary_edit'] =  $salaryNew;
				$inputupdateSalary['salary'] = $salaryNew;
			}else
			{
				$inputupdateSalary['salary'] = $data->salary_new;
			}
			if($input['type_salary_edit'] != '')
			{
				$input_user_new['type_salary_edit'] = $input['type_salary_edit'];
			}

			SalaryUser::where('user_id', $data->model_id)->update($inputupdateSalary);
			SalaryHistoryUser::find($id)->update($input_user_new);
		}
		return Redirect::action('SalaryApproveController@index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Method using approve salary
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function approveSalary($id)
	{
		//kiem tra status trong bang history 1: nhan vien moi 2: nhan vien cu
		$user = SalaryHistoryUser::find($id);
		$inputupdate['approve_id'] = CommonUser::getUserId();
		$inputupdate['approve_date'] = Carbon\Carbon::now();
		$inputupdate['status'] = SALARY_APPROVE;
		if($user->type == PROPOSAL_USER_NEW) {
			$inputupdate['type'] = PROPOSAL_USER;
			$inputupdateSalary['status'] = SALARY_APPROVE;
			SalaryUser::where('user_id', $user->model_id)->update($inputupdateSalary);
			SalaryHistoryUser::find($id)->update($inputupdate);
		} else {
			$inputupdateSalary['salary'] = $user->salary_new;
			SalaryUser::where('user_id', $user->model_id)->update($inputupdateSalary);
			SalaryHistoryUser::find($id)->update($inputupdate);
		}
		return Redirect::action('SalaryApproveController@index');
	}

	public function rejectSalary($id){
		$user = SalaryHistoryUser::find($id);
		$inputupdate['approve_id'] = CommonUser::getUserId();
		$inputupdate['status'] = SALARY_REJECT;
		if($user->type == PROPOSAL_USER_NEW) {
			$inputupdateSalary['status'] = SALARY_REJECT;
			SalaryUser::where('user_id', $user->model_id)->update($inputupdateSalary);
			SalaryHistoryUser::find($id)->update($inputupdate);
		} else {
			$inputupdateSalary['salary'] = $user->salary_new;
			SalaryUser::where('user_id', $user->model_id)->update($inputupdateSalary);
			SalaryHistoryUser::find($id)->update($inputupdate);
		}
		return Redirect::action('SalaryApproveController@index');
	}

	public function search()
	{
		$input = Input::except('_token');
		$data = CommonSalary::searchSalaryApprove($input);
		return View::make('admin.salary.approve_salary_manager.index')->with(compact('data'));
	}  

	public function approveSalarySelect()
	{
		$input = Input::except('_token');
		$inputsalary = $input['salary_id'];
		$inputcheckAll = $input['checkall'];

		foreach ($inputsalary as $key => $value) {
			$this->approveSalary($value);
		}
		dd($input);
	}

	public  function rejectSalarySelect(){
		$input = Input::except('_token');
		$inputcheckAll = $input['checkall'];

		$inputsalary = $input['salary_id'];
		foreach ($inputsalary as $key => $value) {
			$this->approveSalary($value);
		}
		dd($input);
	}

}
