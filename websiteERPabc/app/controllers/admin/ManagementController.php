<?php

class ManagementController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$data = User::orderBy('id', 'asc')->paginate(PAGINATE);
		return View::make('admin.management.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.management.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' => 'required',
			'email' => 'required|email',
			'username' => 'required|unique:users',
			'password' => 'required',
			'phone' => 'required',
			'date_of_birth' => 'required',
			'sex' => 'required',
			'identity_card' => 'required',
			'current_address' => 'required',
			'address' => 'required',
			'degree' => 'required',
			'marriage' => 'required',
			'start_time' => 'required',
			'end_time' => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagementController@create')
				->withErrors($validator);
		}else{
			
			$input_User = CommonUser::getInput($input);
			// $input_User = $input;
			$input_User['password'] = Hash::make($input['password']);
			$inputUser['role_id'] = ROLE_USER;
			$input_User['status'] = ASSIGN_STATUS_3;
			$input_User['role_id'] = ROLE_USER;
			$id = CommonNormal::create($input_User);
			$input_User_file = Input::only('avatar', 'personal_file', 'medical_file', 'curriculum_vitae_file');
			//xu ly upload file
			//upload file avatar
			$input_User['avatar'] = CommonUser::uploadAction('avatar', PROFILE.'/'.$id.'/avatar');
			//upload file so yeu ly lich
			$input_User['personal_file'] = CommonUser::uploadAction('personal_file', PROFILE.'/'.$id.'/file');
			//upload file giay kham suc khoe
			$input_User['medical_file'] = CommonUser::uploadAction('medical_file', PROFILE.'/'.$id.'/file');
			//upload file ho so cv
			$input_User['curriculum_vitae_file'] = CommonUser::uploadAction('curriculum_vitae_file', PROFILE.'/'.$id.'/file');
			CommonNormal::update($id, $input_User);
			//insert phong ban
			if (isset($input['dep_id'])) {
				CommonUser::insertDepartment($id, $input, ASSIGN_STATUS_3);
			}
			return Redirect::action('ManagementController@index');	
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
		$data = User::find($id);
		return View::make('admin.management.show')->with(compact('data'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = User::find($id);
		return View::make('admin.management.edit')->with(compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'name' => 'required',
		);
		$input = Input::except('_token');

		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagementController@edit', $id)
				->withErrors($validator);
		}else{
			$input_User = CommonUser::getInput($input);
			$input_User_file = Input::only('avatar', 'personal_file', 'medical_file', 'curriculum_vitae_file');
			//xu ly upload file
			//upload file avata
			// if (isset($input['username'])) {
			// 	$input['username'] = $input['username'];
			// }
			// if (!isset($input['username'])) {
			// 	$input['username'] = User::find($id)->username;
			// }
			if($input_User_file['avatar'])
				$input_User['avatar'] = CommonUser::uploadAction('avatar', PROFILE.'/'.$id.'/avatar');
			//upload file so yeu ly lich
			if($input_User_file['personal_file'])
				$input_User['personal_file'] = CommonUser::uploadAction('personal_file', PROFILE.'/'.$id.'/file');
			//upload file giay kham suc khoe
			if($input_User_file['medical_file'])
				$input_User['medical_file'] = CommonUser::uploadAction('medical_file', PROFILE.'/'.$id.'/file');
			//upload file ho so cv
			if($input_User_file['curriculum_vitae_file'])
			$input_User['curriculum_vitae_file'] = CommonUser::uploadAction('curriculum_vitae_file', PROFILE.'/'.$id.'/file');
			CommonNormal::update($id, $input_User);
			//update phòng ban
			if (isset($input['dep_id'])) {
				$projectDepartIDStatus = DepRegencyUserParent::where('user_id',  $id)->lists('status', 'dep_id');
				$departmentUserId = DepRegencyUserParent::where('user_id', $id)
					->lists('dep_id');
				DepRegencyUserParent::where('user_id', $id)->delete();
				CommonUser::insertDepartment($id, $input, $projectDepartIDStatus, $departmentUserId);
			}
			return Redirect::action('ManagementController@index')->with('message', 'Cập nhật tài khoản thành công');
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
		DepRegencyUserParent::where('user_id', $id)->delete();
		CommonNormal::delete($id);
		return Redirect::action('ManagementController@index') ;
	}

	public function assignDepartmentUser()
	{
		$departmentUserKey = Input::get('departmentUserKey');
		// dd($departmentUserKey);
		return View::make('admin.management.assign')->with(compact('departmentUserKey'));
	}

	public function loadButton()
	{
		$fun_id = Input::get('fun_id');
		$data = ButtonFunction::where('function_id', $fun_id)->lists('name', 'id');
		return Response::json($data);
	}

	public function resPassword($id)
	{
		$data = User::find($id);
		return View::make('admin.management.changepassword')->with(compact('data'));
	}

	public function updatePassword($id)
	{
		$rules = array(
			'password'   => 'required',
			'repassword' => 'required|same:password'
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagementController@resPassword',$id)
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else 
		{
			$inputPass['password'] = Hash::make($input['password']);
			CommonNormal::update($id, $inputPass);
			return Redirect::action('ManagementController@index')->with('message', 'Thay đổi mật khẩu thành công');
		}
			return Redirect::action('ManagementController@index')->with('message', 'Thay đổi mật khẩu không thành công');
	}
	//search user
	public function search()
	{
		$input = Input::except('_token');
		if ($input['keyword']) {
			$data = User::where('username', 'LIKE', '%' . $input['keyword'] . '%')
				->paginate(PAGINATE);
		}
		else {
			$data = User::orderBy('id', 'desc')->paginate(PAGINATE);
		}
		return View::make('admin.management.index')->with(compact('data'));
	}

	public function createadmin()
	{
		return View::make('admin.management.create_admin');
	}

	public function doCreateadmin()
	{
		$rules = array(
			'password'   => 'required',
			'username' => 'required|unique:users',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagementController@createadmin')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} 
		else 
		{
			if(CommonUser::checkUserIsExit($input['username'])){
				return Redirect::action('ManagementController@createadmin')->with('warning', 'Tài khoản này đã tồn tại nhập tài khoản khác!');
			}
			$input['role_id'] = ROLE_ADMIN;
			CommonNormal::create($input);
			return Redirect::action('ManagementController@index')->with('message', 'Thêm mới admin thành công');
		}
	}

	public function updateadmin($id)
	{
		$data = User::find($id);
		return View::make('admin.management.edit_admin')->with(compact('data'));
	}

	public function doUpdateadmin($id)
	{
		$rules = array(
			'username' => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagementController@updateadmin', $id)
				->withErrors($validator);
		} 
		else 
		{
			if(CommonUser::checkUserIsExit($input_User['username']))
				return Redirect::action('ManagementController@create')->with('message', 'tài khoản này đã tồn tại nhập tài khoản khác!');
			CommonNormal::update($id, $input, 'User');
			return Redirect::action('ManagementController@index')->with('message', 'Cập nhật admin thành công');
		}
	}

	public function showadmin($id)
	{
		$data = User::find($id);
		return View::make('admin.management.show_admin')->with(compact('data'));
	}
	//
	public function accept($id)
	{
		$userId = CommonUser::getUserId();
		// $projectUser = DepRegencyPerUser::where('dep_id', $id)
		// 	->where('user_id', $userId)
		// 	->first();
		if($projectUser) {
			$projectUser->update(['status' => ASSIGN_STATUS_1]);
		}
		$url = $_SERVER['HTTP_REFERER'];
		return Redirect::to($url);
	}

	public function refuse($id)
	{
		$userId = CommonUser::getUserId();
		// $projectUser = DepRegencyPerUser::where('dep_id', $id)
		// 	->where('user_id', $userId)
		// 	->first();
		if($projectUser) {
			$projectUser->update(['status' => ASSIGN_STATUS_2]);
		}
		$url = $_SERVER['HTTP_REFERER'];
		return Redirect::to($url);
	}

	public function changePermissionUser($id)
	{
		$data = User::find($id);
		$dataPermission = FunButtonUser::where('user_id', $id)->get();
		// dd($dataPermission->toArray());
		return View::make('admin.management.changepermission')->with(compact('data', 'dataPermission'));
	}
	public function assignFunPerUser()
	{
		$functionKey = Input::get('functionKey');
		if($functionKey == '') {
			$functionKey = 0;
		} else {
			$functionKey = max($functionKey);
			$functionKey++;
		}
		return View::make('admin.management.assignFun')->with(compact('functionKey'));
	}
	public function doChangePermissionUser($id)
	{
		$input = Input::except('_token');
		// dd($input);
		$rules = array(
			'button_id'   => 'required',
		);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagementController@doChangePermissionUser', $id)
				->withErrors($validator);
		} 
		//delete tao bo truoc khi cap nhat
		FunButtonUser::where('user_id', $id)->delete();

		$inputFun_id = $input['fun_id'];
		$inputButton_id = $input['button_id'];
		foreach ($inputFun_id as $key => $value) {
			$inputdata['fun_id'] = $value;
			$inputdata['user_id'] = $id;
			foreach ($inputButton_id[$key] as $keybutton => $valuebutton) {
				$inputdata['button_id'] = $valuebutton;
				FunButtonUser::create($inputdata);
			}
		}
		return Redirect::action('ManagementController@index');
	}

}
