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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
			SalaryUser::where('user_id', $user->model_id)->update();
			SalaryHistoryUser::find($id)->update($inputupdate);
		}
		return Redirect::action('SalaryApproveController@index');
	}

	public function search()
	{

	}

}
