<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

		/**
		 * set messageCount variable to be used across all views
		 */
		public function setMessageCount()
		{
			if(Auth::check() && Auth::user()->profiles)
			{
				$profileId = \Auth::user()->profiles->id;

				$messageCount = \DB::table('messages')->where('receiver_id', $profileId)->where('read', false)->count();

				\View::share('messageCount', $messageCount);
			}
		}

		/**
		 * If user has not created a profile, redirect to profiles/create
		 * 
		 * @return boolean
		 */
		public function checkForProfile()
		{
			return (!Auth::user()->profiles) ? false : true;
		}

}
