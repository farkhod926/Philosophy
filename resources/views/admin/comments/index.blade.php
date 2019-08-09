@extends('admin.layout')

@section('content')
<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Comments</li>
		</ol>

		<!-- DataTables Example -->
		<div class="card mb-3">
			<div class="card-header">
				<i class="fas fa-table"></i>
			Comments Example</div>
			<div class="card-body">
				
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
							@if(isset($comments) && count($comments) > 0)
							@foreach($comments as $key => $comment)
							<tr>
								<td>{{$comment->id}}</td>
								<td>{{$comment->name}}</td>
								<td>{{$comment->text}}</td>
								<td>
									@if($comment->status == 1)
									<a href="{{route('status',[$comment->id])}}" class="fas fa-fw fa-unlock" aira-hidden="true"></a>
									@else
									<a href="{{route('status',[$comment->id])}}" class="fas fa-fw fa-lock" aira-hidden="true"></a>
									@endif
									{{Form::open(['route' =>['comments.destroy',$comment->id], 'method'=>'delete'])}}
									<button onclick="return confirm('are you sure?')" type="submit" class="delete">
										<i class="fas fa-fw fa-remove"></i>  
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