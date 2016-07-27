<?php

class DocumentResourceController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = ResourceDocument::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.resource.document.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.resource.document.create');
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
			'code' => 'required',
			'file' => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('DocumentResourceController@create')->
			withErrors($validator);
        }else{
        	//tao moi
			$document_id = ResourceDocument::create($input)->id;
        	$uploadFile['file'] = CommonUser::uploadAction('file', DOCUMENT_FILE_UPLOAD . '/' . $document_id);
        	ResourceDocument::find($document_id)->update($uploadFile);
        	// 
        	// ResourceDocument::create($input);
        	return Redirect::action('DocumentResourceController@index');

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
		$data = ResourceDocument::find($id);
		return View::make('admin.resource.document.edit')->with(compact('data'));
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
		//sua document
		$document = ResourceDocument::find($id);
    	$input['file'] = CommonUser::uploadAction('file', DOCUMENT_FILE_UPLOAD . '/' . $id, $document->file);
		$document->update($input);
		return Redirect::action('DocumentResourceController@index');
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
		return Redirect::action('DocumentResourceController@index');
	}

	public function search(){
		$data = CommonResource::search();
		return View::make('admin.resource.document.index')->with(compact('data'));
	}
}
