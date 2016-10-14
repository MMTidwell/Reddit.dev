{{-- this blade is very specific in what it needs --}}
@extends('layouts.master')

@section('content')
{{-- needs name, email, password, and password confirm --}}
	<form method="POST" action="{{ action('Auth\AuthController@postRegister') }}">
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

		@if ($errors->has('password_confirmation'))
			<div class="alert alert-danger">
				{{ $errors->first('password_confirmation') }}
			</div>
		@endif
		Password: <input type="password" name="password_confirmation">
		<input type="submit">
	</form>
@stop