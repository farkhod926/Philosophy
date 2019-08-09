@extends('main.layout')

@section('content')
<div class="s-pageheader">
	@include('partials._header')
</div>
 <!-- s-content
 	================================================== -->
 	<section class="s-content">
 		<div class="row masonry-wrap">
 			<div class="masonry">
        		<div class="grid-sizer"></div>
 				@foreach($posts as $post)
 				@if($post->file != null)
 				<article class="masonry__brick entry format-audio" data-aos="fade-up">
 					<div class="entry__thumb">
 						<a href="single-audio.html" class="entry__thumb-link">
 							<img src="{{$post->getImage()}}" 
 							alt="">
 						</a>
 						<div class="audio-wrap">
 							<audio id="player" src="{{$post->getFile()}}" width="100%" height="42" controls="controls"></audio>
 						</div>
 					</div>
 					<div class="entry__text">
 						<div class="entry__header">
 							<div class="entry__date">
 								<a href="single-audio.html">{{$post->getDate()}}</a>
 							</div>
 							<h1 class="entry__title"><a href="single-audio.html">{{$post->title}}</a></h1>
 						</div>
 						<div class="entry__excerpt">
 							<p>
 								{!!$post->content!!}
 							</p>
 						</div>
 						<div class="entry__meta">
 							<span class="entry__meta-links">
 								@foreach($post->tags as $tag)
 								<a href="{{route('tag.show',$post->slug)}}">{{$tag->title}}</a>
 								@endforeach
 							</span>
 						</div>
 					</div>
 				</article> <!-- end article -->
 				@else
 				<article class="masonry__brick entry format-standard" data-aos="fade-up">
 					<div class="entry__thumb">
 						<a href="{{route('single',$post->slug)}}" class="entry__thumb-link">
 							<img src="{{$post->getImage()}}" 
 							alt="">
 						</a>
 					</div>
 					<div class="entry__text">
 						<div class="entry__header">

 							<div class="entry__date">
 								<a href="single-standard.html">{{$post->getDate()}}</a>
 							</div>
 							<h1 class="entry__title"><a href="{{route('single',$post->slug)}}">{{$post->title}}</a></h1>
 						</div>
 						<div class="entry__excerpt">
 							<p>
 								{!!$post->content!!}
 							</p>
 						</div>
 						<div class="entry__meta">
 							<span class="entry__meta-links">
 								@foreach($post->tags as $tag)
 								<a href="{{route('single',$post->slug)}}">{{$tag->title}}</a>
 								@endforeach
 							</span>
 						</div>
 					</div>
 				</article> <!-- end article -->
 				@endif
 				@endforeach
 			</div> <!-- end masonry -->
 		</div> <!-- end masonry-wrap -->
 		<div class="row">
 			<div class="col-full">
 				<nav class="pgn">
 					{!!$posts->links()!!}
 				</nav>
 			</div>
 		</div>

 	</section> <!-- s-content -->


 	@endsection