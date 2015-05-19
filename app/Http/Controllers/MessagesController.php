<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Http\Requests\PrepareMessageRequest;
use App\Message;
use Auth;
use Redirect;

use Illuminate\Http\Request;

class MessagesController extends Controller {

	/**
	 * Create new message instance and apply middleware for authentication
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function create($profileId)
	{
		$profile = Profile::find($profileId);

		$name = $profile->user->name;

		return view('messages.create', compact('name', 'profileId'));
	}

	public function store(PrepareMessageRequest $request)
	{
		$data = $request->all();

		$message = Message::open($data);

		Auth::user()->messages()->save($message);

		session()->flash('flash_message', 'Your message has been sent!');

		return Redirect('profiles/' . $request->receiver_id);

	}

}
