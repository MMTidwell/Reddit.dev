@extends('layouts.master')

@section('form')
	<form method="POST" action="{{ action('PostsController@store') }}">
		{!! csrf_field() !!}
		Title: <input type="text" name="title" value="{{ old('title') }}">
		URL: <input type="text" name="website" value="{{ old('website') }}">
		Content: <textarea name="content" rows="5" columns="40">{{ old('content') }}</textarea>
		<input type="submit">
	</form>
@stop