<?php

class ResourceManagementController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $data = Resource::orderBy('id', 'desc')->paginate(PAGINATE);
		$data = ResourceOffice::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.resource.office.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.resource.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			// 'name' => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ResourceManagementController@create')
	            ->withErrors($validator);
        }else{
        	$input['status'] = 1;
        	// $id = CommonNormal::create($input);
        	CommonUpload::uploadFile($input, USER_AVATAR);
        	return Redirect::action('ResourceManagementController@index');

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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
