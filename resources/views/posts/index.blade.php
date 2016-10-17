@extends('layouts.master')

@section('content')
	<table>
		@foreach($posts as $post) 
			<h1>Title: {{ $post->title }}</h1>
	        <p><a href="{{ $post->url }}">Link</a></p>
	        <p>Content: {{ $post->content }}</p> 
	        <p>Posted On: {{ $post->created_at }}</p>
	        <p>
	        	<a href="posts/{{ $post->id }}">View Post</a>
	        	<a href="users/{{ $post->user->id }}">&nbsp;&nbsp;&nbsp; {{ $post->user->name }}</a>
	        </p>
	        ---------------------
	    @endforeach
	</table>

	{!! $posts->render() !!}
@stop

