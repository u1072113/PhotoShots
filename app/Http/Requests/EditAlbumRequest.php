<?php namespace PhotoShots\Http\Requests;

use PhotoShots\Http\Requests\Request;

use PhotoShots\Album;
use Auth;

class EditAlbumRequest extends Request {

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
	// We can edit albums just for that authenticated user
	public function rules()
	{
		return [
			
			'id' => 'required|exists:albums,id',
			'title' => 'required',
			'description' => 'required'


		];
	}

			public function forbiddenResponse()
	{
		return $this->redirector->to('/');
	}
}

