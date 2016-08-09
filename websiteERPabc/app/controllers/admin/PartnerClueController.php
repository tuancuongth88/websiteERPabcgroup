<?php

class PartnerClueController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}
	public function indexClue($id){
		$data = Partner::where('parent_id', $id)->paginate(PAGINATE);;
		return View::make('admin.partner.clue.index')->with(compact('data', 'id'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createClue($id)
	{
		$data = Partner::find($id);
		return View::make('admin.partner.clue.create_clue')->with(compact('data', 'id'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeClue($id)
	{
		$input = Input::except('_token');
		$rules = array(
			'fullname' => 'required',
		);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('PartnerClueController@createClue', $id)
				->withErrors($validator);
		}else{
			if ($input['parent_id'] == '') {
        		$input['parent_id'] = null;
        	}
        	$input['type'] = TYPE_PARTNER_1;

        	// dd($input);
        	CommonNormal::create($input);
        	return Redirect::action('PartnerClueController@indexClue', $id);
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
		$data = Partner::find($id);
		$parent_id = $data->parent_id;
		return View::make('admin.partner.clue.edit')->with(compact('data', 'parent_id'));
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
		$rules = array(
			'fullname' => 'required',
		);
		$partnerClue = Partner::find($id);
		$parent_id = $partnerClue->parent_id;
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('PartnerClueController@edit', $id)
				->withErrors($validator);
		}else{
			$partnerClue->update($input);
        	return Redirect::action('PartnerClueController@indexClue', $parent_id);
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
		$partnerClue = Partner::find($id);
		$parent_id = $partnerClue->parent_id;
		$partnerClue->delete();
		return Redirect::action('PartnerClueController@indexClue', $parent_id);
	}
	public function search(){
		$input = Input::except('_token');
		$data = CommonPartner::getSearchClue();
		$id = $input['id'];
		return View::make('admin.partner.clue.index')->with(compact('data', 'id'));
	}

}
