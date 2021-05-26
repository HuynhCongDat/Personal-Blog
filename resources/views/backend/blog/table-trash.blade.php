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
                          {!! Form::open(['style' => 'display: inline-block;', 'method' => 'PUT', 'route' => ['backend.blog.restore', $post->id]]) !!}
                          @if (check_user_permissions($request, "Blog@restore", $post->id))
                            <button title="Restore" class="btn btn-xs btn-default">

                              <i class="fa fa-refresh"></i>
                            </button>
                          @else
                            <button title="Restore" onclick="return false;" class="btn btn-xs btn-default disabled">

                              <i class="fa fa-refresh"></i>
                            </button>
                          @endif
                          {!! Form::close() !!}
                          {!! Form::open(['style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => ['backend.blog.force-destroy', $post->id]]) !!}
                          @if (check_user_permissions($request, "Blog@forceDestroy", $post->id))
                            <button title="Delete Permanent" type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure? Delete item!!!')">
                              <i class="fa fa-times"></i>
                            </button>
                          @else
                            <button title="Delete Permanent" type="button" class="btn btn-xs btn-danger disabled" onclick="return false;">
                              <i class="fa fa-times"></i>
                            </button>
                          @endif
                          {!! Form::close() !!}
                        </td>
                      </tr>

                    @endforeach
                  </tbody>
                </table>
               <!--  <div class="box-footer">
                  <div class="pull-left">
                    {{$posts->render()}}
                  </div>
                  <div class="pull-right">
                    <small>{{$postCount}} {{ Str::plural('Item', $postCount) }}</small>
                  </div>
                </div> -->
              </div> 