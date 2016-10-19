@extends('layouts.master')

@section('content')
	<h1 class="text-center">{{ $user->name }}</h1>
	{{-- CHECKS TO SEE IF THEY ARE AUTHED TO SEE THE USER EMAIL --}}
	@if ($user->id == Auth::id())
		<h4 class="text-center">{{ $user->email }}</h4>
		<div class="text-center">
			{{-- CREATE POST --}}
			<a class="btn btn-primary btn-md" href="{{ action('PostsController@create') }}">Create Post</a>
			
			{{-- DELETE PROFILE --}}
			<form method="POST" action="{{ action('UsersController@destroy', $user->id) }}" class="delete-form">
        		{!! csrf_field() !!}
        		{!! method_field('DELETE') !!}
	        	<button class="btn btn-danger btn-md" id="edit_buttons">Delete</button>
        	</form>

			{{-- EDIT PROFILE --}}
			<a class="btn btn-primary btn-md" href="{{ action('UsersController@edit', $user->id) }}">Edit Profile</a><br>
		</div>
	@endif
	
	<hr>

	<table>
		@foreach ($posts as $post) 
			<h1>{{ $post->title }}</h1>
	        <p>{{ $post->content }}</p> 
	        <p>{{ $post->created_at->diffForHumans() }}</p>

			{{-- LINK AND VIEW POST --}}
	    	<a class="btn btn-primary btn-md" href="{{ $post->url }}" target="_blank" id="edit_buttons">Link</a>
        	<a class="btn btn-primary btn-md" href="{{ action('PostsController@show', $post->id) }}" id="edit_buttons">View Post</a>

			@if ($post->created_by == Auth::id())
				{{-- AUTH TO EDIT --}}
				<a class="btn btn-primary btn-md" href="{{ action('PostsController@edit', $post->id) }}" id="edit_buttons">Edit Post</a>
				
				{{-- AUTH TO DELETE --}}
				<form method="POST" action="{{ action('PostsController@destroy', $post->id) }}">
	        		{!! csrf_field() !!}
	        		{!! method_field('DELETE') !!}
		        	<button class="btn btn-danger btn-md" id="edit_buttons">Delete</button>
	        	</form>
			@endif
        	
        	{{-- VOTES --}}
			{{-- DOWN --}}
			<form method="POST" action="{{ action('PostsController@vote') }}">
				{!! csrf_field() !!}
				<input type="hidden" name="vote" value="0">
				<input type="hidden" name="post_id" value="{{ $post->id }}">
				<button type="submit" class="btn btn-info btn-sm pull-right">
					<i class="fa fa-hand-o-down fa-1g" aria-hidden="true">&emsp;{{ $post->downVote()->count() }}</i>
				</button>
        	</form>
    		{{-- UP --}}
        	<form method="POST" action="{{ action('PostsController@vote') }}">
        		{!! csrf_field() !!}
        		<input type="hidden" name="vote" value="1">
        		<input type="hidden" name="post_id" value="{{ $post->id }}">
				<button type="submit" class="btn btn-info btn-sm pull-right">
					<i class="fa fa-hand-o-up fa-1g"  aria-hidden="true">&emsp;{{ $post->upVote()->count() }}</i>
				</button>
			</form>

	        <hr>		
		@endforeach
	</table>
	{{-- this will make the pagination viewable on the page --}}
	{!! $posts->render() !!}
@stop