<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
      <li class="active"><a href="{{ url('/home')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fas fa-pen"></i> <span>Blog</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('blog.index')}}">All Posts</a></li>
            <li><a href="{{ route('blog.create')}}">Add New</a></li>
          </ul>
        </li>
        @if(check_user_permissions(request(), "Categories@index"))
          <li><a href="{{ route('category.index')}}"><i class="fas fa-folder"></i> <span>Categories</span></a></li>
        @endif
        @if(check_user_permissions(request(), "Users@index"))
          <li><a href="{{ route('users.index')}}"><i class="fas fa-users"></i> <span>Users</span></a></li>
        @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>