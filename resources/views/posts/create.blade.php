@extends('layouts.master')

@section('content')
	<form method="POST" action="{{ action('PostsController@store') }}">
		{!! csrf_field() !!}
		@if ($errors->has('title'))
            <div class="alert alert-danger">
                {{ $errors->first('title') }}
            </div>
        @endif
		Title: <input type="text" name="title" value="{{ old('title') }}">

		@if ($errors->has('url'))
			<div class="alert alert-danger">
				{{ $errors->first('url')}}
			</div>
		@endif
		URL: <input type="text" name="url" value="{{ old('url') }}">

		@if ($errors->has('content'))
			<div class="alert alert-danger">
				{{ $errors->first('content') }}
			</div>
		@endif
		Content: <textarea name="content" rows="5" columns="40">{{ old('content') }}</textarea>

		<input type="submit">
	</form>
@stop