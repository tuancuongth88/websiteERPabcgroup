<?php 

class DeparmentController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Department::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.department.index')->with(compact('data', 'status'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.department.create');
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
		//check validation
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('DeparmentController@create')
				->withErrors($validator);
		}else{
		//create department
			if ($input['parent_id'] == '') {
        		$input['parent_id'] = null;
        	}
			$array = CommonOption::getKeyFromArray($input['function']);
        	$id = CommonNormal::create($input);
        	Department::find($id)->adminfunctions()->attach($input['function']);
			return Redirect::action('DeparmentController@index');
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
		$data = Department::find($id);
		return View::make('admin.department.edit')->with(compact('data'));
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
			return Redirect::action('DeparmentController@edit', $id)
				->withErrors($validator);
		}else{
			if ($input['parent_id'] == '') {
        		$input['parent_id'] = null;
        	}
			$array = CommonOption::getKeyFromArray($input['function']);
        	Department::find($id)->adminfunctions()->sync($input['function']);
        	CommonNormal::update($id, $input);
			return Redirect::action('DeparmentController@index') ;
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
		CommonOption::deleteParent('Department', $id);
		Department::find($id)->adminfunctions()->detach();
		CommonNormal::delete($id);
		return Redirect::action('DeparmentController@index') ;
	}
	public function search()
	{
		$data = Department::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.department.index')->with(compact('data', 'status'));
	}	

}
