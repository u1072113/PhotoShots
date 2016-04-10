<?php namespace PhotoShots\Http\Requests;

use PhotoShots\Http\Requests\Request;

use Auth;
use PhotoShots\Album;
class CreatePhotoRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// Here we are not allowing a user to upload pictures to an album that is not his.
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
		return [
// When uploading a photo, there are the details that has to be filled in, and no image larger than 30MB.
			'id' => 'required|exists:albums,id',
			'title' => 'required',
			'description' => 'required',
			'image' => 'required|image|max:30000'
		];
	}


}