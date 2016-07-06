<?php

class SalaryBeforeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = SalaryUser::orderBy('id', 'asc')->paginate(PAGINATE);
		return View::make('admin.salary.before.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.salary.before.submit_proposals');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}

	public function search()
	{
		$input = Input::except('_token');
		$rules = array(
			'approve_date' => 'datetime',
		);
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('SalaryBeforeController@index')
				->withInput($input)
	            ->withErrors($validator);
        } else {
			$data1 = SalaryHistoryUser::where(function ($query) use ($input) {
				$query = $query->where('model_name', 'User');
				if($input['start'] != ''){
					$query = $query->where('approve_date', '>=', $input['start']);
				}
			    if($input['end'] != ''){
					$query = $query->where('approve_date', '<=', $input['end'].' 23:59:59');
				}
			})->orderBy('id', 'desc')->paginate(PAGINATE);
			$listid = $data1->lists('model_id');
			$data = SalaryHistoryUser::where('model_name', 'User')->whereNotIn('model_id', $listid)->paginate(PAGINATE);
			return View::make('admin.salary.before.index')->with(compact('data'));
		}
	}
}
