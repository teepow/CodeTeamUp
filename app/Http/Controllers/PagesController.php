<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function home()
	{
		if(Auth::check())
		{
			$location = Auth::user()->profiles->location;

			$website = Auth::user()->profiles->website;

			$github = Auth::user()->profiles->github;

			$age = Auth::user()->profiles->age;

			$languages = NULL;

			return view('pages.home', compact('location', 'website', 'github', 'age', 'languages'));
		}
		return view('auth.login');
	}

}
