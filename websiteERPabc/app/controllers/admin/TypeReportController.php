<?php

class TypeReportController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = TypeReport::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.type_report.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.type_report.create');
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
			return Redirect::action('TypeReportController@create')
	            ->withErrors($validator);
        } else {
			TypeReport::create($input);
			return Redirect::action('TypeReportController@index');	
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
		$data = TypeReport::find($id);
		return View::make('admin.type_report.edit')->with(compact('data'));
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
		$typeReport = TypeReport::find($id);
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('TypeReportController@edit', $id)
	            ->withErrors($validator);
        }else{
        	$typeReport->update($input);
        	return Redirect::action('TypeReportController@index');
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
		$checkTempRoleProjectUser = ProjectUser::where('temp_role_id', $id)
			->first();
		if($checkTempRoleProjectUser) {
			return Redirect::action('TypeReportController@index')->with('error', 'Vai trò đang được sử dụng. Không thể xóa!');	
		}
		CommonNormal::delete($id);
		return Redirect::action('TypeReportController@index')->with('message', 'Đã xóa');
	}


}
