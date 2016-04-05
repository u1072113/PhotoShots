<?php namespace PhotoShots\Http\Controllers;

use PhotoShots\Http\Requests;
use PhotoShots\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AlbumController extends Controller {

	//Here we also need to check if the user has authentificated.
	public function __construct()
	{
		$this->middleware('auth');
}

	public function getIndex()
	{
		return 'Showing all the user Albums';
	}

	public function getCreateAlbum()
	{
		return 'showing the create album form';
	}

	public function postCreateAlbum()
	{
		return 'creating album';
	}

		public function getEditAlbum()
	{
		return 'showing the Edit album form';
	}

	public function postEditAlbum()
	{
		return 'editing album';
	}

	public function postDeleteAlbum()
	{
		return 'delete album';
	}
}
