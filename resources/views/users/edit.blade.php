{{-- This page will allow you to edit a user that already exist --}}
{{--  --}}

@extends('layouts.master')

@section('content')
	<form method="POST" action="{{ action('UsersController@update', $user->id) }}">
		{!! csrf_field() !!}
		{!! method_field('PUT') !!}
		Name: <input type="text" name="name" value="{{ old('name') == null ? $user->name : old('name') }}">
		Email: <input type="email" name="email" value="{{ old('email') == null ? $user->email : old('email') }}">
		Password: <input type="password" name="password">
		<input type="submit">
	</form>
@stop