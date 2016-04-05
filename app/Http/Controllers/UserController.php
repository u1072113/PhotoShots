<?php namespace PhotoShots\Http\Controllers;

use PhotoShots\Http\Requests;
use PhotoShots\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {


//The middleware tell us if the user has a valid sesion
	public function __construct()
	{
		$this->middleware('auth');
}

	public function getEditProfile()
	{
		return 'Showing the edit profile form';

	}

	public function postEditProfile()
	{
		return 'Changing the profile';
	}
}
