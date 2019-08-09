       <div class="pageheader-content row">
            <div class="col-full">
                <div class="featured">
                    <div class="featured__column featured__column--big">
                        @foreach($posts as $key => $post)
                        @if($loop->last)
                        <div class="entry" style="background-image:url('{{$post->getImage()}}');">           
                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">{{$post->getCategoryTitle()}}</a></span>
                                <h1><a href="{{route('single',$post->slug)}}" title="">{{$post->title}}</a></h1>
                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="{{$post->auther->getAvatar()}}" alt="">
                                    </a>
                                    <ul class="entry__meta">
                                        <li><a href="#0">{{$post->auther->firstName}}</a></li>
                                        <li>{{$post->getDate()}}</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->
                        </div> <!-- end entry -->
                        @endif
                        @endforeach
                    </div> <!-- end featured__big -->
                    <div class="featured__column featured__column--small">
                        @foreach($recentPosts as $post)
                        <div class="entry" style="background-image:url('{{$post->getImage()}}');">
                            <div class="entry__content">
                               <span class="entry__category"><a href="#0">{{$post->getCategoryTitle()}}</a></span>
                               <h1><a href="{{route('single',$post->slug)}}" title="">{{$post->title}}</a></h1>
                               <div class="entry__info">
                               <a href="{{route('single',$post->slug)}}" class="entry__profile-pic">
                                    <img class="avatar" src="{{$post->auther->getAvatar()}}" alt="">
                                </a>
                                <ul class="entry__meta">
                                    <li><a href="#0">{{$post->auther->firstName}}</a></li>
                                    <li>{{$post->getDate()}}</li>
                                </ul>
                            </div>
                        </div> <!-- end entry__content -->                    
                    </div> <!-- end entry -->
                    @endforeach
                </div> <!-- end featured__small -->
            </div> <!-- end featured -->

        </div> <!-- end col-full -->
    </div> <!-- end pageheader-content row -->

