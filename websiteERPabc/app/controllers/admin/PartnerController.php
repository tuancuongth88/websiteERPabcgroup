<?php

class PartnerController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Partner::orderBy('id', 'desc')->where('type', TYPE_PARTNER_1)->where('parent_id', null)->paginate(PAGINATE);
		return View::make('admin.partner.index')->with(compact('data'));
	}
	public function indexService()
	{
		$data = Partner::orderBy('id', 'desc')->where('type', TYPE_PARTNER_2)->paginate(PAGINATE);
		return View::make('admin.partner.service.index')->with(compact('data'));
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
				'type' => TYPE_PARTNER_1,
				'name'=> $input['name'],
				'email' => $input['email'],
				'address' => $input['address'],
				'phone' => $input['phone'],
			];
			Partner::create($inputPart);
			
		}
		return Redirect::action('PartnerController@index');
	}

	public function createService()
	{
		return View::make('admin.partner.service.create');
	}
	public function storeService()
	{

		$input = Input::except('_token');
		$rules = array(
			'fullname' => 'required',
		);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('PartnerController@createService')
				->withErrors($validator);
		}else{
			$inputPart = [
				'type' => TYPE_PARTNER_2,
				'fullname'=> $input['fullname'],
				'phone' => $input['phone'],
			];
			Partner::create($inputPart);
			
		}
		return Redirect::action('PartnerController@indexService');
	}

	public function editService($id)
	{
		$data = Partner::find($id);
		return View::make('admin.partner.service.edit')->with(compact('data'));
	}
	public function updateService($id)
	{
		$input = Input::except('_token');
		$partner_id = Partner::find($id);
		$partner_id->update([
			'fullname' => $input['fullname'],
			'phone' => $input['phone'],
			]);
		return Redirect::action('PartnerController@indexService');
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
		
		$data = Partner::find($id);
		if($data->type == TYPE_PARTNER_1){
			$data->delete();
			return Redirect::action('PartnerController@index') ;
		}else{
			$data->delete();
			return Redirect::action('PartnerController@indexService') ;
		}
	}
	public function search()
	{
		$data = CommonPartner::getSearch();
		return View::make('admin.partner.index')->with(compact('data'));
	}
	public function searchService()
	{
		$data = CommonPartner::getSearchService();
		return View::make('admin.partner.service.index')->with(compact('data'));
	}
}
