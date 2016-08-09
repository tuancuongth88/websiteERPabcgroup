<?php

class ContractController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Contract::whereNull('parent_id')->where('contract_addendum', CONTRACT)->paginate(PAGINATE);
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
		$date_sign = $input['date_sign'];
		$date_active = $input['date_active'];
		if($date_sign > $date_active){
			return Redirect::action('ContractController@create')->with('error' , 'Thời gian ký hợp đồng phải nhỏ hơn thời gian có hiệu lực');
		}else{
			if($validator->fails()) {
				return Redirect::action('ContractController@create')
					->withErrors($validator);
			}else{
				//tao moi
				// if ($input['parent_id'] == '') {
    //     			$input['parent_id'] = null;
    //     		}
				$input['contract_addendum'] = CONTRACT;
				$contract_id = Contract::create($input)->id;
	        	$uploadFile['file'] = CommonUser::uploadAction('file', CONTRACT_FILE_UPLOAD . '/' . $contract_id);
	        	Contract::find($contract_id)->update($uploadFile);
				return Redirect::action('ContractController@index');
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
		$contract_id = Contract::where('id',$id)->first();
   		$data = Contract::where('name', '=', $contract_id->name)->where('code', '=', $contract_id->code) ->where('partner_id', '=', $contract_id->partner_id)->paginate(PAGINATE);  
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
		$input = Input::only('date_expired_new');
		// dd($input);
		$rules = array(
			'date_expired_new' => 'required',
		);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ContractController@adjourn', $id)
	            ->withErrors($validator);
        }else{
        	
        	if($input['file'] == null){
        		$input_contract = [
        		'contract_addendum' => CONTRACT,
      			'name' => $input['name'],
      			'code' => $input['code'],
      			'type' => $input['type'],
      			'description' => $input['description'],
      			'partner_id' => $input['partner_id'],
      			'type_extend' => $input['type_extend'],
      			'date_sign' => $input['date_sign'],
      			'date_active' => $input['date_active'],
      			'date_expired_old' => $input['date_expired_old'],
      			'date_expired_new' => $input['date_expired_new'],
      			'status' => $input['status'],
      			];
        		$newItem = Contract::create($input_contract);
        		CommonNormal::update($id, ['parent_id' => $newItem->id], 'Contract');
        		Contract::where('parent_id', $id)->update(['parent_id' => $newItem->id]);	
        	}else{
				//tao moi
				$contract_id = Contract::create($input)->id;
		    	$uploadFile['file'] = CommonUser::uploadAction('file', CONTRACT_FILE_UPLOAD . '/' . $contract_id);
		    	Contract::find($contract_id)->update($uploadFile);
        	}

        }
		
	}
	public function Appendix($id)
	{
		$data = Contract::find($id)->where('contract_addendum', CONTRACT_APPENDIX)->where('parent_id', $id)->paginate(PAGINATE);;
		return View::make('admin.contract.appendix')->with(compact('data', 'id'));
	}
	public function createAppendix($id)
	{
		$data = Contract::find($id);
		return View::make('admin.contract.createAppendix')->with(compact('data', 'id'));;
	}

	public function storeAppendix($id)
	{
		$input = Input::except('_token');

		$rules = array(
			'name' => 'required',
			'code' => 'required',
			'file' => 'required',
		);
		$validator = Validator::make($input,$rules);
		$date_sign = $input['date_sign'];
		$date_active = $input['date_active'];
		if($date_sign > $date_active){
			return Redirect::action('ContractController@createAppendix', $id)->with('error' , 'Thời gian ký hợp đồng phải nhỏ hơn thời gian có hiệu lực');
		}else{
			if($validator->fails()) {
				return Redirect::action('ContractController@createAppendix', $id)
					->withErrors($validator);
			}else{
				//tao moi
				$input['contract_addendum'] = CONTRACT_APPENDIX;

				$contract_id = Contract::create($input)->id;
	        	$uploadFile['file'] = CommonUser::uploadAction('file', CONTRACT_FILE_UPLOAD . '/' . $contract_id);
	        	Contract::find($contract_id)->update($uploadFile);
				return Redirect::action('ContractController@Appendix', $id);
			}
		}
	}
	public function editAppendix($id)
	{
		$data = Contract::find($id);
		$parent_id = $data->parent_id;
		return View::make('admin.contract.editAppendix')->with(compact('data', 'parent_id'));
	}
	public function updateAppendix($id)
	{
		$input = Input::except('_token');
		$contract = Contract::find($id);
		$id = $contract->parent_id;
    	$input['file'] = CommonUser::uploadAction('file', CONTRACT_FILE_UPLOAD . '/' . $id, $contract->file);
		$contract->update($input);
		return Redirect::action('ContractController@Appendix', $id);
	}
	public function destroyAppendix($id)
	{
		$data = Contract::find($id);
		$id = $data->parent_id;
		$data->delete();
		return Redirect::action('ContractController@Appendix', $id);
	}
}
