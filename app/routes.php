<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('hello_view', function()
{
   return View::make('helloView');
});

/*-------------------- locker --------------------*/

/* Unauthenticated group */
Route::group(array('before' => 'guest'), function() {

	/* CSRF protection */
	Route::group(array('before' => 'csrf'), function() {
	
		/* Create an account (POST) */
		Route::post('store', 'UserController@store');
	
		/* Sign in (POST) */
		Route::post('authenticate', 'UserController@authenticate');
	
	});

	/* Create login form (GET) */
	Route::get('/', 'UserController@index');
	
	/* Activate an account */
	Route::get('/account/activate/{code}', 
		array('as' => 'account-activate',
			'uses' => 'UserController@activate'
	));
	 
});

/* Authenticated group */
Route::group(array('before' => 'auth'), function() {

	/* CSRF protection */
	Route::group(array('before' => 'csrf'), function() {
	
		/* Change password (POST) */
		Route::post('change_password/save', 'ChangePasswordController@edit');
		
		/* Edit profile (POST) */
		Route::post('edit_profile/update', 'EditProfileController@update');
		
		/* Upload file (POST) */
		Route::post('file/upload', 'UploadController@store');
		
	});
	
	/* Sign out (GET) */
	Route::get('logout', 'UserController@logout');
	
	/* Create home form (GET) */
	Route::get('home', 'UploadController@index');
	
	/* Download file (GET) */
	Route::get('file/download/{id}', 'UploadController@download');
	
	
	/* Delete file (GET) */
	Route::get('file/delete/{id}', 'UploadController@destroy');
	
	/* Create edit profile form (GET) */
	Route::get('edit_profile', 'EditProfileController@index');
	
	/* Create change password form (GET) */
	Route::get('change_password', 'ChangePasswordController@index');
	
	/* Create change password form (GET) */
	Route::get('recent_activity', 'RecentActivityController@index');
		
});

/* Create user view form (GET) */
Route::get('{link}', 'ViewController@user');
