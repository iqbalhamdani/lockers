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
	{{ HTML::script('js/html-table-search-view.js') }}

</head>
<body>
<div class="container">

	<div class="row mrg-t50 content">
		
		<div class="col-md-2" align="center">
			<div class="row">
				<img src="img/ico-locker.png" class="img-responsive" alt="Responsive image" height="50px" width="50px">	
			</div>
			
			<div class="row mrg-t50">
				@if (empty($userdata->photo))
					<img src="img/Man.png" class="img-circle" height="75px" width="75px">
				@else
					<img src="uploads/image/{{ $userdata->photo }}" class="img-circle" height="75px" width="75px">
				@endif
			
				<h4>{{ $userdata->name }}</h4>
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