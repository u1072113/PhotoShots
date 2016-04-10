<?php namespace PhotoShots\Http\Controllers;

use PhotoShots\Http\Requests;
use PhotoShots\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhotoShots\Http\Requests\ShowPhotosRequest;

use PhotoShots\Album;
use PhotoShots\Photo;

use Carbon\Carbon;

use PhotoShots\Http\Requests\CreatePhotoRequest;

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

	public function getCreatePhoto(Request $request)
	{
		// This will allow us to create photos in our album.
		$id = $request->get('id');
		return view('photos.create-photo', ['id' => $id]);
	}

	public function postCreatePhoto(CreatePhotoRequest $request)
	{
		$image = $request->file('image');
		$id = $request->get('id');
		Photo::create
		(
			[
				'title' => $request->get('title'),
				'description' => $request->get('description'),
				'path' => $this->createImage($image),
				'album_id' => $id


			]

			);

		return redirect("validated/photos?id=$id")->with(['photo_created' => 'The photo has been created']);
	}

		public function getEditPhoto($id)
	{
		$photo = Photo::find($id);
		return view('photos.edit-photo', ['photo' => $photo]);
	}

	public function postEditPhoto()
	{
		return 'editing Photo';
	}

	public function postDeletePhoto()
	{
		return 'delete Photo';
	}

	public function createImage($image)
	{
		$path = '/img/';
// Using sha1 to encrypt the string so photos aren't going to be repeated.
// Carbon class will return us the name and the day when the photo has been uploaded.
		// guessExtension is to accept only image extension files
		$name = sha1(Carbon::now()).'.'.$image->guessExtension();

		$image->move(getcwd().$path, $name);
// This will return the complete path and the name of the picture
		return $path.$name;
	}
}
