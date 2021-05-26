@extends('layouts.main')
@section('content')
    <!-- Introduce -->
    @include('layouts.banner')
    <!-- End Introduce -->

    @include('layouts.poster')
	<!-- Post Content -->
	<section class="content content-areas">
		<section class="content-left articles-block">
			<div class="container-main">
				@foreach($popularPosts as $post)
				<div class="container">
					<a href="#" class="img-container"><img src="{{ asset('img/'. $post->image) }}" alt="" class="content-post-image"></a>
					<div class="content-post-main">
						<a href="{{route('home.show', $post->slug)}}" class="title-container"><h4 class="content-post-title">{{Str::words($post->title, $words = 5, $end = '...')}}</h4></a>
						<i class="fa fa-user content-post-user">&nbsp;&nbsp;{{$post->author->name}}</i>
						<i class="fas fa-calendar content-post-calendar">&nbsp;&nbsp;{{$post->date}}</i>
						<?php
						   $countView = $post->view_count;
						?>
						<span><i class="fas fa-eye"></i>&nbsp;&nbsp;{{$countView}} {{Str::plural('view', $countView)}}</span>
						<p class="content-post">{!! Str::words($post->excerpt_html, $words = 10, $end = '...') !!}</p>
					</div>
			    </div>
			    @endforeach
			</div>
	    </section>
		<section class="content-right sub-block">
			<img src="{{ asset('img/bg1.jpg')}}" alt="" class="avatar-right-image">
			<div class="content-avatar">
				<h3 class="content-avatar-title" data-aos="zoom-in" data-aos-delay="200">Aventure</h3>
				<h5 class="content-avatar-header" data-aos="zoom-in" data-aos-delay="200">Inspiring Stories Of Aventure</h5>
				<p class="content-avatar-main" data-aos="zoom-in" data-aos-delay="200">Let's go! Traveling around the world.</p>
			</div>
		</section>
	</section>
	<!-- End Post Content -->

	<!-- Page Wrapper -->

	<!-- End Page Wrapper -->
	<!-- Featured -->

	@include('layouts.book_library')

	<section class="featured">
		<div class="container h-100" data-aos="zoom-in" data-aos-delay="200">
	      <div class="d-flex justify-content-center h-100 ">
	        <div id="searchbar" class="searchbar">
	          <input id="key" class="search_input" type="text" name="" placeholder="Search...">
	          <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
	        </div>
	      </div>
	    </div>

		<div id="myKey" class="featured-theme" data-aos="zoom-in" data-aos-delay="200">
			@foreach($posts as $post)
			<div class="theme" data-aos="zoom-in" data-aos-delay="500">
				<div>
					<a href="#"><img src="{{ asset('img/'. $post->image) }}" alt="" class="theme-image"></a>
				</div>
				<div class="theme-issue">
					<a href="{{route('home.show', $post->slug)}}"><h4 class="theme-title">{{$post->title}}</h4></a>
					<!-- {!! Str::words($post->excerpt_html, $words = 10, $end = '...') !!} -->

				</div>
			</div>
			@endforeach
			<!-- <div class="theme" data-aos="fade-down" data-aos-delay="500">
				<div>
				    <a href="#"><img src="images/bg1.jpg" alt="" class="theme-image"></a>
				</div>
				<div class="theme-issue">
					<a href="#"><h4 class="theme-title">Mountain</h4></a>
				    <p class="theme-content">Mountain so beautiful.</p>
				</div>
			</div>
			<div class="theme" data-aos="fade-left" data-aos-delay="500">
				<div>
					<a href="#"><img src="images/bg1.jpg" alt="" class="theme-image"></a>
				</div>
				<div class="theme-issue">
					<a href="#"><h4 class="theme-title">Desert</h4></a>
				    <p class="theme-content">Desert so beautiful.</p>
				</div>
			</div> -->

		</div>
	</section>
	<!-- End Featured -->


	<script type="text/javascript">
	</script>

@endsection
