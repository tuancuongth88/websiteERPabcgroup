<?php

class ContractController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Contract::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.contract.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.contract.create');
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
			'code' => 'required'
		);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ContractController@create')
				->withErrors($validator);
		}else{
			$inputContract = [
				'name'=> $input['name'],
				'code' => $input['code'],
				'description' => $input['description'],
				'type' => $input['type'],
				'date_receive' => $input['date_receive'],
				'date_send' => $input['date_send'],
				'date_promulgate' => $input['date_promulgate'],
				'date_active' => $input['date_active'],
				'partner_id' => $input['partner_id'],
				'type_extend' => $input['type_extend'],
				'status' => $input['status'],
			];
			Contract::create($inputContract);
			return Redirect::action('ContractController@index');
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
		$data = Contract::find($id);
		return View::make('admin.contract.edit')->with(compact('data'));
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
		$inputContract = Contract::find($id);
		$inputContract->update([
			'name'=> $input['name'],
			'code' => $input['code'],
			'description' => $input['description'],
			'type' => $input['type'],
			'date_receive' => $input['date_receive'],
			'date_send' => $input['date_send'],
			'date_promulgate' => $input['date_promulgate'],
			'date_active' => $input['date_active'],
			'partner_id' => $input['partner_id'],
			'type_extend' => $input['type_extend'],
			'status' => $input['status'],
		]);
		return Redirect::action('ContractController@index');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Contract::find($id)->delete();
		return Redirect::action('ContractController@index');
	}
	public function search(){

		$data = CommonContract::search();
		return View::make('admin.contract.index')->with(compact('data'));
	}

}
