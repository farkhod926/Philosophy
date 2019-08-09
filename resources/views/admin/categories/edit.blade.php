@extends('admin.layout')

@section('content')
<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Categories</li>
		</ol>

		<div class="box-body">
			{{ Form::open([
				'route' => ['categories.update',$category->id],
			    'method'=>'put',
			    'class' => 'w-50'
			])}}
				<div class="form-group">
					<label for="CategoriesName">Names</label>
					<input type="text" class="form-control" id="CategoriesName" placeholder="{{$category->name}}" name="name">
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