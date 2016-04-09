<?php namespace PhotoShots\Http\Controllers;

use PhotoShots\Http\Requests;
use PhotoShots\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhotoShots\Http\Requests\ShowPhotosRequest;

use PhotoShots\Album;
use PhotoShots\Photo;

class PhotoController extends Controller {

		public function __construct()
	{
		$this->middleware('auth');
}
// Here we imported the motheod for the photos to show on the album page.
	public function getIndex(ShowPhotosRequest $request)
	{
		$photos = Album::find($request->get('id'))->photos;

		return view('photos.show',['photos' => $photos, 'id' => $request->get('id')]);
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
