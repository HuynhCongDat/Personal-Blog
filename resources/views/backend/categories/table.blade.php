<div class="box-body-content">
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>Category Name</td>
          <td>Post Count</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)

          <tr>
            <td>{{ $category->title}}</td>
            <td>{{ $category->posts->count()}}</td>
            <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $category->id]]) !!}
                <a href="{{ route('category.edit', $category->id)}}" class="btn btn-xs btn-default">

                  <i class="fa fa-edit"></i>
                </a>
                @if($category->id == config('cms.default_category_id'))
                  <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                    <i class="fa fa-times"></i>
                  </button>
                @else
                  <button onclick="return confirm('Are you suze?');" type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure? Delete item!!!')">
                    <i class="fa fa-times"></i>
                  </button>
                 @endif
              {!! Form::close() !!}
            </td>
            
          </tr>

        @endforeach
      </tbody>
    </table>
  </div>