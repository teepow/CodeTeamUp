<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PrepareProfileRequest extends Request {

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
			'location' 	=> 'required|max:20',
			'website'  	=> 'url',
			'github'	=> 'url',
			'age'		=> 'required',
			'languages'	=> 'required|min:1',
			'file' 		=> 'image|mimes:jpg,jpeg,png'
		];
	}

}
