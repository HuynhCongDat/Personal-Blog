@extends('layouts.backend.main')
@section('title', 'MyBlog | Edit User')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Edit User</small>
      </h1>
      <div class="col-md-8">
        <div class="introduce">
      
        </div>
      </div>
      
      <ol class="breadcrumb">
        <li>
          <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li><a href="{{ route('users.index')}}">User</a></li>
        <li class="active">Edit Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
        	{!! Form::model($user,[
	      		'method' => 'PUT',
	      		'route'  => ['users.update', $user->id],
	      		'files'  => TRUE,
	      		'id'     => 'user-form'
            ]) !!}
	        
	        @include('backend.users.form')

	        {!! Form::close() !!}
        </div>

    </section>
    <!-- /.content -->
  </div>
@endsection


