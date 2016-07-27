<?php

class ContractController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$listIdContract = Contract::whereRaw('id in (select MAX(id) as id From contracts GROUP BY name)')->lists('id');
		// dd($listIdContract);
		$data = Contract::whereIn('id', $listIdContract)->paginate(PAGINATE);
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
			'code' => 'required',
			'partner_id' => 'required',
			'file' => 'required',
		);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ContractController@create')
				->withErrors($validator);
		}else{
			//tao moi
			$contract_id = Contract::create($input)->id;
        	$uploadFile['file'] = CommonUser::uploadAction('file', CONTRACT_FILE_UPLOAD . '/' . $contract_id);
        	Contract::find($contract_id)->update($uploadFile);
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
		$contract_id = Contract::where('id',$id)->first();
		$data = Contract::where('name', '=', $contract_id->name)->where('code', '=', $contract_id->code)
		->where('partner_id', '=', $contract_id->partner_id)->paginate(PAGINATE);
		return View::make('admin.contract.show')->with(compact('data'));
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
		$contract = Contract::find($id);
    	$input['file'] = CommonUser::uploadAction('file', CONTRACT_FILE_UPLOAD . '/' . $id, $contract->file);
		$contract->update($input);
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

	public function adjourn($id)
	{
		$data = Contract::find($id);
		return View::make('admin.contract.extend')->with(compact('data'));
	}

	public function updateAdjourn($id){
		$input = Input::except('_token');
		// dd($input);
		$rules = array(
			'date_expired_new' => 'required',
		);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ContractController@adjourn')
	            ->withErrors($validator);
        }else{
        	Contract::create($input);
        	return Redirect::action('ContractController@index');

        }
		
	}
}
