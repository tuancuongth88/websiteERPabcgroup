<?php

class ProjectStatusController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = ProjectStatus::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.projectStatus.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.projectStatus.create');
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
			return Redirect::action('ProjectStatusController@create')
	            ->withErrors($validator);
        } else {
			CommonNormal::create($input);
			return Redirect::action('ProjectStatusController@index');	
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
		$data = ProjectStatus::find($id);
		return View::make('admin.projectStatus.edit')->with(compact('data'));
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
			return Redirect::action('ProjectStatusController@edit', $id)
	            ->withErrors($validator);
        }else{
        	CommonNormal::update($id, $input);
        	return Redirect::action('ProjectStatusController@index');
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
		$checkStatusProject = Project::where('status', $id)
			->first();
		if($checkStatusProject) {
			return Redirect::action('ProjectStatusController@index')->with('error', 'Trạng thái đang được sử dụng. Không thể xóa!');	
		}
		CommonNormal::delete($id);
		return Redirect::action('ProjectStatusController@index')->with('message', 'Đã xóa');
	}


}
