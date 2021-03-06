<?php namespace App;

use Laravel\Socialite\Contracts\Factory as Socialite;
use App\UserRepository;
use Illuminate\Contracts\Auth\Guard;


class AuthenticateUser
{
	private $users;

	private $socialite;

	private $auth;

	public function __construct(UserRepository $users, Socialite $socialite, Guard $auth)
	{
		$this->users = $users;
		$this->socialite = $socialite;
		$this->auth = $auth;
	}


	public function execute($hasCode)
	{
		
		if (!$hasCode) return $this->getAuthorizationFirst();

		$user = $this->users->findByUsernameOrCreate($this->getGithubUser());

		$this->auth->login($user, true);

		return redirect('/');

	}

	private function getAuthorizationFirst()
	{
		return $this->socialite->driver('github')->redirect();
	}

	private function getGithubUser()
	{
		return $this->socialite->driver('github')->user();
	}

}

?>