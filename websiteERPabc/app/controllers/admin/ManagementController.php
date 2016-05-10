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
			'email' => 'required',
			'username' => 'required',
			'password' => 'required',
			'phone' => 'required',
			'date_of_birth' => 'required',
			'sex' => 'required',
			'ethnic' => 'required',
			'identity_card' => 'required',
			'current_address' => 'required',
			'address' => 'required',
			'degree' => 'required',
			'marriage' => 'required',
			'salary' => 'required',
			'start_time' => 'required',
			'end_time' => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagementController@create')
				->withErrors($validator);
		}else{
			$input_User = Input::only('name', 'email', 'username', 'password', 'phone','date_of_birth', 'sex', 'ethnic', 'identity_card', 'current_address', 'address','personal_file', 'medical_file', 'curriculum_vitae_file', 'degree', 'skyper', 'number_tax', 'number_insure', 'marriage', 'note', 'type_id', 'salary', 'start_time', 'end_time', 'avatar');
			$input_User['password'] = Hash::make($input_User['password']);
			$id = CommonNormal::create($input_User);
			$input_User_file = Input::only('avatar', 'personal_file', 'medical_file', 'curriculum_vitae_file');
			//xu ly upload file
			//upload file avata
			$input_User['avatar'] = CommonUser::uploadAction('avatar', PROFILE.'/'.$id.'/avatar');
			//upload file so yeu ly lich
			$input_User['personal_file'] = CommonUser::uploadAction('personal_file', PROFILE.'/'.$id.'/file');
			//upload file giay kham suc khoe
			$input_User['medical_file'] = CommonUser::uploadAction('medical_file', PROFILE.'/'.$id.'/file');
			//upload file ho so cv
			$input_User['curriculum_vitae_file'] = CommonUser::uploadAction('curriculum_vitae_file', PROFILE.'/'.$id.'/file');
			CommonNormal::update($id, $input_User);
			//insert phong ban
			CommonUser::insertDepartment($id, $input);
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
			'username' => 'required',
			'phone' => 'required|integer',
		);
		$input = Input::except('_token');

		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagementController@edit', $id)
				->withErrors($validator);
		}else{
			$input_User = Input::only('name', 'email', 'username', 'password', 'phone','date_of_birth', 'sex', 'ethnic', 'identity_card', 'current_address', 'address', 'degree', 'skyper', 'number_tax', 'number_insure', 'marriage', 'note', 'type_id', 'salary', 'start_time', 'end_time');
			$input_User_file = Input::only('avatar', 'personal_file', 'medical_file', 'curriculum_vitae_file');
			//xu ly upload file
			//upload file avata
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
			User::find($id)->department()->detach();
			CommonUser::insertDepartment($id, $input);
			return Redirect::action('ManagementController@index') ;
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
		User::find($id)->department()->detach();
		CommonNormal::delete($id);
		return Redirect::action('ManagementController@index') ;
	}

	public function assignDepartmentUser()
	{
		$departmentUserKey = Input::get('departmentUserKey');
		return View::make('admin.management.assign')->with(compact('departmentUserKey'));
	}
	public function loadUserFunction()
	{
		$dep_id = Input::get('dep_id');
		//select cac function theo dep_id
		// $fun = AdminFunction::find($dep_id)->lists('name');
		$listID = DepRegencyPerFun::where('dep_id', '=' ,$dep_id)->lists('function_id');
		$data = AdminFunction::whereIn('id', $listID)->lists('name', 'id');
		return Response::json($data);
	}

}
