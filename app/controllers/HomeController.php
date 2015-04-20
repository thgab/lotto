<?php
use Illuminate\Support\MessageBag;
class HomeController extends BaseController {
	public function showWelcome() {
		return View::make('index');
	}

	public function showLogin() {
		return View::make('login');
	}

	public function doLogin() {
		$rules = array(
			'email' => 'required|email',
			'password' => 'required|alphaNum|min:3'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('login')
							->withErrors($validator)
							->withInput(Input::except('password'));
		} else {

			$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);

			if (Auth::attempt($userdata)) {
				return Redirect::intended('/');
			} else {
				$errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
				return Redirect::to('login')->withErrors($errors)->withInput(Input::except('password'));
			}
		}
	}

	public function doLogout() {
		Auth::logout();
		return Redirect::to('login');
	}
	
	public function getRegister()
	{
		return View::make('register');
	}

	public function postRegister()
	{
		$input = Input::all();

		$rules = array('username' => 'required|unique:users', 'email' => 'required|unique:users|email', 'password' => 'required');

		$v = Validator::make($input, $rules);

		if($v->passes())
		{
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User();
			$user->username = $input['username'];
			$user->email = $input['email'];
			$user->password = $password;
			$user->save();

			return Redirect::to('login');

		} else {

			return Redirect::to('register')->withInput()->withErrors($v);

		}
	}

}
