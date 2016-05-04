<?php

class ManagementController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$data = User::orderBy('id', 'asc')->paginate(PAGINATE);
		return View::make('admin.management.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.management.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'username' => 'required',
			'phone' => 'required',
			'dep_id' => 'tunglaso1'
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagementController@create')
	            ->withErrors($validator);
        }else{
        	if(!isset($input['dep_id'])){
        		dd(999);
        		Redirect::action('ManagementController@create')
	            ->withErrors('phải chọn phòng ban!');
        	}else{
				$id = CommonNormal::create($input);
				$dep_user_regenci['dep_id'] = $input->get('dep_id');
				return Redirect::action('ManagementController@index');	
        	}
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
		$data = User::find($id);
		return View::make('admin.management.edit')->with(compact('data'));
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
			'username' => 'required',
			'phone' => 'required|integer',
		);
		$input = Input::except('_token');

		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagementController@edit', $id)
	            ->withErrors($validator);
        }else{
        	CommonNormal::update($id, $input);
        	return Redirect::action('ManagementController@index') ;
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
		return Redirect::action('ManagementController@index') ;
	}


}
