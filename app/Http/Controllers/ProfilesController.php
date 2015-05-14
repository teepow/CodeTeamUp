<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Language;
use App\Http\Requests\PrepareProfileRequest;
use App\Profile;
use Image;

use Illuminate\Http\Request;

class ProfilesController extends Controller {

	/**
	 * Create new profile instance and apply middleware for authentication
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show page to edit profile
	 * 
	 * @return profiles/edit
	 */
	public function edit()
	{
		$languages = Language::all()->lists('name');
		
		return view('profiles.edit', compact('languages'));
	}

	/**
	 * Show page to create profile
	 * 
	 * @return profiles/create
	 */
	public function create()
	{
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
		$file = $this->resizeImage($request);

		$path = '/images/' . date('Y-m-d H:i:s');

		$file->save(public_path() . $path);

		$languages = $request->input('language');

		$languageIds = $this->getLanguageIds($languages);

		$data = $request->except('language', 'file');

		$profile = Profile::open($data);

		$profile->image = $path;

		\Auth::user()->profiles()->save($profile);

		//Store profile_id and language_id in pivot table
		foreach ($languageIds as $id)
		{
			$profile->languages()->attach($id);
		}

		return Redirect('/');
	}

	/**
	 * Resize image to 200 x 200
	 * 
	 * @param  request 
	 * 
	 * @return file
	 */
	public function resizeImage($request)
	{
		$file = $request->file('file');

		$file = Image::make(file_get_contents($file));

		$file->resize(200, 200);

		return $file;
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
