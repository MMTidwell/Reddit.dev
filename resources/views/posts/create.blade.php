@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<form method="POST" action="{{ action('PostsController@store') }}">
			{!! csrf_field() !!}
			<div class="form-group">	
				@if ($errors->has('title'))
		            <div class="alert alert-danger">
		                {{ $errors->first('title') }}
		            </div>
		        @endif
		        <label for="title">Title: </label>
				<input type="text" name="title" value="{{ old('title') }}" class="form-control">
			</div>

			<div class="form-group">
				@if ($errors->has('url'))
					<div class="alert alert-danger">
						{{ $errors->first('url')}}
					</div>
				@endif
				<label for="url">URL: </label>
				<input type="text" name="url" value="{{ old('url') }}" class="form-control">
			</div>

			<div for="form-group">
				@if ($errors->has('content'))
					<div class="alert alert-danger">
						{{ $errors->first('content') }}
					</div>
				@endif
				<label for="content">Content: </label>
				<textarea name="content" rows="5" columns="40" class="form-control">{{ old('content') }}</textarea><br>
			</div>

			<button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>
</div>
@stop