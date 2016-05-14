<?php

class TaskController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user()->get();
		$data = Task::orderBy('id', 'desc');
		if($user) {
			$data = $data->where('user_id', $user->id);
		}
		$data = $data->paginate(PAGINATE);
		return View::make('admin.task.index')->with(compact('data'));
	}

	public function filter($status = null)
	{
		$user = Auth::user()->get();
		$data = Task::orderBy('id', 'desc');
		if($user) {
			$data = $data->where('user_id', $user->id);
		}
		switch ($status) {
			case TASK_STATUS_1:
				$data = $data->where('status', TASK_STATUS_1);
				break;
			case TASK_STATUS_2:
				$data = $data->where('status', TASK_STATUS_2);
				break;
			case TASK_STATUS_3:
				$data = $data->where('status', TASK_STATUS_3);
				break;
			
			default:
				# code...
				break;
		}
		$data = $data->paginate(PAGINATE);
		return View::make('admin.task.index')->with(compact('data'));
	}

	public function search()
	{
		$data = CommonTask::search();
		return View::make('admin.task.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.task.create');
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
			return Redirect::action('TaskController@create')
	            ->withErrors($validator);
        } else {
			$inputTask = Input::except('_token', 'user_id', 'per_id');
			//tao moi 
			$user = Auth::user()->get();
			if($user) {
				$inputTask['user_id'] = $user->id;
			}
			$taskId = Task::create($inputTask)->id;
			//save user
			$inputUser = $input['user_id'];
			$inputPer = $input['per_id'];
			foreach ($inputUser as $key => $value) {
				foreach ($inputPer[$key] as $k => $v) {
					$inputTaskUser['user_id'] = $inputUser[$key];
					$inputTaskUser['task_id'] = $taskId;
					$inputTaskUser['per_id'] = $v;
					TaskUser::create($inputTaskUser);
				}
			}
			return Redirect::action('TaskController@index')->with('message', 'Tạo mới thành công');
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
		$task = Task::find($id);
		// dd(1);
		return View::make('admin.task.show')->with(compact('task'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Task::find($id);
		$taskUser = TaskUser::where('task_id', $data->id)
						->groupBy('user_id')
						->get();
		return View::make('admin.task.edit')->with(compact('data', 'taskUser'));
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
			return Redirect::action('TaskController@edit', $id)
	            ->withErrors($validator);
        } else {
			$inputTask = Input::except('_token', 'user_id', 'per_id');
			//sua task
			$task = Task::find($id);
			$task->update(array(
					'name' => $inputTask['name'],
					'project_id' => $inputTask['project_id'],
					'start' => $inputTask['start'],
					'end' => $inputTask['end'],
					'percent' => $inputTask['percent'],
					'description' => $inputTask['description'],
					'status' => $inputTask['status'],
				));
			//xoa user truoc khi update
			TaskUser::where('task_id', $id)->delete();
			//save user
			$inputUser = $input['user_id'];
			$inputPer = $input['per_id'];
			foreach ($inputUser as $key => $value) {
				foreach ($inputPer[$key] as $k => $v) {
					$inputTaskUser['user_id'] = $inputUser[$key];
					$inputTaskUser['task_id'] = $id;
					$inputTaskUser['per_id'] = $v;
					TaskUser::create($inputTaskUser);
				}
			}
			return Redirect::action('TaskController@index')->with('message', 'Sửa thành công');
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
		TaskUser::where('task_id', $id)
			->delete();
		Task::find($id)->delete();
		return Redirect::action('TaskController@index')->with('message', 'Xóa thành công');
	}

	public function assignTaskUser()
	{
		$taskUserKeys = Input::get('taskUserKey');
		if($taskUserKeys == '') {
			$taskUserKey = 0;
		} else {
			$taskUserKey = max($taskUserKeys);
			$taskUserKey++;
		}
		return View::make('admin.task.assign')->with(compact('taskUserKey'));
	}
	public function comment($taskId)
	{
		$input = Input::except('_token');
		$input['status'] = ACTIVE;
		$commentId = Common::insertComment('Task', $taskId, $input);
		return Redirect::action('TaskController@index');
	}

}
