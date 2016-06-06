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
			if ($input['parent_id'] == '') {
				$input['parent_id'] = null;
			}
			// $array = CommonOption::getKeyFromArray($input['dep_id']);
			$id = CommonNormal::create($input);
			// Regency::find($id)->departments()->attach($array);
			//cuongnt add permission
			// dd($input);
			// foreach ($array as $key => $valuedep) {
			// 	$inputdepregencyPerFun['dep_id'] = $valuedep;
			// 	$inputdepregencyPerFun['regency_id'] = $id;
			// 	foreach ($input['per_id'][$valuedep] as  $valueper) {
			// 		$inputdepregencyPerFun['permission_id'] = $valueper;
			// 		DepRegencyPerFun::create($inputdepregencyPerFun);
			// 	}
			// }
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
		// dd($data ->toArray);
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
		$countRegency = DepRegencyUserParent::where('regency_id', $id)->get();
		if(count($countRegency) >0 )
		{
			return Redirect::action('RegencyController@index')->with('message', 'chức vụ này đang có người sử dụng!') ;
		} else {
			CommonOption::deleteParent('Regency', $id);
			CommonNormal::delete($id);
		}
		// Regency::find($id)->delete();
		return Redirect::action('RegencyController@index') ;
	}

	


}
