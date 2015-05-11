<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Language;

use Illuminate\Http\Request;

class ProfilesController extends Controller {

	public function edit()
	{
		$languages = Language::all()->lists('name');
		
		return view('profiles.edit', compact('languages'));
	}

}
