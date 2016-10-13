@extends('layouts.master')

@section('content')
	<table>
	    <h1>Title: {{ $post->title }}</h1><br>
	    <h4><a href="{{ $post->url }}">Link</a></h4><br>	
	    <h4>Content: {{ $post->content }}</h4><br>
	</table> 
@stop