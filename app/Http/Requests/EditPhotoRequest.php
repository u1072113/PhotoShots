<?php namespace PhotoShots\Http\Requests;

use PhotoShots\Http\Requests\Request;
use PhotoShots\Photo;
use PhotoShots\Album;
use Auth;

class EditPhotoRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// This authorization request is slightly different, we have to verify this photo is owner by the current user, we have the id of the photo,not the album. We need to use album to verify this photo is owned by the authenticated user.
		$id = $this->get('id');

		$photo = Photo::find($id);
// we Need to get the albums of the user to find the album which has the id of the photo.
		$album = Auth::user()->albums()->find($photo->album_id);

		if($album)
		{

			return true;
		}

		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			
			'id' => 'required|exists:photos,id',
			'title' => 'required',
			'description' => 'required',
			'image' => 'image|max:30000'
		];
	}

}
