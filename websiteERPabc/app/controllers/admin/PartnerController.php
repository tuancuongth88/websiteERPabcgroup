<?php

class PartnerController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Partner::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.partner.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.partner.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$rules = array(
			'name' => 'required',
		);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('PartnerController@create')
				->withErrors($validator);
		}else{
			$inputPart = [
				'name'=> $input['name'],
				'email' => $input['email'],
				'address' => $input['address'],
				'phone' => $input['phone'],
			];
			Partner::create($inputPart);
			
		}
		return Redirect::action('PartnerController@index');
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
		$data = Partner::find($id);
		return View::make('admin.partner.edit')->with(compact('data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token');
		$partner_id = Partner::find($id);
		$partner_id->update([
			'name' => $input['name'],
			'email' => $input['email'],
			'address' => $input['address'],
			'phone' => $input['phone'],
			]);
		return Redirect::action('PartnerController@index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Partner::find($id)->delete();
		return Redirect::action('PartnerController@index') ;
	}


}
