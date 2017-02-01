@extends('locker/layout')

@section('content')

<h3 class="col-md-offset-1"> Change Password </h3>

{{ Form::open(array('action' => 'ChangePasswordController@edit', 'class'=>'form-horizontal mrg-t50' )) }}

	<div class="form-group">
		<label class="col-sm-3 control-label">Current Password</label>
		<div class="col-sm-6">
			{{Form::password('current_password', array('class' => 'form-control','placeholder'=>'Current Password'))}}
			{{ $errors->first('current_password', '<div class="alert-dgr">:message</div>')  }}

			@if(Session::has('password_salah'))
				<div class="alert-dgr">{{ Session::get('password_salah') }}</div>
			@endif
		</div>
	</div>


	<div class="form-group">
		<label class="col-sm-3 control-label">New Password</label>
		<div class="col-sm-6">
			{{Form::password('new_password', array('class' => 'form-control','placeholder'=>'New Password'))}}
			{{ $errors->first('new_password', '<div class="alert-dgr">:message</div>')  }}
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Retry Password</label>
		<div class="col-sm-6">
			{{Form::password('retry_password', array('class' => 'form-control','placeholder'=>'Retry Password'))}}
			{{ $errors->first('retry_password', '<div class="alert-dgr">:message</div>')  }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
			{{Form::submit('Save', array('class' => 'btn btn-success')) }}
		</div>
	</div>
  
{{ Form::close() }}

@if(Session::has('edit_berhasil'))
	<div class="alert alert-success">{{ Session::get('edit_berhasil') }}</div>
@endif

@endsection