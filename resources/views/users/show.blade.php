@extends('layouts.master')

@section('content')
	<table>
		<h1>Name: {{ $user->name }}</h1>
		<h4>Email: {{ $user->email }}</h4>
	</table>
@stop