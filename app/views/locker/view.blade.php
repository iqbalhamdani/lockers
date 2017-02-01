@extends('locker/view-layout')

@section('content')

<script type="text/javascript">
	$(document).ready(function(){
		$('table.search-table').tableSearch({
			searchPlaceHolder:'Search',
			uploadButton:'Upload'
		});
		
		$("#myBtn").click(function(){
			$("#myModal").modal();
		});
		

	});
</script>
	
<table width="100%" class="search-table table table-responsive table-striped table-hover">
	<thead>
	<tr>
		<th width="25%">Name</th>
		<th width="20%">Date Modified</th>
		<th width="40%">Description</th>
		<th width="15%">#</th>
	</tr>
	</thead>
	
	<tbody>
	@foreach($uploadsdata as $upload)
	<tr>
		<td><coba>{{ $upload->name }}</coba></td>
		<td><coba>{{ $upload->created_at }}</coba></td>
		<td><coba>{{ $upload->description }}</coba></td>
		<td>
			<a href="uploads/file/{{ $upload->name_rand	 }}">download</a>
		</td>
	</tr>
	@endforeach
	</tbody>
</table>
	
@endsection