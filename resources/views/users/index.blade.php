@extends('layouts.master')

@section('content')
	<table>
		@foreach($users as $user)
			<h1>Name: {{ $user->name }}</h1>
			<h4>Email: {{ $user->email }}</h4>
			----------------------
		@endforeach
	</table>
	
	{{-- this will build the pages for paginate --}}
	{!! $users->render() !!}
@stop