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

		<!-- DataTables Example -->
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-table"></i>
			Categories Example</div>
			<div class="card-body">
				<div class="form-group">
					<a href="{{route('categories.create')}}" class="btn btn-success">Add</a>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-stripped" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Slug</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if(isset($categories) && count($categories) > 0)
							@foreach($categories as $key => $category)
							<tr>
								<td>{{$category->id}}</td>
								<td>{{$category->name}}</td>
								<td>{{$category->slug}}</td>
								<td>
						  <a href="{{route('categories.edit', $category->id)}}" class="fa fa-pencil"></a>
                          {{Form::open([
                          	'route' =>['categories.destroy',$category->id], 
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
								<td colspan="3">Pusto</td>
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