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
		$rules = array(
			'name' => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input, $rules);
		if($validator->fails()) {
			return Redirect::action('ArchiveController@create')
	            ->withErrors($validator);
        } else {
        	$userId = CommonUser::getUserId();
			$inputArchive = Input::except('_token', 'user_id', 'fun_id');
			//tao moi
			$archiveId = Archive::create($inputArchive)->id;
        	$uploadFile['file'] = CommonUser::uploadAction('file', ARCHIVE_FILE_UPLOAD . '/' . $archiveId);
        	Archive::find($archiveId)->update($uploadFile);
        	//
        	if(isset($input['user_id'])) {
				$inputUser = $input['user_id'];
				$inputFunction = $input['fun_id'];
				foreach ($inputUser as $key => $value) {
					$inputArchiveUser['user_receive'] = $inputUser[$key];
					$inputArchiveUser['user_send'] = $userId;
					$inputArchiveUser['archive_id'] = $archiveId;
					$inputArchiveUser['fun_id'] = $inputFunction[$key];
					ArchiveUser::create($inputArchiveUser);
				}
			}
			return Redirect::action('ArchiveController@index')->with('message', 'Tạo mới thành công');
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
		$data = Archive::find($id);
		return View::make('admin.archive.show')->with(compact('data'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Archive::find($id);
		$archiveUser = ArchiveUser::where('archive_id', $data->id)
						->groupBy('user_receive')
						->get();
		return View::make('admin.archive.edit')->with(compact('data', 'archiveUser'));
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
