<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8' />
	<title>Home</title>

	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

	<!-- Latest compiled and minified JavaScript -->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>  
	{{ HTML::script('js/jquery.min.js') }}
	{{ HTML::script('js/modal.js') }}
	{{ HTML::script('js/transition.js') }}
	
	{{ HTML::script('js/bootstrap-filestyle.min.js') }}
	{{ HTML::script('js/html-table-search.js') }}


	
</head>
<body>

<?php 

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}

?>

<div class="container">
	<div class="row mrg-t50 content">
	
		<div class="col-md-2" align="center">
			<div class="row">
				<img src="img/ico-locker.png" class="img-responsive" alt="Responsive image" height="50px" width="50px">	
			</div>
						
			<div class="row mrg-t50">
				@if (empty(Auth::user()->photo))
					<img src="img/Man.png" class="img-circle" height="75px" width="75px">
				@else
					<img src="uploads/image/{{ Auth::user()->photo }}" class="img-circle" height="75px" width="75px">
				@endif
			
				<h4>{{ Auth::user()->name }}</h4>
			</div></br></br>

			<div class="row">
				<ul class="nav nav-pills nav-stacked">
					<li <?=echoActiveClassIfRequestMatches("home")?>><a href="home">Home</a></li>
					<li <?=echoActiveClassIfRequestMatches("edit_profile")?>><a href="edit_profile">Edit Profile</a></li>
					<li <?=echoActiveClassIfRequestMatches("change_password")?>><a href="change_password">Change Password</a></li>
					<li <?=echoActiveClassIfRequestMatches("recent_activity")?>><a href="recent_activity">Recent Activity</a></li>
					<li><a href="logout">Sign Out</a></li>
				</ul>
			</div>
		</div>
		
		<div class="col-md-10 .col-md-push-1">
			<div class="row">
				<h3> Locker </h3>	
			</div>
			
			<div class="row mrg-t50">
				@yield('content')
			</div>
		</div>
		
	</div>
	
	<div id="footer">
		<div class="row">
			<div class="col-sm-6">
				copyright &copy; 2015 by duakoma
			</div>
			
			<div class="col-sm-6" align="right">
				locker v 1.0
			</div>
		</div>
	</div>	
	
</div>

</body>
</html>