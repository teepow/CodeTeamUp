<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Github;
use App\AuthenticateUser;

class GithubController extends Controller {

	public function update(AuthenticateUser $authenticateuser)
	{
		$data = $authenticateuser->getGithubUser(false);

		dd($data);

		// Github::me()->organizations();

		// Github::repo()->show('teepow', 'StartPage');
	}

}
