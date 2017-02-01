<?php

class RecentActivityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $recents = Recent::where('link', '=', Auth::user()->link)->get();
		return View::make('locker.recent_activity')->with('recentsdata', $recents);
	}

}
