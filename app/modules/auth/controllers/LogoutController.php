<?php namespace App\Modules\Auth\Controllers;

use View, Sentry, Input, Session, Redirect;

class LogoutController extends \FrontController {
	public function index()
	{
		Sentry::logout();

		Session::flash('message', 'Logged out!');
	}
}