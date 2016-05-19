<?php

class UserTypeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = TypeUser::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.user_type.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.user_type.create');	
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
			return Redirect::action('UserTypeController@create')
	            ->withErrors($validator);
        } else {
        	$input['status'] = ACTIVE;
			TypeUser::create($input);
			return Redirect::action('UserTypeController@index');	
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
		$data = TypeUser::find($id);
		return View::make('admin.user_type.edit')->with(compact('data'));
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
		$typeReport = TypeUser::find($id);
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('UserTypeController@edit', $id)
	            ->withErrors($validator);
        }else{
        	$typeReport->update($input);
        	return Redirect::action('UserTypeController@index');
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
		CommonNormal::delete($id);
		return Redirect::action('UserTypeController@index') ;
	}


}
