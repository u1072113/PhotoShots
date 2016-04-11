<?php namespace PhotoShots\Http\Requests;

use PhotoShots\Http\Requests\Request;
use Auth;
use PhotoShots\Album;
use PhotoShots\Photo;
class DeletePhotoRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
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
			'id' => 'required|exists:photos,id'
		];
	}

}
