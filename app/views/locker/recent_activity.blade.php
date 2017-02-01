@extends('locker/layout')

@section('content')
	
	<table width="100%" class="search-table table table-responsive table-striped table-hover">
		<thead>
		<tr>
			<th width="50%">Name</th>
			<th width="20%">Status</th>
			<th width="30%">Date</th>
		</tr>
		</thead>
		
		<tbody>
		@foreach($recentsdata as $recent)
		<tr>
			<td><coba>{{ $recent->name }}</coba></td>
			<td><coba>{{ $recent->status }}</coba></td>
			<td><coba>{{ $recent->date }}</coba></td>
		</tr>
		@endforeach
		</tbody>
		
	</table>
	
@endsection