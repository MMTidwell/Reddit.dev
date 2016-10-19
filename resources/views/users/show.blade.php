@extends('layouts.master')

@section('content')
	<h1 class="text-center">{{ $user->name }}</h1>
	{{-- CHECKS TO SEE IF THEY ARE AUTHED TO SEE THE USER EMAIL --}}
	@if ($user->id == Auth::id())
		<h4 class="text-center">{{ $user->email }}</h4>
		<hr>
		<div class="text-center">
			{{-- CREATE POST --}}
			<a class="btn btn-primary btn-sm" href="{{ action('PostsController@create') }}">Create Post</a>
			
			{{-- DELETE PROFILE --}}
			<form method="POST" action="{{ action('UsersController@destroy', $user->id) }}" class="delete-form">
        		{!! csrf_field() !!}
        		{!! method_field('DELETE') !!}
	        	<button class="btn btn-danger btn-sm" id="edit_buttons">Delete</button>
        	</form>

			{{-- EDIT PROFILE --}}
			<a class="btn btn-primary btn-sm" href="{{ action('UsersController@edit', $user->id) }}">Edit Profile</a>

		</div>
	@endif
	
	<hr>

	<table>
		@foreach ($posts as $post) 
			<h1>{{ $post->title }}</h1>
	        <p>{{ $post->content }}</p> 
	        <p>{{ $post->created_at->diffForHumans() }}</p>

	    	<a class="btn btn-primary btn-sm" href="{{ $post->url }}" target="_blank" id="edit_buttons">Link</a>
        	<a class="btn btn-primary btn-sm" href="{{ action('PostsController@show', $post->id) }}" id="edit_buttons">View Post</a>

			@if ($post->created_by == Auth::id())
				{{-- AUTH TO EDIT --}}
				<a class="btn btn-primary btn-sm" href="{{ action('PostsController@edit', $post->id) }}" id="edit_buttons">Edit Post</a>
				
				{{-- AUTH TO DELETE --}}
				<form method="POST" action="{{ action('PostsController@destroy', $post->id) }}">
	        		{!! csrf_field() !!}
	        		{!! method_field('DELETE') !!}
		        	<button class="btn btn-danger btn-sm" id="edit_buttons">Delete</button>
	        	</form>
			@endif
        	
	        <hr>		
		@endforeach
	</table>
	{{-- this will make the pagination viewable on the page --}}
	{!! $posts->render() !!}
@stop