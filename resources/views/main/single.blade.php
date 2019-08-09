@extends('main.layout')

@section('content')
<div class="s-pageheader">
	@include('partials._header')
</div>
    <section class="s-content s-content--narrow s-content--no-padding-bottom">
        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                        {{$post->title}}
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date">{{$post->getDate()}}</li>
                    <li class="cat">
                        In
                        @foreach($post->tags as $tag)
                        <a href="#0">{{$tag->title}}</a>
                        @endforeach
                    </li>
                </ul>
            </div> <!-- end s-content__header -->   
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <img src="{{$post->getPicture()}}" alt="" >
                </div>
            </div> <!-- end s-content__media -->
            <div class="col-full s-content__main">
                <p class="lead">{!!$post->content!!}</p>
                <p>{!!$post->description!!}
                </p>
                <p>
                <img src="images/wheel-1000.jpg" alt="">
                </p>

                <h2>Large Heading</h2>

                <p>Harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus <a href="http://#">omnis voluptas assumenda est</a> id quod maxime placeat facere possimus, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et.</p>

                <blockquote><p>This is a simple example of a styled blockquote. A blockquote tag typically specifies a section that is quoted from another source of some sort, or highlighting text in your post.</p></blockquote>

                <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.</p>

                <h3>Smaller Heading</h3>

                <p>Dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.
                	<p class="s-content__tags">
                    <span>Post Tags</span>

                    <span class="s-content__tag-list">
                        @foreach($post->tags as $tag)
                        <a href="#0">{{$tag->title}}</a>
                        @endforeach
                    </span>
                </p> <!-- end s-content__tags -->

                <div class="s-content__author">
                    <img src="{{$post->auther->getAvatar()}}" alt="">

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <a href="#0">{{$post->auther->firstName}}</a>
                        </h4>
                    
                        <p>Alias aperiam at debitis deserunt dignissimos dolorem doloribus, fuga fugiat impedit laudantium magni maxime nihil nisi quidem quisquam sed ullam voluptas voluptatum. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>

                        <ul class="s-content__author-social">
                           <li><a href="#0">Facebook</a></li>
                           <li><a href="#0">Twitter</a></li>
                           <li><a href="#0">GooglePlus</a></li>
                           <li><a href="#0">Instagram</a></li>
                        </ul>
                    </div>
                </div>

                <div class="s-content__pagenav">
                    <div class="s-content__nav">
                        @if($post->hasPrevious())
                        <div class="s-content__prev">
                            <a href="#0" rel="prev">
                                <span>Previous Post</span>
                                {{$post->getPrevious()->title}} 
                            </a>
                        </div>
                       @endif
                       @if($post->hasNext())
                        <div class="s-content__next">
                            <a href="#0" rel="next">
                                <span>Next Post</span>
                                {{$post->getNext()->title}} 
                            </a>
                        </div>
                        @endif
                    </div>
                </div> <!-- end s-content__pagenav -->


            </div> <!-- end s-content__main -->
        </article>
        <!-- comments
        ================================================== -->
        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">5 Comments</h3>

                    <!-- commentlist -->
                    <ol class="commentlist">
              @if(!$post->comments->isEmpty())
              @foreach($post->comments()->where('status', 1)->get() as $comment)
                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img width="50" height="50" class="avatar" src="" alt="">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <cite>Itachi Uchiha</cite>

                                    <div class="comment__meta">
                                        <time class="comment__time">{{$comment->created_at->diffForHumans()}}</time>
                                        <a class="reply" href="#0">Reply</a>
                                    </div>
                                </div>

                                <div class="comment__text">
                                <p>{!!$comment->text!!}</p>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </li>
                    </ol> <!-- end commentlist -->


                    <!-- respond
                    ================================================== -->
                    <div class="respond">

                        <h3 class="h2">Add Comment</h3>

                        <form name="contactForm" id="contactForm" method="post" action="/comment">
                            <fieldset>
                                {{csrf_field()}}
                                <input type="hidden" value="{{$post->id}}" name="post_id">
                                <div class="form-field">
                                    <input name="name" type="text" id="cName" class="full-width" placeholder="Your Name" value="">
                                </div>

                                <div class="form-field">
                                    <input name="email" type="text" id="cEmail" class="full-width" placeholder="Your Email" value="">
                                </div>
                                <div class="message form-field">
                                    <textarea name="text" id="cMessage" class="full-width" placeholder="Your Message"></textarea>
                                </div>

                                <button type="submit" class="submit btn--primary btn--large full-width">Submit</button>

                            </fieldset>
                        </form> <!-- end form -->

                    </div> <!-- end respond -->

                </div> <!-- end col-full -->

            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->

    </section> <!-- s-content -->


@endsection