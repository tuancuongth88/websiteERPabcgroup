<?php 

class AdminController extends BaseController {
	public function __construct() 
	{
		$this->beforeFilter('auth', array('except' => array('login', 'doLogin')));
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.layout.login');
		
	}


	/**
	 * Show the form for ceating a new resource.
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
   public function login()
	{
		return View::make('admin.layout.login');
		
	}
	 public function doLogin()
	{
		return Redirect::action('RoomController@index');
		$rules = array(
			'username'   => 'required',
			'password'   => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input, $rules);
		if ($validator->fails()) {
			return Redirect::route('admin.login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			Auth::admin()->attempt($input);
			$checkLogin = Auth::admin()->check();
			if($checkLogin) {
				dd('thanh cong');
			} else {
				return Redirect::route('admin.login');
			}
		}
	}
	 public function logout()
	{
		// dd(1);
		Auth::admin()->logout();
		Session::flush();
		return Redirect::route('admin.login');
	}

}
