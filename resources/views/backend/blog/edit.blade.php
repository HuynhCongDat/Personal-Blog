@extends('layouts.backend.main')
@section('title', 'MyBlog | Edit Post')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Edit Post</small>
      </h1>
      <div class="col-md-8">
        <div class="introduce">
      
        </div>
      </div>
      
      <ol class="breadcrumb">
        <li>
          <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li><a href="{{ route('blog.index')}}">Blog</a></li>
        <li class="active">Edit post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
        	{!! Form::model($post,[
	      		'method' => 'PUT',
	      		'route'  => ['blog.update', $post->id],
	      		'files'  => TRUE,
	      		'id'     => 'post-form'
            ]) !!}
	        
	        @include('backend.blog.form')

	        {!! Form::close() !!}
        </div>

    </section>
    <!-- /.content -->
  </div>
@endsection

@include('backend.blog.script')
