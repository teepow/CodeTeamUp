<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Profile;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function home()
	{
		if(Auth::check())
		{
			$name = Auth::user()->name;

			$location = Auth::user()->profiles->location;

			$website = Auth::user()->profiles->website;

			$github = Auth::user()->profiles->github;

			$age = Auth::user()->profiles->age;

			$bio = Auth::user()->profiles->bio;

			$image = Auth::user()->profiles->image;

			$id = Auth::user()->profiles->id;

			$languages = Profile::find($id)->languages;

			//Store names of languages in languageNames[]
			foreach ($languages as $language)
			{
				$languageNames[] = $language->name;
			}

			return view('pages.home', compact('name', 'location', 'website', 'github', 'age', 'bio', 'image', 'languageNames'));
		}
		return view('auth.login');
	}

}
