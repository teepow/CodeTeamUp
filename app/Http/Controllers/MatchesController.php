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
	 * @return matches/index
	 */
	public function index()
	{
		$userId = Auth::user()->profiles->id;

		$languages = Profile::find($userId)->languages;

		foreach($languages as $language)
		{
			$ids = Language::find($language->id)->profiles->except($userId)->lists('id');

			foreach($ids as $id)
			{
				$profiles[] = Profile::find($id);
			}

			$results[$language->name] = $profiles;
			$profiles = [];
		}

		return view('matches.index', compact('results'));
	}

}
