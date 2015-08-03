<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Profile;

use Illuminate\Http\Request;

class PagesController extends Controller {

	/**
	 * Create new pages instance and set messageCount variable
	 */
	public function __construct()
	{
		$this->setMessageCount();
	}

	/**
	 * Show home page or login page if not authenticated
	 * 
	 * @return pages/home || auth/login
	 */
	public function home()
	{
		if(Auth::check())
		{
			if (!$this->checkForProfile()) return redirect('profiles/create');

			$name = Auth::user()->name;

			$profile = Auth::user()->profiles;

			$location = $profile->location;

			$website = $profile->website;

			$github = $profile->github;

			$age = $profile->age;

			$bio = $profile->bio;

			$image = $profile->image;

			$id = $profile->id;

			$occupation = $profile->occupation;

			$languages = Profile::find($id)->languages;

			//Store names of languages in languageNames[]
			foreach ($languages as $language)
			{
				$languageNames[] = $language->name;
			}

			return view('pages.home', compact('name', 'location', 'website', 'github', 'age', 'bio', 'image', 'occupation', 'languageNames'));
		}
		return view('auth.login');
	}

}
