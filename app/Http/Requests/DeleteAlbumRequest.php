<?php namespace PhotoShots\Http\Requests;

use PhotoShots\Http\Requests\Request;
use Auth;
use PhotoShots\Album;
class DeleteAlbumRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$user = Auth::user();
		$id = $this->get('id');
//This will find the album with the user ID which is linked to.
		$album = $user->albums()->find($id);

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
		// We need the id of the album, nothing more, in order to delete albums.
		return [
			'id' => 'required|exists:albums,id',
		];
	}

}
