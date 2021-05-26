@extends('layouts.backend.main')
@section('title', 'MyBlog | Category Index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categories
        <small>Display All Categories</small>
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
        <li class="active">All Categories</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header clearfix">
              <div class="pull-left">
                <a href="{{route('category.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Add New</a>
              </div>
              <div class="pull-right">
                
              </div>
            </div>
            @include('backend.partials.message')
            @if (! $categories->count())
              <div class="alert alert-danger">
                <strong>No record found</strong>
              </div>
            @else
                @include('backend.categories.table')
            @endif
            <div class="box-footer clearfix">
              <div class="pull-left">
                {{ $categories->appends( Request::query() )->render() }}
              </div>
              <div class="pull-right">
                <small>{{$categoriesCount}} {{ Str::plural('Item', $categoriesCount) }}</small>
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
