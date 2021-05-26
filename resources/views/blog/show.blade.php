@extends('layouts.main')
@section('content')

<div class="hero top-hero">
    <div class="post-thumb">
        <img src="{{asset('img/'. $post->image)}}">
    </div>
    <div class="text">
        <h2 class="title">{{$post->title}}</h2>
        <div class="description">
            <div class="details">
                <li class="fas fa-user"></li>&nbsp;<p class="author">{{$post->author->name}},&nbsp; </p>
                <p class="date">{{$post->date}}&nbsp;|&nbsp;&nbsp;</p>
                <?php
                   $countView = $post->view_count;
                ?>
                <span><i class="fas fa-eye"></i>&nbsp;{{$countView}} {{Str::plural('view', $countView)}}</span>
            </div>
        </div>
    </div>
</div>

<div class="hr_line">
    <div class="stars">
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
    </div>
</div>

<section class="post-content" id="post-comments">
    {!! $post->body_html !!}
</section>

<div class="generate_info">
    @include('layouts.comments')
    <section class="post-info-author">
        <div class="info-author">
            <div class="title_welcome">
                <h2>WELCOME</h2>
            </div>
            <div class="picture-author">
                <img src="{{ asset('img/myself.jpg')}}">
            </div>
            <div class="info">
                <div class="name">
                    <a href="{{route('author', $post->author->slug)}}"><h1>{{$post->author->name}}</h1></a>
                </div>
                <div class="number-posts">
                    <?php
                    $countPosts = $post->author->posts->count();
                    ?>
                    <p><i class="fas fa-folder">&nbsp;&nbsp;{{$countPosts}} {{Str::plural('post', $countPosts)}}</i></p>
                </div>
                <div class="description">
                    <p>{{$post->author->bio}}</p>
                </div>
            </div>
            <div class="social_info">
                <a href="https://www.facebook.com/profile.php?id=100020517395077">
                    <i class="fab fa-facebook-f soc-1 facebook"></i>
                </a>
                <a href="https://www.instagram.com/min_min.ho/">
                    <i class="fab fa-instagram soc-2 instagram"></i>
                </a>
                <a href="https://twitter.com/congdat1505">
                    <i class="fab fa-twitter soc-3 twitter"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCPYAowET_X_Pua7Bfje63_Q?view_as=subscriber">
                    <i class="fab fa-youtube soc-4 youtube"></i>
                </a>
            </div>
        </div>
    </section>
</div>


@endsection
