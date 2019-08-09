@extends('admin.layout')

@section('content')
<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Tags</li>
		</ol>

		<div class="box-body">
			{{ Form::open([
				'route' => ['tags.update',$tag->id],
			    'method'=>'put',
			    'class' => 'w-50'
			])}}
				<div class="form-group">
					<label for="TagsName">Names</label>
					<input type="text" class="form-control" id="TagsName" placeholder="{{$tag->title}}" name="title">
				</div> 
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			{{Form::close()}}
		</div>
	</div>
	<!-- /.container-fluid -->
</div>

@endsection