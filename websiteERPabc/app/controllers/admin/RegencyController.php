<?php 

class RegencyController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Regency::orderBy('id', 'asc')->paginate(PAGINATE);
		return View::make('admin.regency.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.regency.create');
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
			return Redirect::action('RegencyController@create')
	            ->withErrors($validator);
        }else{
        	// dd($input);
        	$id = CommonNormal::create($input);
        	foreach ($input['dep_id'] as $key => $value) {
				DepUserRegency::create(['dep_id' => $key, 'regency_id' => $id]);        	
        	}
        	return Redirect::action('RegencyController@index');
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
		$data = Regency::find($id);
		return View::make('admin.regency.edit')->with(compact('data'));
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
			return Redirect::action('RegencyController@edit', $id)
	            ->withErrors($validator);
        }else{

        	if ($input['parent_id'] == '') {
        		$input['parent_id'] = null;
        	}
        	CommonNormal::update($id, $input);
        	return Redirect::action('RegencyController@index') ;
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
		CommonOption::deleteParent('Regency', $id);
		CommonNormal::delete($id);
		return Redirect::action('RegencyController@index') ;
	}


}
