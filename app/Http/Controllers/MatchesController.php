<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Language;
use Auth;

use Illuminate\Http\Request;

class MatchesController extends Controller {

	/**
	 * Create new matches instance, apply middleware for authentication, and set messageCount
	 */
	public function __construct()
	{
		$this->middleware('auth');

		$this->setMessageCount();
	}
	
	/**
	 * Show page with matches
	 * 
	 * @param  string 	$sort 	whether to sort by language or person (language if no value is passed)
	 * 
	 * @return matches/index
	 */
	public function index($sort = null)
	{
		if (!$this->checkForProfile()) return redirect('profiles/create');
		
		$userId = Auth::user()->profiles->id;

		$languages = Profile::find($userId)->languages;

		foreach($languages as $language)
		{
			//Get ids of people with the same languages
			$ids = Language::find($language->id)->profiles->except($userId)->lists('id');

			//Get the profiles of the ids
			foreach($ids as $id)
			{
				$profiles[] = Profile::find($id);
			}

			//Store profiles in results[] with language names for panel headings
			$results[$language->name] = $profiles;

			$profiles = [];
		}

		//If sort by person, alter results array
		if($sort == 'person')
		{
			//Get the profiles
			foreach($results as $language => $profiles)
			{	
				//Get each individual profile
				foreach ($profiles as $key => $profile) 
				{
					$newIds[] = $profile->id;
				}
			}
				$maxes = $this->getMaxValues($newIds);

				$results = [];

			//Store profiles in results[] with number of matches as $count for panel heading
			foreach($maxes as $profileId => $count)
			{
				$results[$count][] = Profile::find($profileId);
			}
		}
		return view('matches.index', compact('results'));
	}

	/**
	 * Get the max values from high to low of array
	 * 
	 * @param  array 	$newIds 	array to be sorted 
	 * 
	 * @return array 	sorted array
	 */
	public function getMaxValues($newIds)
	{
		$maxes = array_count_values($newIds);
		
		arsort($maxes);

		return $maxes;
	}



}
