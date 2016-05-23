<?php

class TypeNotificationController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = TypeNotification::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.type_notification.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.type_notification.create');
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
			return Redirect::action('TypeNotificationController@create')
	            ->withErrors($validator);
        } else {
			TypeNotification::create($input);
			return Redirect::action('TypeNotificationController@index');	
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
		$data = TypeNotification::find($id);
		return View::make('admin.type_notification.edit')->with(compact('data'));
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
		$typeReport = TypeNotification::find($id);
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('TypeNotificationController@edit', $id)
	            ->withErrors($validator);
        }else{
        	$typeReport->update($input);
        	return Redirect::action('TypeNotificationController@index');
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
		$typeNotification = TypeNotification::find($id);
		if ($typeNotification) {
			$typeNotification->delete();
			return Redirect::action('TypeNotificationController@index')->with('message', 'Đã xóa');
		}
		return Redirect::action('TypeNotificationController@index')->with('message', 'Lỗi không thể xoá');
	}


}
