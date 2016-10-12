@extends('layouts.master')

@section('form')
	{{-- the 1 is hard-codeded in and will be changed laster when the DB is formed --}}
	<form method="POST" action="{{ action('PostsController@update', $post->id) }}">
		{!! csrf_field() !!}
		{!! method_field('PUT') !!}
		Title: <input type="text" name="title" value="{{ old('title') == null) ? $post->title : old('title') }}">
		URL: <input type="text" name="website" value="{{ old('url') == null) ? $post->url : old('url') }}">
		Content: <textarea name="content" rows="5" columns="40">{{ old('content') == null) ? $post->content : old('content') }}</textarea>
		<input type="submit">
	</form>
@stop
