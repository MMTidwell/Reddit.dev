@extends('layouts.master')

@section('form')
	<form method="POST" action="{{ action('PostsController@update', 1) }}">
		{!! csrf_field() !!}
		{!! method_field('PUT') !!}
		Title: <input type="text" name="title" value="{{ old('title') }}">
		URL: <input type="text" name="website" value="{{ old('website') }}">
		Content: <textarea name="content" rows="5" columns="40"></textarea>
		<input type="submit">
	</form>
@stop
