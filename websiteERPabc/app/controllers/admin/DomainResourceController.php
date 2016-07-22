<?php

class DomainResourceController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = ResourceDomain::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.resource.domains.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.resource.domains.create');
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
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('DomainResourceController@create')
	            ->withErrors($validator);
        }else{
        	ResourceDomain::create($input);
        	return Redirect::action('DomainResourceController@index');
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
		$data = ResourceDomain::find($id);
		return View::make('admin.resource.domains.edit')->with(compact('data'));
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
			return Redirect::action('DomainResourceController@edit', $id)
	            ->withErrors($validator);
        }else{
        	CommonNormal::update($id, $input);
        	return Redirect::action('DomainResourceController@index');

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
		return Redirect::action('DomainResourceController@index');
	}

	public function search()
	{
		$input = Input::except('_token');
		$data = CommonSearch::searchOffice($input, 'ResourceDomain');
		return View::make('admin.resource.domains.index')->with(compact('data'));
	}
}
