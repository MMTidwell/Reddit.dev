@extends('layouts.master')

@section('content')
	<form method="POST" action="{{ action('UsersController@store') }}">
		{!! csrf_field() !!}
		Name: <input type="text" name="name" value="{{ old('name') }}">
		Email: <input type="text" name="email" value="{{ old('email') }}">
		Password: <input type="password" name="password">
		<input type="submit">
	</form>
@stop