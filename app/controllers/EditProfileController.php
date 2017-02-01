<?php

class EditProfileController extends \BaseController {

	public function index()
	{	
		return View::make('locker.edit_profile');
	}	
	
	public function update()
	{
		$user = User::find(Auth::user()->id);
	
		$rules = array(
			'name'	=> 'required',
			'photo'	=> 'image|Max:2000'
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
		
			if (Input::hasFile('photo'))
			{
			
				$file = User::find(Auth::user()->id);
				$img = $file->photo;
				File::delete('uploads/image/'.$img);								
			
				$file     = Input::file('photo');
				
				$filename = $file->getClientOriginalName();
				$destinationPath = 'uploads/image/';
				
				$file->move($destinationPath, $filename);
				
				$user->photo = $filename;	
			}
			
			$user->name		= Input::get('name');;
			$user->save();
			
			return Redirect::to('edit_profile')
					->with('edit_berhasil', 'Your profile has been changed.');			
		}
	}

}
