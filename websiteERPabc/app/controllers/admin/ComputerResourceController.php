<?php

class ComputerResourceController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = ResourceDeviceComputer::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.resource.computer.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.resource.computer.create');
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
			'type' => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ComputerResourceController@create')
	            ->withErrors($validator);
        }else{
        	ResourceDeviceComputer::create($input);
        	return Redirect::action('ComputerResourceController@index');

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
		$data = ResourceDeviceComputer::find($id);
		return View::make('admin.resource.computer.edit')->with(compact('data'));
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
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ComputerResourceController@edit', $id)
	            ->withErrors($validator);
        }else{
        	CommonNormal::update($id, $input);
        	return Redirect::action('ComputerResourceController@index');

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
		return Redirect::action('ComputerResourceController@index');
	}

	public function search()
	{
		$input = Input::except('_token');
		$data = CommonSearch::searchOffice($input, 'ResourceDeviceComputer');
		return View::make('admin.resource.computer.index')->with(compact('data'));
	}

}
