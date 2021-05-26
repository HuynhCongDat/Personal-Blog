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
        </div>
        <div class="box-footer">
        	<button type="submit" class="btn btn-primary">{{ $category->exists ? 'Update' : 'Save'}}</button>
        	<a href="{{ route('category.index')}}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>

