@extends('layouts.master')

@section('content')
	<table>
		@foreach($users as $user)
			<h1>{{ $user->name }}</h1>
			<h4>{{ $user->email }}</h4>
			<hr>
		@endforeach
	</table>
	
	{{-- this will build the pages for paginate --}}
	<div class="row text-center">
		{!! $users->render() !!}
	</div>
@stop