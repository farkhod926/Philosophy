@extends('admin.layout')

@section('content')
<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{url('/admin')}}">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Posts</li>
		</ol>

		<div class="box-body">
			{{Form::open([
				'route'=>'posts.store',
				'files'=> true
				])}}
				<div class="form-group" style="margin-right: 50%">
					<label for="PostsName">Names</label>
					<input type="text" class="form-control" id="PostsName" placeholder="" name="title" value="{{old('title')}}" >
				</div>
				<div class="form-group">
					<label for="exampleInputFile">Post image</label>
					<input type="file" class="form control" id="exampleInputFile" name="image">
					<p class="help-block">Anything to show for format..</p>
				</div>
				<div class="form-group">
					<label for="exampleInputFile">Post Single  image</label>
					<input type="file" class="form control" id="exampleInputFile" name="picture">
					<p class="help-block">Anything to show for format..</p>
				</div>
				<div class="form-group">
					<label for="exampleInputFile">File</label>
					<input type="file" class="form control" id="exampleInputFile" name="file">
					<p class="help-block">Anything to show for format..</p>
				</div>
				<div class="form-group" style="margin-right: 50%">
					<label>Category</label>
					{{Form::select('category_id',
					$categories, 
					null, 
					['class' => 'form-control select2'])}}
				</div>
				<div class="form-group" style="margin-right: 50%">
					<label>Tag</label>
					{{Form::select('tags[]',
					$tags, 
					null, 
					['class' => 'form-control select2','multiple'=>'multiple', 'data-placeholder'=>'Choose' ])}}
				</div>
				<div class="form-group" style="margin-right: 50%">
					<label>Date:</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{old('date')}}">
					</div>
				</div>
				<div class="form-group">
					<label>
						<input type="checkbox" class="minimal" name="is_featured">
					</label>
					<label>Recomendate</label>
				</div>
				<div class="form-group">
					<label>
						<input type="checkbox" class="minimal" name="status">
					</label>
					<label>Draft</label>
				</div>
				<div class="form-group">
					<label for="PostInputText">Content</label>
					<textarea class="form-control" name="content" id="compose-textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
				</div>
				<div class="form-group">
					<label for="PostInputText">Full Text</label>
					<textarea class="form-control" name="description" id="compose-textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
				</div>
				<div class="box-footer">
					<button class="btn btn-default">Back</button>
					<button class="btn btn-success pull-right">ADD</button>
				</div> 
			</div>
			{{Form::close()}}
		</div>
		<!-- /.container-fluid -->
	</div>

	@endsection