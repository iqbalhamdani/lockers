<?php

class UserController extends \BaseController { 

	public function index()
	{
		return View::make('locker.login');
	}

	public function store()
	{
	
		$rules = array(
			'name'		=> 'required',
			'link'		=> 'required|min:8|alpha_dash|unique:users',
			'email' 	=> 'required|email|unique:users',
			'password'	=> 'required|min:8'
		);
		
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails()) 
		{
			echo $validation->messages();
			return Redirect::back()
				->withInput()
				->withErrors($validation->messages());
		}
		
		else
		{
			// create an account
			$name		= Input::get('name');
			$link		= Input::get('link');
			$email		= Input::get('email');
			$password	= Input::get('password');
			
			// Activation code
			$code = str_random(60);
			
			// record
			$user = new User;		
			
			$user->name		= $name;
			$user->link		= $link;
			$user->email	= $email;
			$user->password	= Hash::make($password);
			$user->code		= $code;
			$user->active	= 0;
			
			$userdata = $user->save();
			
			if($userdata) {
				Mail::send('emails.auth.activate', 
					array('link' => URL::route('account-activate', $code), 'name' => $name), function($message) use ($userdata) {
					$message->to(Input::get('email'), Input::get('name'))->subject('Activate your account');
				});
				
				return Redirect::to('/')->with('signup', 'Your account has been created. We have sent you an email to activate your account');
			}
				
		}

	}
	
	public function activate($code) {
		 
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		/* if user is available */
		if($user->count()) {
			$user = $user->first();

			// Update the user status to active
			$user->active = 1;
			$user->code = '';
			if($user->save()) {
				return Redirect::to('/')
						->with('signup', 'Activated! You can now sign in!');
			}
		}

	}	

	public function authenticate()
	{	
		$email 	= Input::get('email');
		$pass	= Input::get('password');
		
		if (Auth::attempt(array('email' => $email, 'password' => $pass, 'active' => 1)))
		{
			return Redirect::to('home');
		}
		
		else
		{
			$user = User::where('email', '=', $email)->first();
			
			if (empty($email) || empty($pass))
			{
				return Redirect::to('/')->with('login', 'Please enter your email or password');
			}
			elseif ($user->active == 0)
			{
				return Redirect::to('/')->with('login', 'Please activate your account first');
			}
			else
			{
				return Redirect::to('/')->with('login', 'Login failed, incorrect email or password !');
			}
		}
		
	}
	
	public function logout()
	{
	   Auth::logout();
	   return Redirect::to('/')->with('logout', 'Logout success');
	}
	
}
