@extends('layouts.backend.main')
@section('title', 'MyBlog | Edit Category')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        <small>Edit Categories</small>
      </h1>
      <div class="col-md-8">
        <div class="introduce">
      
        </div>
      </div>
      
      <ol class="breadcrumb">
        <li>
          <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li><a href="{{ route('category.index')}}">Category</a></li>
        <li class="active">Edit Categories</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
        	{!! Form::model($category,[
	      		'method' => 'PUT',
	      		'route'  => ['category.update', $category->id],
	      		'files'  => TRUE,
	      		'id'     => 'Category-form'
            ]) !!}
	        
	        @include('backend.categories.form')

	        {!! Form::close() !!}
        </div>

    </section>
    <!-- /.content -->
  </div>
@endsection

@include('backend.categories.script')
