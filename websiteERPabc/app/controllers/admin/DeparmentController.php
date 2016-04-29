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
		$status = DepFunction::where('dep_id', '1')->get();
		// dd(count($status));
		return View::make('admin.room.index')->with(compact('data', 'status'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.room.create');
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
			$input['status'] = 1;
			// dd($input);
			$id = CommonNormal::create($input);
		//create new record in the dep_functions table
			foreach ($input['fun_id'] as $key => $value) {
				DepFunction::create(['dep_id' => $id, 'fun_id' => $key]);
			}
			// $inputDepFunction['dep_id'] = $id;

			// DepFunction::create($inputDepFunction);
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
		$data = Room::find($id);
		return View::make('admin.room.edit')->with(compact('data'));
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
		CommonNormal::delete($id);
		return Redirect::action('DeparmentController@index') ;
	}


}
