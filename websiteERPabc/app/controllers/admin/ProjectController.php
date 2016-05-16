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

	public function search()
	{
		$data = CommonProject::search();
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
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('ProjectController@create')
	            ->withErrors($validator);
        } else {
        	$user = Auth::user()->get();
			$inputProject = Input::except('_token', 'user_id', 'temp_role_id', 'per_id');
			//tao moi project
			$projectId = Project::create($inputProject)->id;
			//save project_user
			$inputUser = $input['user_id'];
			$inputTempRole = $input['temp_role_id'];
			$inputPer = $input['per_id'];
			foreach ($inputUser as $key => $value) {
				$inputProjectUser['user_id'] = $inputUser[$key];
				$inputProjectUser['temp_role_id'] = $inputTempRole[$key];
				$inputProjectUser['project_id'] = $projectId;
				$inputProjectUser['per_id'] = $inputPer[$key];
				$inputProjectUser['status'] = ASSIGN_STATUS_3;
				if($user) {
					$inputProjectUser['assign_id'] = $user->id;
				}
				ProjectUser::create($inputProjectUser);
			}
			return Redirect::action('ProjectController@index')->with('message', 'Tạo mới thành công');
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
		$data = Project::find($id);
		$projectUser = ProjectUser::where('project_id', $data->id)
						->groupBy('user_id')
						->get();
		return View::make('admin.project.edit')->with(compact('data', 'projectUser'));
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
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('ProjectController@edit', $id)
	            ->withErrors($validator);
        } else {
        	$user = Auth::user()->get();
			$inputProject = Input::except('_token', 'user_id', 'temp_role_id', 'per_id');
			//sua project
			$project = Project::find($id);
			$project->update(array(
					'name' => $inputProject['name'],
					'start' => $inputProject['start'],
					'end' => $inputProject['end'],
					'percent' => $inputProject['percent'],
					'description' => $inputProject['description'],
					'status' => $inputProject['status'],
				));
			//save project_user
			$inputUser = $input['user_id'];
			$inputTempRole = $input['temp_role_id'];
			$inputPer = $input['per_id'];
			$projectUser = ProjectUser::where('project_id', $id)
					->where('user_id', $inputUser)
					->first();
			foreach ($inputUser as $key => $value) {
				$inputProjectUser['per_id'] = $inputPer[$key];
				if($projectUser) {
					$projectUser->update($inputProjectUser);
				} else {
					$inputProjectUser['user_id'] = $inputUser[$key];
					$inputProjectUser['project_id'] = $id;
					$inputProjectUser['temp_role_id'] = $inputTempRole[$key];
					$inputProjectUser['status'] = ASSIGN_STATUS_3;
					if($user) {
						$inputProjectUser['assign_id'] = $user->id;
					}
					ProjectUser::create($inputProjectUser);	
				}
			}
			return Redirect::action('ProjectController@index')->with('message', 'Sửa thành công');
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
		//
	}

	public function assignProjectUser()
	{
		$projectUserKeys = Input::get('projectUserKey');
		if($projectUserKeys == '') {
			$projectUserKey = 0;
		} else {
			$projectUserKey = max($projectUserKeys);
			$projectUserKey++;
		}
		return View::make('admin.project.assign')->with(compact('projectUserKey'));
	}

}
