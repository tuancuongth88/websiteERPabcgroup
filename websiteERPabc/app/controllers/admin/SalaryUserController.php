<?php

class SalaryUserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// if ($userId = ADMIN) {
		// 	return View::make('admin.salary.approve');
		// }
		// if ($check == true) {
		// 	# code...
		// }
		$data = SalaryUser::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.salary.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.salary.create');
	}

	public function createAll()
	{
		return View::make('admin.salary.create_all_user');
	}
	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$rules = array(
			'salary' => 'required|integer|min:100000',
		);
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SalaryUserController@create')
				->withInput($input)
	            ->withErrors($validator);
        } else {
        	$input['status'] = ACTIVE;
        	$salaryId = SalaryUser::create(['salary' => $input['salary']])->id;
        	User::find($input['user_id'])->update(['salary_id' => $salaryId]);
			return Redirect::action('SalaryUserController@index');	
        }
	}


	public function storeAll()
	{
		$input = Input::except('_token');
		$rules = array(
			// 'salary' => 'required|integer|min:100000',
			'percent' => 'required',
			'start_date' => 'required',
		);
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SalaryUserController@createAll')
				->withInput($input)
	            ->withErrors($validator);
        } else {
        	$input['status'] = WAITING;
        	$input['user_proposal'] = CommonUser::getUserId();
        	$input['start_date'] = $input['start_date'];
        	$type_model = $input['type_dep_regency'];
        	if($type_model == DEP)
        		$input['model_name'] = 'Department';
        	if($type_model == REGENCY)
        		$input['model_name'] = 'Regency';
        	$input['model_id'] = $input['model_id'];
        	$input['type_salary'] = $input['type_salary'];
        	$type = $input['type_dep_regency'];
        	if ($type == DEP) {
        		$input['type'] = TYPE_DEP;
        	}
        	if ($type == REGENCY) {
        		$input['type'] = TYPE_REGENCY;
        	}
        	$salaryAllId = SalaryHistoryUser::create($input);
			return Redirect::action('SalaryUserController@index');	
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
		$salary = SalaryUser::find($id);
		return View::make('admin.salary.edit')->with(compact('salary'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token');
		$rules = array(
			'salary' => 'required|integer|min:100000',
		);
		$salary_id = SalaryUser::find($id);
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SalaryUserController@create')
				->withInput($input)
	            ->withErrors($validator);
        } else {

        	$salary_id->update(['salary' => $input['salary']]);
			return Redirect::action('SalaryUserController@index');	
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonNormal::delete($id);
		return Redirect::action('SalaryUserController@index') ;
	}

	public function searchabc()
	{
		$input = Input::all();
		$salarydata = SalaryUser::all();
		$data = SalaryUser::join('users', 'users.salary_id', '=', 'salaries.id')
			->select('salaries.*', 'users.username')
			->where(function ($query) use ($input) {
			if ($input['salary_start']) {
				$query = $query->where('salaries.salary', '>=', $input['salary_start']);
			}
			if ($input['salary_end']) {
				$query = $query->where('salaries.salary', '<=', $input['salary_end']);
			}
			if ($input['username']) {
				$query = $query->where('users.username', 'like', '%'.$input['username'].'%');
			}

		})->paginate(PAGINATE);
		return View::make('admin.salary.index')->with(compact('data'));
	}
	public function getFormatTypeSalary()
	{
		$typesalary = Input::get('type_dep_regency');
		$data = array();
		if($typesalary == 1)
		{
			$data = Department::lists('name', 'id');
		}
		if($typesalary == 2)
			$data = Regency::lists('name', 'id');	
		return View::make('admin.salary.salary_normal')->with(compact('data'));
	}
}
