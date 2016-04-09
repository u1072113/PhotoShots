<?php namespace PhotoShots\Http\Controllers;

use PhotoShots\Http\Requests;
use PhotoShots\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhotoShots\Album;
use Auth;

class AlbumController extends Controller {

	//Here we also need to check if the user has authentificated.
	public function __construct()
	{
		$this->middleware('auth');
}

	public function getIndex()
	{
		// Here we imported the motheod for the albums to show on the page.
		$albums = Auth::user()->albums;
		return view('albums.show', ['albums' => $albums]);
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
