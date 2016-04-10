<?php namespace PhotoShots\Http\Requests;

use PhotoShots\Http\Requests\Request;

class CreateAlbumRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// this will be true because we always associated albums to active users
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required',
			'description' => 'required'
		];
	}

}
