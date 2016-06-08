<?php
class SalaryUserController extends AdminController {

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
		$data = User::select('id', 'username')->get()->toArray();
		return View::make('admin.salary.create')->with(compact('data'));
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
      			'salary_origin' => $input['salary_origin'],
      			'status' => SALARY_PROPOSAL,
      			'user_id' => $userId,
      			'dep_id' => $depId,
      			'regency_id' => $regencyId,
      		];
      		$salaryId = SalaryUser::create($inputSalary)->id;
        	//create new recored history salary in the table: salary_histories: status : 4
   			
   			dd($salaryId);

   //      	$input['status'] = SALARY_PROPOSAL;
   //      	$salaryId = SalaryUser::create(['salary' => $input['salary']])->id;
   //      	User::find($input['user_id'])->update(['salary_id' => $salaryId]);
			// return Redirect::action('SalaryUserController@index');	
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
	public function ajaxGetUser()
	{
		$username = Input::get('username');
		$user = User::where('username', $username)->first();
		$userId = $user->id;
		$array = CommonSalary::getDepRegency($userId);
		return View::make('admin.salary.dep_regency')->with(compact('array'));
		// $list = CommonSalary::getListNoSalaryUser();
		// return Response::json(array('data' => $list));
	}
}
