@extends('locker/layout')

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
				{{ link_to_action('UploadController@download', 'download', array($upload->id)) }}
				<!--<a href="uploads/file/{{ $upload->name_rand	 }}">download</a>--> |
				{{ link_to_action('UploadController@destroy', 'delete', array($upload->id)) }}
			</td>
		</tr>
		@endforeach
		</tbody>
		
	</table>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog mrg-bg">
<!-- Modal content-->
<div class="modal-content">
			
	<div class="modal-header" style="padding:20px 30px;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h3>Upload</h3>
	</div>

	<div class="modal-body" style="padding:40px 50px;">
	{{ Form::open(array('action' => 'UploadController@store', 'enctype' => 'multipart/form-data', 'class'=>'form-horizontal' )) }}

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">File</label>
			<div class="col-sm-9">
				{{ Form::file('name', array('class' => 'filestyle', 'data-buttonBefore' => 'true')) }}
			
					{{ $errors->first('name', '<div class="alert-dgr">:message</div>')  }}
			

			</div>
		</div>

		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Description</label>
			<div class="col-sm-9">
				{{ Form::textarea('description', '', array('class' => 'form-control', 'rows' => '5')) }}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<button class="col-sm-4" type="submit" class="btn btn-default">Post</button>
			</div>
		</div>

	{{ Form::close() }}
	</div>
	
</div>
</div>
</div>		
	
@endsection