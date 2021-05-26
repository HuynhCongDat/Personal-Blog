@extends('layouts.backend.main')
@section('title', 'MyBlog | Users Index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Display All Users</small>
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
        <li class="active">All User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header clearfix">
              <div class="pull-left">
                <a href="{{route('users.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Add New</a>
              </div>
              <div class="pull-right">
                
              </div>
            </div>
            @include('backend.partials.message')
            @if (! $users->count())
              <div class="alert alert-danger">
                <strong>No record found</strong>
              </div>
            @else
                @include('backend.users.table')
            @endif
            <div class="box-footer clearfix">
              <div class="pull-left">
                {{ $users->appends( Request::query() )->render() }}
              </div>
              <div class="pull-right">
                <small>{{$usersCount}} {{ Str::plural('Item', $usersCount) }}</small>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    $('ul.pagination').addClass('no-margin pagination-sm');
  </script>
@endsection
