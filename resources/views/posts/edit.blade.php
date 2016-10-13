@extends('layouts.master')

@section('content')
	{{-- the 1 is hard-codeded in and will be changed laster when the DB is formed --}}
	<form method="POST" action="{{ action('PostsController@update', $post->id) }}">
		{!! csrf_field() !!}
		{!! method_field('PUT') !!}
		@if ($errors->has('title'))
            <div class="alert alert-danger">
                {{ $errors->first('title') }}
            </div>
        @endif
		Title: <input type="text" name="title" value="{{ old('title') == null ? $post->title : old('title') }}">
		
		@if ($errors->has('url'))
            <div class="alert alert-danger">
                {{ $errors->first('url') }}
            </div>
        @endif
		URL: <input type="text" name="url" value="{{ old('url') == null ? $post->url : old('url') }}">
		
		@if ($errors->has('content'))
            <div class="alert alert-danger">
                {{ $errors->first('content') }}
            </div>
        @endif
		Content: <textarea name="content" rows="5" columns="40">{{ old('content') == null ? $post->content : old('content') }}</textarea>

		<input type="submit">
	</form>
@stop
