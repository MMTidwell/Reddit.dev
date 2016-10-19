@extends('layouts.master')

@section('content')
	<table>
		@foreach($posts as $post) 
			<h1>{{ $post->title }}</h1>
	        <p>{{ $post->content }}</p> 
	        <p>{{ $post->created_at->diffForHumans() }}</p>

	        <a href="{{ $post->url }}" class="btn btn-primary" id="edit_buttons" target="_blank">Link</a>
        	<a href="posts/{{ $post->id }}" class="btn btn-primary" id="edit_buttons">View Post</a>
        	<a href="users/{{ $post->user->id }}" class="btn btn-primary" id="edit_buttons">{{ $post->user->name }}</a>
			<hr>
	    @endforeach
	</table>

	{!! $posts->render() !!}
@stop

