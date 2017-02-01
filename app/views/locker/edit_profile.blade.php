@extends('locker/layout')

@section('content')

<h3 class="col-md-offset-1"> Edit Profile </h3>

{{ Form::open(array('action' => 'EditProfileController@update', 'enctype' => 'multipart/form-data', 'class'=>'form-horizontal mrg-t50' )) }}

	<div class="form-group">
		<label class="col-sm-3 control-label">Full Name</label>
		<div class="col-sm-6">
			{{ Form::text('name', Auth::user()->name , array('class' => 'form-control')) }}
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label">Photo</label>
		<div class="col-sm-6">
			{{ Form::file('photo', array('class' => 'filestyle', 'data-buttonBefore' => 'true')) }}
			{{ $errors->first('photo', '<div class="alert-dgr">:message</div>')  }}
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label">Link Address</label>
		<div class="col-sm-6">
			<div class="input-group">
				<span class="input-group-addon">locker.890m.com/</span>
				{{Form::text('link', Auth::user()->link , array('class' => 'form-control','disabled'))}}
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label">E-mail</label>
		<div class="col-sm-6">
			{{Form::text('email', Auth::user()->email , array('class' => 'form-control','disabled'))}}
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