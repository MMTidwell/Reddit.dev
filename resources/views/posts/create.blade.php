@extends('layouts.master')

@section('content')
	<form method="POST" action="{{ action('PostsController@store' }}">
		{!! csrf_field() !!}
		Title: <input type="text" name="title" value="{{ old('title') }}">
		URL: <input type="text" name="url" value="{{ old('url') }}">
		Content: <textarea name="content" rows="5" columns="40">{{ old('content') }}</textarea>
		<input type="submit">
	</form>
@stop