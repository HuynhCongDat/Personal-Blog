@extends('layouts.backend.main')
@section('title', 'MyBlog | Add New Categories')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categories
        <small>Add New Categories</small>
      </h1>
      <div class="col-md-8">
        <div class="introduce">
      
        </div>
      </div>
      
      <ol class="breadcrumb">
        <li>
          <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li><a href="{{ route('category.index')}}">Categories</a></li>
        <li class="active">Add new</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
        	{!! Form::model($category,[
	      		'method' => 'POST',
	      		'route'  => 'category.store',
	      		'files'  => TRUE,
	      		'id'     => 'category-form'
            ]) !!}
	        
	        @include('backend.categories.form')

	        {!! Form::close() !!}
        </div>

    </section>
    <!-- /.content -->
  </div>
@endsection

@include('backend.categories.script')
