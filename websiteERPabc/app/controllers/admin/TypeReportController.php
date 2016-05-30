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
			$typeId = TypeReport::create($input)->id;
			if ($input['dep_id'] != 0) {
				$input['url'] = CommonUser::uploadAction('url', REPORT_FORMAT.'/'.$typeId);
			}
			else {
				$input['url'] = CommonUser::uploadAction('url', REPORT_FORMAT);
			}
			TypeReport::find($typeId)->update($input);
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
			if ($input['dep_id'] != 0) {
				$input['url'] = CommonUser::uploadAction('url', REPORT_FORMAT.'/'.$id, $typeReport->url);
			}
			else {
				$input['url'] = CommonUser::uploadAction('url', REPORT_FORMAT, $typeReport->url);
			}
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
		$typeReport = TypeReport::find($id);
		if ($typeReport) {
			$typeReport->delete();
			return Redirect::action('TypeReportController@index')->with('message', 'Đã xóa');
		}
		return Redirect::action('TypeReportController@index')->with('message', 'Lỗi không thể xoá');
	}


}
