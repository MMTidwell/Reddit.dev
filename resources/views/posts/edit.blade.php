@extends('layouts.master')

@section('content')
	{{-- the 1 is hard-codeded in and will be changed laster when the DB is formed --}}
	<form method="POST" action="{{ action('PostsController@update', $post->id) }}">
		{!! csrf_field() !!}
		{!! method_field('PUT') !!}

		{{-- EDIT TITLE --}}
		@if ($errors->has('title'))
            <div class="alert alert-danger">
                {{ $errors->first('title') }}
            </div>
        @endif
        <div class="form-group">
        	<label for="title">Title</label>
        	<input type="text" class="form-control" name="title" value="{{ old('title') == null ? $post->title : old('title') }}">
        </div>
		
		{{-- EDIT URL --}}
		@if ($errors->has('url'))
            <div class="alert alert-danger">
                {{ $errors->first('url') }}
            </div>
        @endif
        <div class="form-group">
        	<label for="url">URL</label>
			<input type="text" class="form-control" name="url" value="{{ old('url') == null ? $post->url : old('url') }}">
        </div>
		
		{{-- EDIT CONTENT --}}
		@if ($errors->has('content'))
            <div class="alert alert-danger">
                {{ $errors->first('content') }}
            </div>
        @endif
        <div class="form-group">
        	<label for="content">Content</label>
			<textarea class="form-control" name="content" rows="5" columns="40">{{ old('content') == null ? $post->content : old('content') }}</textarea>
        </div>

		<button type="submit" class="btn btn-success">Submit</button>
	</form>
@stop
