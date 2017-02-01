<?php

class ViewController extends \BaseController {

	public function user($link)
	{	
		
		$user	= User::where('link', '=', $link);
		$upload	= Upload::where('link', '=', $link)->get();

		if($user->count()) {
			$user = $user->first();
			return View::make('locker.view')
						->with('userdata', $user)
						->with('uploadsdata', $upload);

		}

		return App::abort(404);		
	}	
	
	
}