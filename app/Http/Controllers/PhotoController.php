<?php namespace PhotoShots\Http\Controllers;

use PhotoShots\Http\Requests;
use PhotoShots\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PhotoController extends Controller {

		public function __construct()
	{
		$this->middleware('auth');
}

	public function getIndex()
	{
		return 'Showing all the album photos';
	}

	public function getCreatePhoto()
	{
		return 'showing the create Photo form';
	}

	public function postCreatePhoto()
	{
		return 'creating Photo';
	}

		public function getEditPhoto()
	{
		return 'showing the Edit Photo form';
	}

	public function postEditPhoto()
	{
		return 'editing Photo';
	}

	public function postDeletePhoto()
	{
		return 'delete Photo';
	}

}
