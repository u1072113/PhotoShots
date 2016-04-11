<?php namespace PhotoShots\Http\Controllers;

use PhotoShots\Http\Requests;
use PhotoShots\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhotoShots\Album;
use Auth;

use PhotoShots\Http\Requests\CreateAlbumRequest;
use PhotoShots\Http\Requests\EditAlbumRequest;
use PhotoShots\Http\Requests\DeleteAlbumRequest;
use PhotoShots\Http\Controllers\PhotoController;

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
		return view('albums.create-album');
	}

	public function postCreateAlbum(CreateAlbumRequest $request)
	{
// Here will be the fields when creating an album, such as Title, desciption and the user_ID so that specific album will be linked to a specific user.
		$user = Auth::user();

		$title = $request->get('title');
		$description = $request->get('description');

		Album::create
		([
				'title' => $title,
				'description' => $description,
				'user_id' => $user->id 
			]
			);
		// This redirect us to the album section when an album has been created and it will be the last one.

		return redirect('validated/albums/')->with(['album_created' => 'The Album has been created.']);
	}

		public function getEditAlbum($id)
	{
		// We going to obtain the ID in this way because we obtaining the ID from the URL and not as a paramater from the request
		$album = Album::find($id);
		return view('albums.edit-album', ['album' => $album]);
	}

	public function postEditAlbum(EditAlbumRequest $request)
	{
		$album = Album::find($request->get('id'));

		$album->title = $request->get('title');
		$album->description = $request->get('description');

		$album->save();


		return redirect('validated/albums')->with(['edited' => 'The albums has been edited']);
	}

	public function postDeleteAlbum(DeleteAlbumRequest $request)
	{
		$album = Album::find($request->get('id'));

		$photos = $album->photos;

		$controller = new PhotoController;
		foreach ($photos as $photo)
		{
			$controller->deleteImage($photo->path);
			$photo->delete();
		}

		$album->delete();
		return redirect('validated/albums')->with(['deleted' => 'The album was deleted']);
	}
}
