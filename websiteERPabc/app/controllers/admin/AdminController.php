<?php 

class AdminController extends BaseController {
 	public function __construct() 
 	{
        $this->beforeFilter('admin', array('except'=>array('login','doLogin')));

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

        $input = Input::all();
        $user = array('username'=> $input['username'], 'password'=> $input['password']);
        if (Auth::attempt($user)) {
        	return Redirect::action('ManagementController@index');
        }else{
        	return View::make('admin.layout.login')->with(compact('message','Sai username hoặc password'));
		}
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect::route('admin.login');
    }

}