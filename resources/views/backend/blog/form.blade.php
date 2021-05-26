<div class="col-xs-9">
	            <div class="box">
		          	<div class="table table-bordered" style="margin:1rem;width: 98%;">

			            <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
			            	{!! Form::label('title') !!}
			            	{!! Form::text('title', null, ['class' => 'form-control']) !!}

			            	@if ($errors->has('title'))
			            	   <span class="help-block">{{ $errors->first('title') }}</span>
			            	@endif
			            </div>

			            <div class="form-group {{$errors->has('slug') ? 'has-error' : ''}}">
			            	{!! Form::label('slug') !!}
			            	{!! Form::text('slug', null, ['class' => 'form-control']) !!}

			            	@if ($errors->has('slug'))
			            	   <span class="help-block">{{ $errors->first('slug') }}</span>
			            	@endif
			            </div>

			            <div class="form-group excerpt {{$errors->has('excerpt') ? 'has-error' : ''}}">
			            	{!! Form::label('excerpt') !!}
			            	{!! Form::textarea('excerpt', null, ['class' => 'form-control', 'style' => 'height:5rem;']) !!}

			            	@if ($errors->has('excerpt'))
			            	   <span class="help-block">{{ $errors->first('excerpt') }}</span>
			            	@endif
			            </div>

			            <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
			            	{!! Form::label('body') !!}
			            	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}

			            	@if ($errors->has('body'))
			            	   <span class="help-block">{{ $errors->first('body') }}</span>
			            	@endif
			            </div>

			        </div>
	            </div>
	        </div>

	        <div class="col-xs-3">
	        	<div class="box">
	        		<div class="box-header">
	        			<h3 class="box-title">Publish</h3>
	        		</div>
	        		<div class="box-body">
	        			 <div class="form-group">
			            	{!! Form::label('published_at', 'Publish Date') !!}
			            	<div class="input-group date" id="datetimepicker1">
			            		{!! Form::text('published_at', null, ['class' => 'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}
			            		<span class="input-group-addon">
			            			<span class="glyphicon glyphicon-calendar"></span>
			            		</span>
			            	</div>
			            	

			            	<!-- @if ($errors->has('published_at'))
			            	   <span class="help-block">{{ $errors->first('published_at') }}</span>
			            	@endif -->
			            </div>
	        		</div>
	        		<div class="box-footer clearfix">
	        			<div class="pull-left">
	        				<a id="draft-btn" class="btn btn-default">Save Draft</a>
	        			</div>
	        			<div class="pull-right">
	        				{!! Form::submit('Publish', ['class' => 'btn btn-primary', 'style' => 'margin-bottom:1rem;']) !!}
	        			</div>
	        		</div>
	        	</div>

	        	<div class="box">
	        		<div class="box-header with-border">
	        			<h3 class="box-title">Category</h3>
	        		</div>
	        		<div class="box-body">
	        			<div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
			         
			            	{!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Choose category']) !!}

			            	@if ($errors->has('category_id'))
			            	   <span class="help-block">{{ $errors->first('category_id') }}</span>
			            	@endif
			            </div>
	        		</div>
	        	</div>

	        	<div class="box">
	        		<div class="box-header with-border">
	        			<h3 class="box-title">Feature Image</h3>
	        		</div>
	        		<div class="box-body text-center">
	        			 <div class="form-group {{$errors->has('image') ? 'has-error' : ''}}">
			            	<div class="fileinput fileinput-new" data-provides="fileinput">
							  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img style="width: 200px; height: 140px;" src="{{ asset('img/'. $post->image) ? asset('img/'. $post->image) : 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image'}}" /></div>
							  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
							  <div>
							  	
							    <span class="btn btn-file"><span class="fileinput-new"><button class="btn btn-secondary">Select image</button></span><span class="fileinput-exists"><button class="btn btn-secondary">Change</button></span>{!! Form::file('image') !!}</span>
							    <a href="#" class="btn fileinput-exists" data-dismiss="fileinput"><button class="btn btn-secondary">Remove</button></a>
							  </div>
							</div>
			            	

			            	@if ($errors->has('image'))
			            	   <span class="help-block">{{ $errors->first('image') }}</span>
			            	@endif
			            </div>
	        		</div>
	        	</div>
	        </div>
	        <!-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
			<script>
			CKEDITOR.replace( 'summary-ckeditor' );
			</script> -->