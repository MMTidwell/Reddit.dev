{{-- This page allows the user to be able to be created with name, email, and password. --}}
{{-- If statements check that the name, email, and password fields are filled in. If they are not then it will thow an error when the submit button is clicked. --}}

@extends('layouts.master')

@section('content')
	<form method="POST" action="{{ action('UsersController@store') }}">
		{!! csrf_field() !!}
		@if ($errors->has('name'))
			<div class="alert alert-danger">
				{{ $errors->first('name') }}
			</div>
		@endif
		Name: <input type="text" name="name" value="{{ old('name') }}">
		
		@if ($errors->has('email'))
			<div class="alert alert-danger">
				{{ $errors->first('email') }}
			</div>
		@endif
		Email: <input type="text" name="email" value="{{ old('email') }}">
		
		@if ($errors->has('password'))
			<div class="alert alert-danger">
				{{ $errors->first('password') }}
			</div>
		@endif
		Password: <input type="password" name="password">
		<input type="submit">
	</form>
@stop