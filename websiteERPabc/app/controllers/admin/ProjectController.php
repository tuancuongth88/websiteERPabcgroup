<?php

class ProjectController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Project::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.project.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.project.create');
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
		);
		$input = Input::except('_token');
		// dd($input);

		// $validator = Validator::make($input, $rules);
		// if($validator->fails()) {
		// 	return Redirect::action('ProjectController@create')
	 //            ->withErrors($validator);
  //       } else {
		// 	CommonNormal::create($input);
		// 	return Redirect::action('ProjectController@index');	
  //       }
		$inputProject = Input::except('_token', 'user_id', 'temp_role_id', 'per_id');
		//tao moi project
		$projectId = Project::create($inputProject)->id;
		//save project_user
		$inputUser = $input['user_id'];
		$inputTempRole = $input['temp_role_id'];
		$inputPer = $input['per_id'];
		foreach ($inputUser as $key => $value) {
			foreach ($inputPer[$key] as $k => $v) {
				$inputProjectUser['user_id'] = $inputUser[$key];
				$inputProjectUser['temp_role_id'] = $inputTempRole[$key];
				$inputProjectUser['project_id'] = $projectId;
				$inputProjectUser['per_id'] = $v;
				ProjectUser::create($inputProjectUser);
			}
		}
		return Redirect::action('ProjectController@index');
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

	public function assignProjectUser()
	{
		$projectUserKey = Input::get('projectUserKey');
		// dd($projectUserKey);
		return View::make('admin.project.assign')->with(compact('projectUserKey'));
	}

}
