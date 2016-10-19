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
	</table> 
@stop