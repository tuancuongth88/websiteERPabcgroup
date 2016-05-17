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
        	$userId = CommonUser::getUserId();
			$inputProject = Input::except('_token', 'user_id', 'temp_role_id', 'per_id');
			//tao moi project
			$inputProject['user_id'] = $userId;
			$projectId = Project::create($inputProject)->id;
			//save project_user
			if(isset($input['user_id'])) {
				$inputUser = $input['user_id'];
				$inputTempRole = $input['temp_role_id'];
				$inputPer = $input['per_id'];
				foreach ($inputUser as $key => $value) {
					$inputProjectUser['user_id'] = $inputUser[$key];
					$inputProjectUser['temp_role_id'] = $inputTempRole[$key];
					$inputProjectUser['project_id'] = $projectId;
					$inputProjectUser['per_id'] = $inputPer[$key];
					$inputProjectUser['status'] = ASSIGN_STATUS_3;
					$inputProjectUser['assign_id'] = $userId;
					ProjectUser::create($inputProjectUser);
				}
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
        	$userId = CommonUser::getUserId();
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
			if(isset($input['user_id'])) {
				//xoa truoc khi cap nhat lai
				ProjectUser::where('project_id', $id)
						->delete();
				$inputUser = $input['user_id'];
				$inputTempRole = $input['temp_role_id'];
				$inputPer = $input['per_id'];
				foreach ($inputUser as $key => $value) {
					$inputProjectUser['per_id'] = $inputPer[$key];
					$inputProjectUser['temp_role_id'] = $inputTempRole[$key];
					$inputProjectUser['user_id'] = $inputUser[$key];
					$inputProjectUser['project_id'] = $id;
					$inputProjectUser['status'] = ASSIGN_STATUS_3;
					$inputProjectUser['assign_id'] = $userId;
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
		$checkProjectUser = ProjectUser::where('project_id', $id)
			->first();
		$checkProjectTask = Task::where('project_id', $id)
			->first();
		if($checkProjectUser || $checkProjectTask) {
			return Redirect::action('ProjectController@index')->with('error', 'Dự án đang hoạt động. Không thể xóa!');
		}
		CommonNormal::delete($id);
		return Redirect::action('ProjectController@index')->with('message', 'Đã xóa');
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
