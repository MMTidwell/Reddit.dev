@extends('layouts.master')

@section('content')
	<h1 class="text-center">Name: {{ $user->name }}</h1>
	<h4 class="text-center">Email: {{ $user->email }}</h4>
<hr>
	<table>
		@foreach ($posts as $post) 
			<h1>Title: {{ $post->title }}</h1>
	        
	        <p>Content: {{ $post->content }}</p> 
	        <p>Posted: {{ $post->created_at->diffForHumans() }}</p>

	    	<a class="btn btn-primary btn-sm" href="{{ $post->url }}" target="_blank" id="edit_buttons">Link</a>
        	<a class="btn btn-primary btn-sm" href="{{ action('PostsController@show', $post->id) }}" id="edit_buttons">View Post</a>

        	<form method="POST" action="{{ action('PostsController@destroy', $post->id) }}">
        		{!! csrf_field() !!}
        		{!! method_field('DELETE') !!}
	        	<a class="btn btn-danger btn-sm" id="edit_buttons">Delete</a>
        	</form>
	        <hr>		
		@endforeach
	</table>
	{{-- this will make the pagination viewable on the page --}}
	{!! $posts->render() !!}
@stop