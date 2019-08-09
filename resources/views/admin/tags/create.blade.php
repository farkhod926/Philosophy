@extends('admin.layout')

@section('content')
<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{url('/admin')}}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Tags</li>
		</ol>

		<div class="box-body">
			<form action="{{route('tags.store')}}" method="post" class="w-50">
				{{csrf_field()}}
				<div class="form-group">
					<label for="TagsName">Names</label>
					<input type="text" class="form-control" id="TagsName" placeholder="{{old('title')}}" name="title">
				</div> 
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>

@endsection