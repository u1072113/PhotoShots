<?php namespace PhotoShots\Http\Requests;

use PhotoShots\Http\Requests\Request;

use Auth;
class ShowPhotosRequest extends Request {

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
		return [
		
			'id' => 'required'

		];
	}
// This function is to improve security, when a forbidden page is accessed, the user will be redirected to the homepage.
	public function forbiddenResponse()
	{
		return $this->redirector->to('/');
	}

}
