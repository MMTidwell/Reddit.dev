@extends('layouts.master')

@section('content')
	<table>
	    <h1>Title: {{ $post->title }}</h1>
	    <p><a href="{{ $post->url }}">Link</a></p>
	    <p>Content: {{ $post->content }}</p>
	    <p>Posted On: {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i A') }}</p>
	    {{-- <p>Posted On: {{ $post->created_at->format('l, F jS Y @ h:i A') }}</p> --}}
	</table> 
@stop