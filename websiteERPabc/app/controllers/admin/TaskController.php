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
		$data = Task::join('task_users', 'task_users.task_id', '=', 'tasks.id')
			->select('tasks.*')
			->where('task_users.status', '!=', ASSIGN_STATUS_2);
			// dd($data->toArray());
		if($user) {
			if($user->role_id != ROLE_ADMIN) {
				$data = $data->where('tasks.user_id', $user->id);
				$data = $data->orWhere('task_users.user_id', $user->id);
				$data = $data->orWhere('task_users.assign_id', $user->id);
			}
		}
		$data = $data->distinct()->groupBy('tasks.id')
			->orderBy('tasks.id', 'desc')->paginate(PAGINATE);
		return View::make('admin.task.index')->with(compact('data'));
	}

	public function filter($taskStatusId = null)
	{
		$data = CommonTask::filterTask($taskStatusId, 1);
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
        	$userId = CommonUser::getUserId();
			$inputTask = Input::except('_token', 'user_id', 'per_id');
			//tao moi
			$inputTask['user_id'] = $userId;
			$taskId = Task::create($inputTask)->id;
			//save user
			// dd(22);
			if(isset($input['user_id'])) {
				$inputUser = $input['user_id'];
				$inputPer = $input['per_id'];
				foreach ($inputUser as $key => $value) {
					$inputTaskUser['user_id'] = $inputUser[$key];
					$inputTaskUser['task_id'] = $taskId;
					$inputTaskUser['per_id'] = $inputPer[$key];
					$inputTaskUser['assign_id'] = $userId;
					if($inputUser[$key] == $userId) {
						$inputTaskUser['status'] = ASSIGN_STATUS_1;	
					} else {
						$inputTaskUser['status'] = ASSIGN_STATUS_3;
					}
					TaskUser::create($inputTaskUser);
				}
			}
			// dd(11);
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
        	$userId = CommonUser::getUserId();
			$inputTask = Input::except('_token', 'user_id', 'per_id');
			//sua task
			$task = Task::find($id);
			$task->update($inputTask);
			//save user
			if(isset($input['user_id'])) {
				$assignId = TaskUser::where('task_id', $id)->first()->assign_id;
				$listUserStatus = TaskUser::where('task_id', $id)->lists('status', 'user_id');
				//xoa truoc khi cap nhat lai
				TaskUser::where('task_id', $id)
						->delete();
				$inputUser = $input['user_id'];
				$inputPer = $input['per_id'];
				foreach ($inputUser as $key => $value) {
					$inputTaskUser['user_id'] = $inputUser[$key];
					$inputTaskUser['task_id'] = $id;
					$inputTaskUser['per_id'] = $inputPer[$key];
					$inputTaskUser['assign_id'] = $assignId;
					if (isset($listUserStatus[$value])) {
						$inputTaskUser['status'] = $listUserStatus[$value];
					}
					else {
						$inputTaskUser['status'] = ASSIGN_STATUS_3;
					}
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
		// $checkTaskUser = TaskUser::where('task_id', $id)
		// 	->first();
		// if($checkTaskUser) {
		// 	return Redirect::action('TaskController@index')->with('error', 'Công việc đang thực hiện. Không thể xóa!');
		// }
		TaskUser::where('task_id', $id)->delete();
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
	public function accept($id)
	{
		$userId = CommonUser::getUserId();
		$task = TaskUser::where('task_id', $id)
			->where('user_id', $userId)
			->first();
		if($task) {
			$task->update(['status' => ASSIGN_STATUS_1]);
		}
		$url = $_SERVER['HTTP_REFERER'];
		return Redirect::to($url);
	}
	public function refuse($id)
	{
		$userId = CommonUser::getUserId();
		$task = TaskUser::where('task_id', $id)
			->where('user_id', $userId)
			->first();
		if($task) {
			$task->update(['status' => ASSIGN_STATUS_2]);
		}
		$url = $_SERVER['HTTP_REFERER'];
		return Redirect::to($url);
	}


}
