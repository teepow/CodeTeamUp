<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PrepareProfileCreateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
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
			'occupation'	=> 'required|max:30',
			'location' 		=> 'required|max:30',
			'website'  		=> 'url',
			'github'		=> 'url',
			'age'			=> 'required',
			'languages'		=> 'required|min:1',
			'bio' 			=> 'required|max:1000',
			'file' 			=> 'required|image|mimes:jpg,jpeg,png'
		];
	}

}
