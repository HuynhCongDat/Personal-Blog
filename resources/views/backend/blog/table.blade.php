<div class="box-body-content">
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>Title</td>
          <td>Author</td>
          <td>Category</td>
          <td>Date</td>
          <td>Action</td>
        </tr>
      </thead>
      <tbody>
        <?php $request = request(); ?>
        @foreach($posts as $post)

          <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->author->name}}</td>
            <td>{{$post->category->title}}</td>
            <td>
              <abbr title="{{$post->dateFormatted(true)}}">{{$post->dateFormatted()}}</abbr>
              {!! $post->publicationLable() !!}
            </td>
            <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['blog.destroy', $post->id]]) !!}
              @if (check_user_permissions($request, "Blog@edit", $post->id))
                <a href="{{ route('blog.edit', $post->id)}}" class="btn btn-xs btn-default">

                  <i class="fa fa-edit"></i>
                </a>
              @else
                <a href="#" class="btn btn-xs btn-default disabled">

                  <i class="fa fa-edit"></i>
                </a>
              @endif
              @if (check_user_permissions($request, "Blog@destroy", $post->id))
                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure? Delete item!!!')">
                  <i class="fa fa-trash"></i>
                </button>
              @else
                <button type="button" class="btn btn-xs btn-danger disabled" onclick="return false">
                  <i class="fa fa-trash"></i>
                </button>
              @endif
              {!! Form::close() !!}
            </td>
          </tr>

        @endforeach
      </tbody>
    </table>
  </div>