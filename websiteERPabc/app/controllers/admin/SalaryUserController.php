<?php

class SalaryUserController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = SalaryHistoryUser::where('model_name', 'User')
			->where('type', PROPOSAL_USER_NEW)
			->paginate(PAGINATE);
		return View::make('admin.salary.new.index')->with(compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$list = SalaryUser::where('status', SALARY_APPROVE)->lists('user_id');
		$data = User::whereNotIn('id', $list)->lists('username');
		return View::make('admin.salary.new.create')->with(compact('data'));
	}

	public function createAll()
	{
		return View::make('admin.salary.create_all_user');
	}
	public function createOld()
	{
		$list = SalaryUser::where('status', SALARY_APPROVE)->lists('user_id');
		$data = User::whereIn('id', $list)->lists('username');
		return View::make('admin.salary.old.create')->with(compact('data'));
	}
	public function storeOld()
	{
		$input = Input::except('_token');
		$rules = array(
			'percent' => 'required|integer|min:1',
		);
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SalaryUserController@create')
				->withInput($input)
	            ->withErrors($validator);
        } else {
        	$user = User::where('username', $input['username'])->first();
			$userId = $user->id;
        	CommonSalary::addAllUserId($userId, $input);
        	return Redirect::action('SalaryUserController@indexOld');
        }
	}
	public function indexOld()
	{
		$data = SalaryHistoryUser::where('model_name', 'User')
			->where('type', PROPOSAL_USER)
			->paginate(PAGINATE);
		return View::make('admin.salary.old.index')->with(compact('data'));
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
        	//create new record salary in the table: salaries: status: 4
			$userId = Common::getUserIdByUserName($input['username']);
			$depRegencyUser = DepRegencyUserParent::find($input['dep_regency_id']);
      		$depId = $depRegencyUser->dep_id;
      		$regencyId = $depRegencyUser->regency_id;
      		$inputSalary = [
      			'salary' => $input['salary'],
      			'status' => SALARY_PROPOSAL,
      			'user_id' => $userId,
      			'dep_id' => $depId,
      			'regency_id' => $regencyId,
      		];
      		$salaryId = SalaryUser::create($inputSalary)->id;
   			$inputHistory['start_date'] = $input['start_date']; 
        	$inputHistory['model_name'] = 'User'; 
        	$inputHistory['model_id'] = $userId; 
        	$inputHistory['note_user_update'] = $input['note_user_update']; 
        	$inputHistory['salary_new'] = $input['salary']; 
        	$inputHistory['user_proposal'] = CommonUser::getUserId(); 
        	$inputHistory['type'] = PROPOSAL_USER_NEW; 
        	$inputHistory['status'] = SALARY_PROPOSAL; 
        	$historyId = SalaryHistoryUser::create($inputHistory)->id;
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
        	$input['status'] = SALARY_PROPOSAL;
        	$input['user_proposal'] = CommonUser::getUserId();
        	$input['start_date'] = $input['start_date'];
        	// $type_model = $input['type_dep_regency'];
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
			return Redirect::action('ProposeSalaryListController@index');	
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

	public function searchNew()
	{
		$input = Input::except('_token');
		$data = SalaryHistoryUser::where(function ($query) use ($input) {
			$query = $query->where('type', PROPOSAL_USER_NEW);
			if ($input['salary_start']) {
				$query = $query->where('salary_history.salary_new', '>=', $input['salary_start']);
			}
			if ($input['salary_end']) {
				$query = $query->where('salary_history.salary_new', '<=', $input['salary_end']);
			}
			if ($input['username']) 
			{
				$userName = User::where('username', 'like', '%'.$input['username'].'%')->lists('id');
				$query = $query->whereIn('model_id', $userName);
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.salary.new.index')->with(compact('data'));
	}
	public function searchOld()
	{
		$input = Input::except('_token');
		$data = SalaryHistoryUser::where(function ($query) use ($input) {
			$query = $query->where('type', PROPOSAL_USER);
			if ($input['salary_start']) {
				$query = $query->where('salary_history.salary_old', '>=', $input['salary_start']);
			}
			if ($input['salary_end']) {
				$query = $query->where('salary_history.salary_old', '<=', $input['salary_end']);
			}
			if ($input['username']) 
			{
				$userName = User::where('username', 'like', '%'.$input['username'].'%')->lists('id');
				$query = $query->whereIn('model_id', $userName);
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.salary.old.index')->with(compact('data'));
	}
	public function getFormatTypeSalary()
	{
		$typesalary = Input::get('type_dep_regency');
		$data = array();
		if($typesalary == PROPOSAL_DEP)
		{
			$data = Department::lists('name', 'id');
		}
		if($typesalary == PROPOSAL_REGENCY)
			$data = Regency::lists('name', 'id');	
		return View::make('admin.salary.salary_normal')->with(compact('data'));
	}	
	public function ajaxGetUser()
	{
		$username = Input::get('username');
		$user = User::where('username', $username)->first();
		$userId = $user->id;
		$array = CommonSalary::getDepRegency($userId);
		return View::make('admin.salary.dep_regency')->with(compact('array'));
	}
	public function getDetailUser()
	{
		// return 1;
		$username = Input::get('username');
		$user = User::where('username', $username)->first();
		$userId = $user->id;
		$salary = SalaryUser::where('user_id', $userId)
			->where('status', SALARY_APPROVE)
			->first();
		return View::make('admin.salary.detailEmployee')->with(compact('salary'));
	}

}
