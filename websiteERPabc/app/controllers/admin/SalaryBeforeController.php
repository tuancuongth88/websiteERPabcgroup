<?php

class SalaryBeforeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$listIdHistory = SalaryHistoryUser::whereRaw('id in (select MAX(id) as id From salary_history GROUP BY model_id)')->lists('id');
		$data = SalaryHistoryUser::where('model_name', 'User')->where('status', SALARY_APPROVE)->whereIn('id', $listIdHistory)->paginate(PAGINATE);
		return View::make('admin.salary.before.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$input = Input::get('history_id');
		$listIdHistory = SalaryHistoryUser::whereIn('id', $input)->lists('model_id');
		$data = SalaryUser::whereIn('user_id', $listIdHistory)->get();
		return View::make('admin.salary.before.submit_proposals')->with(compact('data'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		dd($input);
		$rules = array(
			// 'salary' => 'required|integer|min:100000',
			'percent' => 'required',
			'start_date' => 'required',
		);
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SalaryBeforeController@create')
				->withInput($input)
	            ->withErrors($validator);
        } else {
        	$input['status'] = SALARY_PROPOSAL;
        	$input['user_proposal'] = CommonUser::getUserId();
        	$input['start_date'] = $input['start_date'];
        	$type_model = $input['type_dep_regency'];
        	$input['model_name'] = CommonSalary::getModelName($input);
        	$input['type'] = CommonSalary::getType($input);
        	$input['model_id'] = $input['model_id'];
        	$input['type_salary'] = $input['type_salary'];
        	SalaryHistoryUser::create($input);
        	// insert all user 
        	//get list user follow dep or regency
        	$listUserId = CommonSalary::getListUserId($input);
        	//insert list user
        	foreach ($listUserId as $value) {

				$userId = $value;
	        	CommonSalary::addAllUserId($userId, $input);
        	}
			return Redirect::action('SalaryBeforeController@create');	
        }
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
		$listIdHistory = SalaryHistoryUser::where('id', $id)->lists('model_id');
		$data = SalaryUser::whereIn('user_id', $listIdHistory)->get();
		return View::make('admin.salary.before.submit_proposals')->with(compact('data'));
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
		
	}

	public function search()
	{
		$input = Input::except('_token');
		$rules = array(
			'approve_date' => 'datetime',
		);
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SalaryBeforeController@index')
				->withInput($input)
	            ->withErrors($validator);
        } else {
			$data1 = SalaryHistoryUser::where(function ($query) use ($input) {
				$query = $query->where('model_name', 'User');
				if($input['start'] != ''){
					$query = $query->where('approve_date', '>=', $input['start']);
				}
			    if($input['end'] != ''){
					$query = $query->where('approve_date', '<=', $input['end'].' 23:59:59');
				}
			})->orderBy('id', 'desc')->paginate(PAGINATE);
			$listid = $data1->lists('model_id');
			$listIdHistory = SalaryHistoryUser::whereRaw('id in (select MAX(id) as id From salary_history GROUP BY model_id)')->lists('id');
			$data = SalaryHistoryUser::where('model_name', 'User')->whereNotIn('model_id', $listid)->where('status', SALARY_APPROVE)->whereIn('id', $listIdHistory)->paginate(PAGINATE);
			return View::make('admin.salary.before.index')->with(compact('data'));
		}
	}
    public function proposeSalary(){

    }
}
