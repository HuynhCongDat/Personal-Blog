<section class="comment">
    <!-- @if(session('message'))
       <div class="alert alert-info">
           {{session('message')}}
       </div>
    @endif -->
    {!! Form::open(['route' => ['blog.comments', $post->slug]]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                <div class="logo">
                    <span class="why">Comments</span>
                    <div id="heart"></div>
                </div>
            </a>
            </h4>
        </div>

        <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="form-group required {{$errors->has('name') ? 'has-error' : ''}}">
                    <label for="name">Name</label>
                    {!! Form::text('author_name', null, ['class' => 'form-control', 'placeholder' => 'Enter name']) !!}
                </div>
                <div class="form-group required {{$errors->has('email') ? 'has-error' : ''}}">
                    <label for="email">Email</label>
                    {!! Form::text('author_email', null, ['class' => 'form-control', 'placeholder' => 'Enter email']) !!}
                </div>
                <div class="input_comment">
                    <div class="body {{$errors->has('body') ? 'has-error' : ''}}">
                        <label for="email">Contents</label>
                        {!! Form::textarea('body', null, ['row' => 6, 'class' => 'form-control required', 'placeholder' => 'Enter comments']) !!}
                        @if($errors->has('author_name', 'author_email', 'body'))
                            <span class="help-block">
                                <span style="margin-left:10rem;" class="alert alert-warning">Bạn cần điển thông tin bên dưới để comment!!!</span>
                                <span style="margin-left:10rem;" class="alert alert-warning">Comments không vượt quá 50 ký tự!!!</span>
                            </span>
                        @endif
                        @if($errors->has('body'))
                            <span class="help-block">
                                <span style="margin-left:10rem;" class="alert alert-warning">Comments không vượt quá 50 ký tự!!!</span>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="send-btn">
                    <!-- <button type="submit"><i class="fas fa-arrow-right"></i></button> -->
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                <!--  <div class="form-group required">
                    <label for="website">Website</label>
                    {!! Form::text('author_url', null, ['class' => 'form-control']) !!}
                </div> -->
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    <article class="show-comments">
        @foreach($postComments as $comment)
        <div class="user_post">
            <img src="{{ asset('img/reader.png')}}" alt="reader">
            <div class="post-comment" id="message">
                <div class="content">
                    <div class="name">
                        <h1>{{$comment->author_name}}</h1>
                    </div>
                    <div class="calendar">
                        <p><li class="fa fa-calendar"></li>&nbsp; {{ $comment->date }}</p>
                    </div>
                    <div class="body">
                        {!! $comment->body_html !!}
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        <nav class="pagination_link">
            {!! $postComments->links() !!}
        </nav>
    </article>

</section>

