@extends('layouts.master')

@section('content')
	<table>
		@foreach($posts as $post) 
			<h1>Title: {{ $post->title }}</h1>
	        <h4><a href="{{ $post->url }}">Link</a></h4>
	        <h4>Content: {{ $post->content }}</h4> 
	        ---------------------
	    @endforeach
	</table>
@stop

