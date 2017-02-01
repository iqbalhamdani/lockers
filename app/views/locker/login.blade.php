<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8' />
	<title>Login</title>

	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

	<!-- Optional theme -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">

	<!-- Latest compiled and minified JavaScript -->
	<script src="{{ asset('js/bootstrap.js') }}"></script>
	<script src="{{ asset('js/jquery.min.js') }}"></script>

	
</head>
<body>
<div class="container mrg-bg">
	
	<div class="row">
		<div class="col-md-5 col-md-offset-1" align="center">
			<img src="img/bg-locker.jpg" class="img-responsive" alt="Responsive image">
			<h1 class="mrg-t50"> Now, everyone know what you share !</h1>
		</div>
		
		<div class="row">
			<div class="col-md-4 col-md-offset-1">

				{{ Form::open(array('action' => 'UserController@store')) }}
					<div class="form-group">
						{{Form::text('name', '', array('class' => 'form-control','placeholder'=>'Full Name'))}}
						{{ $errors->first('name', '<div class="alert-dgr">:message</div>')  }}
					</div>
					
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">locker.890m.com/</span>
							{{Form::text('link', '', array('class' => 'form-control','placeholder'=>'example_example'))}}
						</div>
						{{ $errors->first('link', '<div class="alert-dgr">:message</div>')  }}
					</div>
					
					<div class="form-group">
						{{Form::email('email', '', array('class' => 'form-control','placeholder'=>'Email'))}}
						{{ $errors->first('email', '<div class="alert-dgr">:message</div>')  }}
					</div>
					
					<div class="form-group">
						{{Form::password('password', array('class' => 'form-control','placeholder'=>'Password'))}}
						{{ $errors->first('password', '<div class="alert-dgr">:message</div>')  }}
					</div>
					
					<div class="form-group">
						{{Form::submit('Sign Up', array('class' => 'btn btn-success')) }}
					</div>
				{{ Form::close() }}
				
				@if(Session::has('signup'))
					<div class="alert alert-success">{{ Session::get('signup') }}</div>
				@endif
		
				
				
				{{ Form::open(array('action' => 'UserController@authenticate'))}}
					<div class="form-group mrg-t50">
						{{Form::email('email', '', array('class' => 'form-control','placeholder'=>'Email'))}}
					</div>
					
					<div class="form-group">
						{{Form::password('password', array('class' => 'form-control','placeholder'=>'Password'))}}
					</div>
						
					@if(Session::has('login'))
						<div class="alert-dgr">{{ Session::get('login') }}</div>
						</br>
					@endif					

					<div class="form-group">
						{{Form::submit('Sign In', array('class' => 'btn btn-success')) }}
					</div>
				{{ Form::close() }}
				
				@if(Session::has('logout'))
					<div class="alert alert-success">{{ Session::get('logout') }}</div>
				@endif

			</div>
		</div>
		
	</div>
	
</div>
</body>
</html>