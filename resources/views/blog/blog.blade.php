@extends('layouts.main')
@section('content')
<div class="blog">
	<div class="left-blog">
	    @if (! $posts_blog->count())
		    <div class="col-md-8" style="margin:9rem;">
		    	 <div class="alert alert-info" style="display: flex;">
			    	<p>Nothing Found</p><i class="far fa-smile-wink" style="color:red;margin-left: .5rem; font-size: 2rem;"></i>
			    </div>
		    </div>
		@else
	        @foreach($posts_blog as $post)
		    <div class="post-content-blog" data-aos="zoom-in" data-aos-delay="200">
				<div class="image-post-blog">
					<div>
						<img src="{{ asset('img/'. $post->image) }}  " alt="blog1">
					</div>
					<div class="post-info flex-row">
						<span><i class="fas fa-user text-gray">&nbsp;&nbsp;<a href="{{route('author', $post->author->slug)}}">{{$post->author->name}}</a></i></span>
						<span><i class="fas fa-calendar-alt text-gray">&nbsp;&nbsp;{{$post->date}}</i></span>
						<span><a href="{{route('category', $post->category->slug)}}"><i class="fas fa-tag text-gray">&nbsp;&nbsp;{{$post->category->title}}</i></a></span>
						<span><a href="{{route('home.show', $post->slug)}}#post-comments">{{ $post->commentsNumber() }}</a></span>
						<?php
						   $countView = $post->view_count;
						?>
						<span><i class="fas fa-eye"></i>{{$countView}} {{Str::plural('view', $countView)}}</span>
					</div>
				</div>
				<div class="post-title">
					<a href="{{route('home.show', $post->slug)}}"><h1>{{$post->title}}</h1></a>
					{!! $post->excerpt_html !!}
			        <!-- <a href="{{route('home.show', $post->slug)}}" style="font-size: 1rem;" class="btn post-btn">Read More&nbsp;<i class="fas fa-arrow-right"></i></a> -->
				</div>
			</div>
			<hr>
			@endforeach
		@endif
		<nav class="paginate">
		  {{$posts_blog->appends(request()->only(['search-content']))->links()}}
	    </nav>
	</div>
	<div class="right-blog">
        <div class="content">
            <form action="{{ route('blog')}}">
                <div class="search">
                    <div class="search-bar">
                        <input type="text" name="search-content" id="search" value="{{ request('search-content')}}" placeholder="Search...">
                        <button class="search-submit" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="category">
                <h2>Category</h2>
                <ul class="category-list">
                    @foreach($categories as $category)
                    <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                        <a href="{{route('category', $category->slug)}}">{{$category->title}}</a>
                        <span>({{$category->posts->count()}})</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="popular-post">
                <h2>Popular Post</h2>
                @foreach($popularPosts as $post)
                    <div class="popular-post-content" data-aos="flip-up" data-aos-delay="200">
                        <div class="popular-post-image">
                            <!-- <div>
                                <a href="{{route('home.show', $post->slug)}}"><img src="{{URL::asset('images/popular-post/m-blog-1.jpg')}}" alt="blog4"></a>
                            </div> -->
                            <div>
                                <a href="{{route('home.show', $post->slug)}}"><img src="{{ asset('img/'. $post->image) }}" alt="blog4"></a>
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-calendar-alt text-gray">&nbsp;&nbsp;{{$post->date}}</i></span>
                                <span><a href="{{route('home.show', $post->slug)}}#post-comments">{{ $post->commentsNumber()}}</a></span>
                                <?php
                                $countView = $post->view_count;
                                ?>
                                <span><i class="fas fa-eye"></i>{{$countView}} {{Str::plural('view', $countView)}}</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="{{route('home.show', $post->slug)}}">{{$post->title}}</a>
                        </div>
                    </div>
                @endforeach
                <div class="popular-tags">
                    <h2>Popular Tags</h2>
                    <div class="tags flex-row">
                    @foreach($categories as $category)
                        <span class="tag" data-aos="flip-up" data-aos-delay="100">
                            <a href="{{route('category', $category->slug)}}">{{$category->slug}}</a>
                        </span>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript">
	// $('input:text').focus(function(){
	// 	$(this).val('');
	// });
</script>

<script>
    $(document).ready(function(){
        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            console.log(query);
            $.post()
        });
    });
</script>

@endsection
