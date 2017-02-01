<?php

class UploadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $uploads = Upload::where('link', '=', Auth::user()->link)->get();
		return View::make('locker.home')->with('uploadsdata', $uploads);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' => 'required|mimes:doc,docx,xls,xlsx,ppt,pptx,txt,pdf|Max:2000|unique:uploads'
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
		
			if (Input::hasFile('name'))
			{
				$file 			= Input::file('name');
				$description	= Input::get('description');
				$link 			= Auth::user()->link;
				
				$destinationPath = 'uploads/file/';
				$name 			 = $file->getClientOriginalName();
				$name_rand		 = str_random(25).'-'.$name;
				$file->move($destinationPath, $name_rand);
				
				$upload = new Upload;
				
				$upload->name		 = $name;
				$upload->description = $description;
				$upload->link 		 = $link;
				$upload->name_rand	 = $name_rand;

				$upload->save();
				
				$dt = gmdate("d-m-Y / H:i", time()+60*60*7);
				$recent = new Recent;
				
				$recent->name		= $name;
				$recent->status		= "Upload";
				$recent->date		= $dt;
				$recent->link		= $link;
				
				$recent->save();
				

			}
			
			return Redirect::to('home');
		
		}
		
	}
	
	
	public function download($id)
	{
		$file = Upload::find($id);
		
		$name_rand	= $file->name_rand;
		$pathToFile	= 'uploads/file/'.$name_rand;
		
		
		$dt = gmdate("d-m-Y / H:i", time()+60*60*7);
		$recent = new Recent;
		
		$recent->name		= $file->name;
		$recent->status		= "Download";
		$recent->date		= $dt;
		$recent->link		= $file->link;
		
		$recent->save();		
		
		return Response::download($pathToFile);
	}
	
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$file = Upload::find($id);
		$file->delete();

		
		$dt = gmdate("d-m-Y / H:i", time()+60*60*7);
		$recent = new Recent;
		
		$recent->name		= $file->name;
		$recent->status		= "Delete";
		$recent->date		= $dt;
		$recent->link		= $file->link;
		
		$recent->save();	
		
		
		$doc = $file->name_rand	;
		File::delete('uploads/file/'.$doc);

		return Redirect::to('home');
	}


}
