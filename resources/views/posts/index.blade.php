@extends('layouts.master')

@section('content')
	<table>
		@foreach($posts as $post) 
			<h1>Title: {{ $post->title }}</h1>
	        <p><a href="{{ $post->url }}">Link</a></p>
	        <p>Content: {{ $post->content }}</p> 
	        <p>Posted: {{ $post->created_at->diffForHumans() }}</p>
	        <p>
	        	<a href="posts/{{ $post->id }}">View Post</a>
	        	<a href="users/{{ $post->user->id }}">&nbsp;&nbsp;&nbsp; {{ $post->user->name }}</a>
	        </p>
			<hr>
	    @endforeach
	</table>

	{!! $posts->render() !!}
@stop

