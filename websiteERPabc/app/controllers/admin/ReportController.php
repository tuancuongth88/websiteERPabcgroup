<?php

class ReportController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userId = User::getUserIdByAuth();
		if (User::isAdmin() == ROLE_ADMIN) {
			$data = Report::orderBy('id', 'desc');
			$data = $data->paginate(PAGINATE);
		}
		if (User::isAdmin() == ROLE_USER) {
			$userReports = Report::where('user_id', $userId)->lists('id');
			$receiverReports = ReportUser::where('receiver_id', $userId)->lists('report_id');
			$listReports = array_merge($userReports, $receiverReports);
			$data = Report::whereIn('id', $listReports)
				->paginate(PAGINATE);
		}
		return View::make('admin.report.index')->with(compact('data'));
	}

	public function search()
	{
		$input = Input::all();
		$data = Report::where(function ($query) use ($input)
		{
			if($input['name'] != '') {
				$query = $query->where('name', 'like', '%'.$input['name'].'%');
			}
			if($input['start'] != '') {
				$query = $query->where('created_at', '>=', $input['start']);
			}
			if($input['end'] != '') {
				$query = $query->where('created_at', '<=', $input['end']);
			}
			if($input['type_report_id'] != '') {
				$query = $query->where('type_report_id', $input['type_report_id']);
			}
			if($input['user_id'] != '') {
				$query = $query->where('user_id', $input['user_id']);
			}
			
		})->orderBy('name', 'asc')->paginate(PAGINATE);
		return View::make('admin.report.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.report.create');
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
			return Redirect::action('ReportController@create')
	            ->withErrors($validator);
        } else {
        	// dd($input);
        	$userId = User::getUserIdByAuth();
        	$inputReport['name'] = $input['name'];
        	$inputReport['type_report_id'] = $input['type_report_id'];
        	$inputReport['description'] = $input['description'];
        	$inputReport['user_id'] = $userId;
        	$inputReport['status'] = ACTIVE;
        	$reportId = Report::create($inputReport)->id;
        	$report = Report::find($reportId);
        	if (isset($input['send_all'])) {
        		$input['user_id'] = User::lists('id');
        		$report->users()->attach($input['user_id']);
        	}
        	else {
        		$report->users()->attach($input['user_id']);
        	}
			return Redirect::action('ReportController@index')->with('message', 'Tạo mới thành công');
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
		$report = Report::find($id);
		return View::make('admin.report.show')->with(compact('report'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$report = Report::find($id);
		$report->users()->detach();
		$report->delete();
		return Redirect::action('ReportController@index')->with('message', 'Xóa thành công');
	}

	public function assignReportUser()
	{
		$reportUserKeys = Input::get('reportUserKey');
		// return $reportUserKeys;
		if($reportUserKeys == '') {
			$reportUserKey = 0;
		} else {
			$reportUserKey = max($reportUserKeys);
			$reportUserKey++;
		}
		return View::make('admin.report.assign')->with(compact('reportUserKey'));
	}

}
