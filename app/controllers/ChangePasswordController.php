<?php

class ChangePasswordController extends \BaseController {

	public function index()
	{	
		return View::make('locker.change_password');
	}
	
	public function edit()
	{
		$rules = array(
			'current_password'	=> 'required',
			'new_password' 		=> 'required|min:8',
			'retry_password'	=> 'required|min:8|same:new_password'
		);
		
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails()) 
		{
			echo $validation->messages();
			return Redirect::back()
				->withErrors($validation->messages());
		}
		
		else
		{
			// passed validation

			// Grab the current user
			$user 			= User::find(Auth::user()->id);
			
			// Get passwords from the user's input
			$current_password 	= Input::get('current_password');
			$new_password 		= Input::get('new_password');

			// test input password against the existing one
			if(Hash::check($current_password, $user->getAuthPassword())){
				$user->password = Hash::make($new_password);

				// save the new password
				if($user->save()) 
				{
					return Redirect::to('change_password')
							->with('edit_berhasil', 'Your password has been changed.');
				}
			}
			
			else 
			{
				return Redirect::to('change_password')
					->with('password_salah', 'Your current password is incorrect.');
			}
		}

	}
		
}
