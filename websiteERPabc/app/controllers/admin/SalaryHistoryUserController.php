<?php

class SalaryHistoryUserController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = SalaryUser::orderBy('id', 'asc')->paginate(PAGINATE);
		return View::make('admin.salary.history.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
		$salary = SalaryUser::find($id);
		$data = SalaryHistoryUser::where('model_name', 'User')->where('model_id', $salary->user_id)->paginate(PAGINATE);
		$userdata = User::find($salary->user_id);
		// dd($data->toArray());		
		return View::make('admin.salary.history.show')->with(compact('data', 'userdata'));
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
		//
	}


}
