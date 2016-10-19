{{-- This page will allow you to edit a user that already exist --}}
{{--  --}}

@extends('layouts.master')

@section('content')
	<form method="POST" action="{{ action('UsersController@update', $user->id) }}">
		{!! csrf_field() !!}
		{!! method_field('PUT') !!}

		{{-- EDIT NAME --}}
		@if ($errors->has('name'))
			<div class="alert alert-danger">
				{{ $errors->first('name') }}
			</div>
		@endif
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" value="{{ old('name') == null ? $user->name : old('name') }}">
		</div>

		{{-- EDIT EMAIL --}}
		@if ($errors->has('email'))
			<div class="alert alert-danger">
				{{ $errors->first('email') }}
			</div>
		@endif
		<div class="form-group">
			<label for="email">Email</label>	
			<input type="email" class="form-control" name="email" value="{{ old('email') == null ? $user->email : old('email') }}">
		</div>

		{{-- EDIT PASSWORD --}}
		@if ($errors->has('password'))
			<div class="alert alert-danger">
				{{ $errors->first('') }}
			</div>
		@endif
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password">
		</div>

		{{-- CONFIRM PASSWORD --}}
		@if ($errors->has('password_confirmation'))
			<div class="alert alert-danger">
				{{ $errors->first('password_confirmation') }}
			</div>
		@endif
		<div class="form-group">
			<label for="password_confirmation">Confrim Password</label>
			<input type="password" class="form-control" name="password">
		</div>
		
		<div>
			<button type="submit" class="btn btn-success">Submit</button>
		</div>
	</form>
@stop