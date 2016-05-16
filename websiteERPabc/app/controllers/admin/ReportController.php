<?php

class ReportController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user()->get();
		$data = Report::orderBy('id', 'desc');
		$data = $data->paginate(PAGINATE);
		//show ra báo cáo của những người dưới chức vụ của mình và báo cáo của mình,
		// không được thấy báo cáo của người khác
		return View::make('admin.report.index')->with(compact('data'));
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
		return View::make('admin.report.index')->with(compact('data'));
	}

	public function search()
	{
		$data = CommonTask::search();
		return View::make('admin.report.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.report.create');
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
			return Redirect::action('ReportController@create')
	            ->withErrors($validator);
        } else {
        	$user = Auth::user()->get();
        	if($user) {
				$userId = $user->id;
			} else {
				$userId = NULL;
			}
			$inputTask = Input::except('_token', 'user_id', 'per_id');
			//tao moi
			$inputTask['user_id'] = $userId;
			$taskId = Task::create($inputTask)->id;
			//save user
			if(isset($input['user_id'])) {
				$inputUser = $input['user_id'];
				$inputPer = $input['per_id'];
				foreach ($inputUser as $key => $value) {
					$inputTaskUser['user_id'] = $inputUser[$key];
					$inputTaskUser['task_id'] = $taskId;
					$inputTaskUser['per_id'] = $inputPer[$key];
					$inputTaskUser['status'] = ASSIGN_STATUS_3;
					$inputTaskUser['assign_id'] = $userId;
					TaskUser::create($inputTaskUser);
				}
			}
			return Redirect::action('ReportController@index')->with('message', 'Tạo mới thành công');
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
		return View::make('admin.report.show')->with(compact('task'));
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
		return View::make('admin.report.edit')->with(compact('data', 'taskUser'));
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
			return Redirect::action('ReportController@edit', $id)
	            ->withErrors($validator);
        } else {
        	$user = Auth::user()->get();
        	if($user) {
				$userId = $user->id;
			} else {
				$userId = NULL;
			}
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
			//save user
			if(isset($input['user_id'])) {
				//xoa truoc khi cap nhat lai
				TaskUser::where('task_id', $id)
						->delete();
				$inputUser = $input['user_id'];
				$inputPer = $input['per_id'];
				foreach ($inputUser as $key => $value) {
					$inputTaskUser['per_id'] = $inputPer[$key];
					$inputTaskUser['task_id'] = $id;
					$inputTaskUser['user_id'] = $inputUser[$key];
					$inputTaskUser['status'] = ASSIGN_STATUS_3;
					$inputTaskUser['assign_id'] = $userId;
					TaskUser::create($inputTaskUser);
				}
			}
			return Redirect::action('ReportController@index')->with('message', 'Sửa thành công');
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
		return Redirect::action('ReportController@index')->with('message', 'Xóa thành công');
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
		return View::make('admin.report.assign')->with(compact('taskUserKey'));
	}
	public function comment($taskId)
	{
		$input = Input::except('_token');
		$input['status'] = ACTIVE;
		$commentId = Common::insertComment('Task', $taskId, $input);
		return Redirect::action('ReportController@index');
	}

}
