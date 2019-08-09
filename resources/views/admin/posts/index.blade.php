@extends('admin.layout')

@section('content')
<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Posts</li>
		</ol>

		<!-- DataTables Example -->
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-table"></i>
			Posts Example</div>
			<div class="card-body">
				<div class="form-group">
					<a href="{{route('posts.create')}}" class="btn btn-success">Add</a>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-stripped" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Category</th>
								<th>Tags</th>
								<th>Image</th>
								<th>File</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if(isset($posts) && count($posts) > 0)
							@foreach($posts as $key => $post)
							<tr>
								<td>{{$post->id}}</td>
								<td>{{$post->title}}</td>
								<td>{{$post->getCategoryTitle()}}</td>
								<td>{{$post->getTagsTitles()}}</td>
								<td>
									<img src="{{$post->getImage()}}" alt="" width="100">
								</td>
								<td>{{$post->getFile()}}</td>
								<td>
									<a href="{{route('posts.edit', $post->id)}}" class="fa fa-pencil"></a>
									{{Form::open([
										'route' =>['posts.destroy',$post->id], 
										'method'=>'delete',
										'style'=>'float:left; padding-right:inherit',
										])}}
										<button onclick="return confirm('are you sure?')" type="submit" class="delete">
											<i class="fa fa-times" aria-hidden="true"></i>  
										</button>
										{{Form::close()}}
									</td>
								</tr>
								@endforeach
								@else
								<tr>
									<td colspan="7">Pusto</td>
								</tr>
								@endif 
							</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
			</div>
			<p class="small text-center text-muted my-5">
				<em>More table examples coming soon...</em>
			</p>
		</div>
		<!-- /.container-fluid -->	
	</div>
	@endsection