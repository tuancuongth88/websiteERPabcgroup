<?php

class ArchiveController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Archive::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.archive.index')->with(compact('data'));
	}

	public function search()
	{
		$data = CommonArchive::search();
		return View::make('admin.archive.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.archive.create');
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
		//
	}

	public function assignArchiveUser()
	{
		$archiveUserKeys = Input::get('archiveUserKey');
		if($archiveUserKeys == '') {
			$archiveUserKey = 0;
		} else {
			$archiveUserKey = max($archiveUserKeys);
			$archiveUserKey++;
		}
		return View::make('admin.archive.assign')->with(compact('archiveUserKey'));
	}
}
