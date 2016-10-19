@extends('layouts.master')

@section('content')
	<table>
	    <h1>{{ $post->title }}</h1>
	    <p>{{ $post->content }}</p>
	    <p>{{ $post->created_at->diffForHumans() }}</p>

	    {{-- LINK --}}
	    <a href="{{ $post->url }}" class="btn btn-primary btm-sm" id="edit_buttons" target="_blank">Link</a>
	    {{-- AUTH OF POST --}}
	    <a href="{{ action('UsersController@show', $post->created_by) }}" class="btn btn-primary btm-sm" id="edit_buttons">{{ $post->user->name }}</a>
		
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
    </table> 
@stop