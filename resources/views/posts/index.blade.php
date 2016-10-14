@extends('layouts.master')

@section('content')
	<table>
		@foreach($posts as $post) 
			<h1>Title: {{ $post->title }}</h1>
	        <p><a href="{{ $post->url }}">Link</a></p>
	        <p>Content: {{ $post->content }}</p> 
	        <p>Posted On: {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i A') }}</p>
	        <p>
	        	<a href="posts/{{ $post->id }}">View Post</a>
	        	{{-- <a href="users/{{ $user->id }}">&nbsp;&nbsp;&nbsp; View User</a> --}}
	        </p>
	        ---------------------
	    @endforeach
	</table>

	{!! $posts->render() !!}
@stop

