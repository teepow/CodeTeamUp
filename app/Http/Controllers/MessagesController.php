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
	 * Create new message instance, apply middleware for authentication, and set messageCount
	 */
	public function __construct()
	{
		$this->middleware('auth');

		$this->setMessageCount();
	}

	/**
	 * Show page to create new message
	 * 
	 * @param $profileId profile id of recipient
	 * 
	 * @return messages/create
	 */
	public function create($profileId)
	{
		$profile = Profile::find($profileId);

		$name = $profile->user->name;

		return view('messages.create', compact('name', 'profileId'));
	}

	/**
	 * Store message and recipient id in messages table
	 * 
	 * @param  PrepareMessageRequest $request form request
	 * 
	 * @return profiles/receiver_id
	 */
	public function store(PrepareMessageRequest $request)
	{
		$data = $request->all();

		$message = Message::open($data);

		Auth::user()->messages()->save($message);

		session()->flash('flash_message', 'Your message has been sent!');

		return Redirect('profiles/' . $request->receiver_id);

	}

	/**
	 * Show page with messages
	 * 
	 * @return messages/index
	 */
	public function index()
	{
		$profileId = \Auth::user()->profiles->id;

		$messages = \DB::table('messages')->where('receiver_id', $profileId)->join('users', 'user_id', '=', 'users.id')->get();

		return view('messages.index', compact('messages'));
	}

}
