<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

		/**
		 * set messageCount variable to be used across all views
		 */
		public function setMessageCount()
		{
			if(\Auth::user())
			{
				$profileId = \Auth::user()->profiles->id;

				$messageCount = \DB::table('messages')->where('receiver_id', $profileId)->count();

				\View::share('messageCount', $messageCount);
			}
		}

}
