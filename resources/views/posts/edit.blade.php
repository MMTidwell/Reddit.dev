@extends('layouts.master')

@section('form')
	{{-- the 1 is hard-codeded in and will be changed laster when the DB is formed --}}
	<form method="POST" action="{{ action('PostsController@update', 1) }}">
		{!! csrf_field() !!}
		{!! method_field('PUT') !!}
		Title: <input type="text" name="title" value="{{ old('title') }}">
		URL: <input type="text" name="website" value="{{ old('website') }}">
		Content: <textarea name="content" rows="5" columns="40">{{ old('content') }}</textarea>
		<input type="submit">
	</form>
@stop
