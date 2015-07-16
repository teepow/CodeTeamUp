<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Language;
use App\Http\Requests\PrepareProfileRequest;
use App\Profile;
use Auth;
use Image;

use Illuminate\Http\Request;

class ProfilesController extends Controller {

	/**
	 * Create new profile instance, apply middleware for authentication, and set messageCount
	 * 
	 */
	public function __construct()
	{
		$this->middleware('auth');

		$this->setMessageCount();
	}

	/**
	 * Show page to edit profile
	 * 
	 * @return profiles/edit
	 */
	public function edit()
	{
		if (!$this->checkForProfile()) return redirect('profiles/create');

		$allLanguages = Language::all()->lists('name');

		$profile = Auth::user()->profiles;

		foreach($profile->languages as $language)
		{
			$currentLanguages[] = $language->name;
		}
		
		return view('profiles.edit', compact('allLanguages', 'profile', 'currentLanguages'));
	}

	/**
	 * Show page to create profile
	 * 
	 * @return profiles/create
	 */
	public function create()
	{
		if($this->checkForProfile()) return redirect('/');

		$languages = Language::all()->lists('name');
		
		return view('profiles.create', compact('languages'));
	}

	/**
	 * Store profile data in profiles table and languages in language_profile table
	 * 
	 * @param  PrepareProfileRequest $request
	 * 
	 * @return /
	 */
	public function store(PrepareProfileRequest $request)
	{
		//If exists, store image
		if($request->file('file')) 
		{
			$file = $this->resizeImage($request->file('file'));

			$path = $this->getPath($file);
		}

		$data = $request->except('language', 'file');

		$profile = Profile::open($data);

		$profile->image = $path;

		Auth::user()->profiles()->save($profile);

		$languages = $request->input('languages');

		$languageIds = $this->getLanguageIds($languages);

		//Store profile_id and language_id in pivot table
		foreach ($languageIds as $id)
		{
			$profile->languages()->attach($id);
		}

		return Redirect('/');
	}

	/**
	 * Show profile of user with profileId
	 * 
	 * @param  Integer $profileId profile_id of profile to view
	 * 
	 * @return profiles.show
	 */
	public function show($profileId)
	{
		$profile = Profile::find($profileId);

		$name = $profile->user->name;

		$location = $profile->location;

		$website = $profile->website;

		$github = $profile->github;

		$age = $profile->age;

		$bio = $profile->bio;

		$image = $profile->image;

		$languages = $profile->languages;

		//Store names of languages in languageNames[]
		foreach ($languages as $language)
		{
			$languageNames[] = $language->name;
		}


		return view('profiles.show', compact('name', 'location', 'github', 'website', 'age', 'bio', 'image', 'languageNames', 'profileId'));
	}

	/**
	 * Update user's profile
	 * 
	 * @param  Integer $profileId profile_id of profile to update
	 * 
	 * @param  PrepareProfileRequest $request
	 * 
	 * @return '/'
	 */
	public function update($profileId, PrepareProfileRequest $request)
	{
		Profile::where('id', '=', $profileId)
			->update(['website' => $request->website,
						'github' => $request->github,
						'bio' => $request->bio,
						'age' => $request->age,
						'location' => $request->location,
		]);

		//if exists, save file
		if($request->file('file'))
		{
			$file = $this->resizeImage($request->file('file'));

			$path = $this->getPath($file);

			Profile::where('id', '=', $profileId)
				->update(['image' => $path]);
		}

		//Save the languages to pivot table
		$languageIds = $this->getLanguageIds($request->languages);

		$profile = Auth::user()->profiles;

		$profile->languages()->sync($languageIds);

		return Redirect('/');

	}



	/**
	 * Resize image to 200 x 200
	 * 
	 * @param  request 
	 * 
	 * @return file
	 */
	public function resizeImage($file)
	{
		$file = Image::make(file_get_contents($file));

		$file->resize(200, 200);

		return $file;
	}

	/**
	 * Save image to images directory and return the path
	 * 		
	 * @param $file [image file]
	 * 
	 * @return string  path to file
	 */
	public function getPath($file)
	{
		$path = '/images/' . date('Y-m-d H:i:s');

		$file->save(public_path() . $path);

		return $path;
	}

	/**
	 * Retrieve the ids for the given languages
	 * 
	 * @param  array $languages
	 * 
	 * @return array $languageIds         
	 */
	public function getLanguageIds($languages)
	{
		foreach ($languages as $language) 
		{
			$languageIds[] = \DB::table('languages')->where('name', $language)->pluck('id');
		}

		return $languageIds;
	}

}
