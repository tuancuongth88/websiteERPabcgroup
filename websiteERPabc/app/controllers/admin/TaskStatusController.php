<?php

class TaskStatusController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = TaskStatus::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.taskStatus.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.taskStatus.create');
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
			return Redirect::action('TaskStatusController@create')
				->withErrors($validator);
		} else {
			CommonNormal::create($input);
			return Redirect::action('TaskStatusController@index');
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
		$data = TaskStatus::find($id);
		return View::make('admin.taskStatus.edit')->with(compact('data'));
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
			return Redirect::action('TaskStatusController@edit', $id)
				->withErrors($validator);
		}else{
			CommonNormal::update($id, $input);
			return Redirect::action('TaskStatusController@index');
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
		$checkStatusTask = Project::where('status', $id)
			->first();
		if($checkStatusTask) {
			return Redirect::action('TaskStatusController@index')->with('error', 'Trạng thái đang được sử dụng. Không thể xóa!');
		}
		CommonNormal::delete($id);
		return Redirect::action('TaskStatusController@index')->with('message', 'Đã xóa');
	}


}
